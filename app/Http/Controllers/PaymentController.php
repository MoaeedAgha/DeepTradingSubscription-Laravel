<?php
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use Omnipay\Omnipay;
use App\Payment;
use App\Order;
use App\User;
use App\TrainJob;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class PaymentController extends Controller
{
    public $gateway;
  
    public function __construct()
    {
        $this->gateway = Omnipay::create('AuthorizeNetApi_Api');
        $this->gateway->setAuthName(env('ANET_API_LOGIN_ID'));
        $this->gateway->setTransactionKey(env('ANET_TRANSACTION_KEY'));
        $this->gateway->setTestMode(true); //comment this line when move to 'live'
    }
 
    public function index(Request $request, $order_id)
    {
        $orders = Order::where('UserId', Auth::user()->UserId)->where('id', $order_id)->where('Status', 'pending')->get();
        Session::put('order_id', $order_id);
        return view('payment', compact('orders'));
    }
 
    public function charge(Request $request)
    {
        if(Session::get('order_id')){
            $order_id = Session::get('order_id');
            $orders = Order::where('UserId', Auth::user()->UserId)->where('id', $order_id)->where('Status', 'pending')->get();
            Session::forget('order_id');
          }
        try {
            $creditCard = new \Omnipay\Common\CreditCard([
                'number' => $request->input('cc_number'),
                'expiryMonth' => $request->input('expiry_month'),
                'expiryYear' => $request->input('expiry_year'),
                'cvv' => $request->input('cvv'),
            ]);
 
            // Generate a unique merchant site transaction ID.
            $transactionId = rand(100000000, 999999999);
 
            $response = $this->gateway->authorize([
                'amount' => $orders[0]->TotalPrice,
                'currency' => 'USD',
                'transactionId' => $transactionId,
                'card' => $creditCard,
            ])->send();
            if($response->isSuccessful()) {
 
                // Captured from the authorization response.
                $transactionReference = $response->getTransactionReference();
               
                $response = $this->gateway->capture([
                    'amount' => $orders[0]->TotalPrice,
                    'currency' => 'USD',
                    'transactionReference' => $transactionReference,
                    ])->send();
 
                $transaction_id = $response->getTransactionReference();
                $amount = $orders[0]->TotalPrice;
 
                // Insert transaction data into the database
                $isPaymentExist = Payment::where('transaction_id', $transaction_id)->first();
 
                if(!$isPaymentExist)
                {
                    $numberLastFour = substr($request->input('cc_number'), -4);
                    $payment = new Payment;
                    $payment->order_id = $order_id;
                    $payment->transaction_id = $transaction_id;
                    $payment->payer_email = $request->input('email');
                    $payment->amount = $orders[0]->TotalPrice;
                    $payment->currency = 'USD';
                    $payment->number_last_four = "$numberLastFour";
                    $payment->payment_status = 'Captured';
                    $payment->payment_method = 'Authorize';
                    $payment->save();
                }
                $order = Order::where('UserId', Auth::user()->UserId)->where('id', $order_id)->first();
                $stocks = explode(',', getStocks($order->Stocks));
                try {
                      DB::beginTransaction();
                      foreach ($stocks as $key => $value) {
                            TrainJob::create(
                                  [
                                        'CreateDate' => Carbon::now(), 
                                        'UserId' => Auth::user()->UserId, 
                                        'OrderId' => $order->id, 
                                        'Ticker' => $value, 
                                        'Status' => 'New', 
                                        'PercentComplete' => 0, 
                                        'JSONFile' => $value . '_' . Auth::user()->id . '_' . $order->id . '.json'
                                  ]
                            );
                      }
                      $order->Status = 'Active';
                      $order->save();
                      DB::commit();
                }
                catch (\Exception $e) {
                      DB::rollBack();
                }
 
                return redirect()->route('home')->with('message', 'Your payment is successfully done.');
            } else {
                // not successful
                return redirect()->route('home')->with('message', $response->getMessage());
            }
        } catch(Exception $e) {
            return $e->getMessage();
        }
    }

    public function refund_authorize($transactionReference)
    {
       $payment_detail = Payment::where('transaction_id', $transactionReference)->first();
       $response = $this->gateway->refund([
        'amount' => $payment_detail['amount'],
        'currency' => 'USD',
        'transactionReference' => $transactionReference,
        'numberLastFour' => $payment_detail['number_last_four'],
        ])->send();
        if($response->getCode() == '1'){
            $affected = DB::table('payments')
              ->where('transaction_id', $transactionReference)
              ->update(['payment_status' => 'Refund']);
            $affected = DB::table('Orders')
              ->where('id', $payment_detail['order_id'])
              ->update(['Status' => 'Refund']);
              return redirect()->route('admin.users')->with('message', $response->getMessage());
        }
        else{
            return redirect()->route('admin.users')->with('message', $response->getMessage());
        }

    }
}