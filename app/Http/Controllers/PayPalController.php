<?php
  
namespace App\Http\Controllers;

use App\Order;
use App\Payment;
use App\User;
use App\TrainJob;
use Carbon\Carbon;
Use Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\ExpressCheckout;
use Illuminate\Support\Facades\DB;

class PayPalController extends Controller
{
      /**
       * Responds with a welcome message with instructions
       *
       * @return \Illuminate\Http\Response
       */
      public function payment(Request $request, $order_id)
      {
            $order = Order::where('UserId', Auth::user()->UserId)->where('id', $order_id)->where('Status', 'pending')->first();
            $data = [];
            $data['items'] = [
                  [
                        'name' =>'Deep Trading AI',
                        'price' => $order->TotalPrice,
                        'desc'  => 'Your selected stocks are '.getStocks($order->Stocks),
                        'qty' => 1
                        
                  ]
            ];
            $data['name'] = [
                  [
                        'given_name' => Auth::user()->FirstName,
                        'surname' => Auth::user()->LastName,
                        'middle_name' => Auth::user()->MiddleName
                  ]
            ];

            $data['invoice_id'] = $order->id;
            $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
            $data['return_url'] = route('payment.success');
            $data['cancel_url'] = route('payment.cancel');
            $data['total'] = $order->TotalPrice;

            $provider = new ExpressCheckout;
            
            $response = $provider->setExpressCheckout($data);

           // $response = $provider->setExpressCheckout($data, true);
            return redirect($response['paypal_link']);
      }

      public function refund(Request $request, $transaction_id)
      {
            $payment_detail = Payment::where('transaction_id', $transaction_id)->first();
            $provider = new ExpressCheckout;
            $response = $provider->refundTransaction($transaction_id);
            // To issue partial refund, you must provide the amount as well for refund:
            $response = $provider->refundTransaction($transaction_id , $payment_detail['amount']);
            if($response){
                  $affected = DB::table('payments')
                    ->where('transaction_id', $transaction_id)
                    ->update(['payment_status' => 'Refund']);
                  $affected = DB::table('Orders')
                    ->where('id', $payment_detail['order_id'])
                    ->update(['Status' => 'Refund']);
                    return redirect()->route('admin.users')->with('message', "Payment has been refunded successfully");
              }
              else{
                  return redirect()->route('admin.users')->with('message', "Some error is occured while trying to refund");
              }
      }

      /**
       * Responds with a welcome message with instructions
       *
       * @return \Illuminate\Http\Response
       */
      public function cancel()
      {
            return redirect()->route('home')->withErrors(['msg', 'Something is wrong.']);
      }

      /**
       * Responds with a welcome message with instructions
       *
       * @return \Illuminate\Http\Response
       */
      public function success(Request $request)
      {
            $provider = new ExpressCheckout;
            $response = $provider->getExpressCheckoutDetails($request->token);
            
            if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {

                  $data = [];
                  $data['items'] = [
                        [
                              'name' =>'Deep Trading AI',
                              'price' => $response['L_AMT0'],
                              'desc'  => $response['L_DESC0'],
                              'qty' => 1
                        
                        ]
                  ];
                  $data['name'] = [
                        [
                              'given_name' => Auth::user()->FirstName,
                              'surname' => Auth::user()->LastName,
                              'middle_name' => Auth::user()->MiddleName
                        ]
                  ];

                  $data['invoice_id'] = $response['PAYMENTREQUEST_0_INVNUM'];
                  $data['invoice_description'] = $response['PAYMENTREQUEST_0_DESC'];
                  $data['return_url'] = route('payment.success');
                  $data['cancel_url'] = route('payment.cancel');
                  $data['total'] = $response['L_PAYMENTREQUEST_0_AMT0'];

                  $response_payment = $provider->doExpressCheckoutPayment($data, $request->token, $request->PayerID);
                  if (in_array(strtoupper($response_payment['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING']) || $response_payment['PAYMENTINFO_0_ACK'] == 'Success') {
                        // Insert transaction data into the database
                        $transaction_id = $response_payment['PAYMENTINFO_0_TRANSACTIONID'];
                        $isPaymentExist = Payment::where('transaction_id', $transaction_id)->first();
            
                        if(!$isPaymentExist)
                        {
                              $payment = new Payment;
                              $payment->order_id = $response['PAYMENTREQUEST_0_INVNUM'];
                              $payment->transaction_id = $transaction_id;
                              $payment->payer_email = Auth::user()->email;
                              $payment->amount = $response_payment['PAYMENTINFO_0_AMT'];
                              $payment->currency = 'USD';
                              $payment->payment_status = 'Captured';
                              $payment->payment_method = 'Paypal';
                              $payment->save();
                        }
                        $order = Order::where('UserId', Auth::user()->UserId)->where('id', $response['PAYMENTREQUEST_0_INVNUM'])->first();
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
                  }
                  
            }
            return redirect()->route('home')->withErrors(['msg', 'Something is wrong.']);
      }
}