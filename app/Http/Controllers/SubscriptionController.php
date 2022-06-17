<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use App\Stock;
use App\TrainJob;
use App\User;
use Carbon\Carbon;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
class SubscriptionController extends Controller {

  public function __construct(Request $request)
  {
    $planId = '';
    if($request->get('basic_monthly_plan'))
    $planId = $request->get('basic_monthly_plan');
    if($request->get('basic_yearly_plan')) 
    $planId = $request->get('basic_yearly_plan');
    if($request->get('advance_monthly_plan')) 
    $planId = $request->get('advance_monthly_plan');
    if($request->get('advance_yearly_plan'))
    $planId = $request->get('advance_yearly_plan');
    if($planId)
    {
      Session::put('planId', $planId);
      if($this->middleware('auth'))
          return redirect()->route('subscribe');
    }
    $this->middleware('auth');
  }

  public function subscribe() {

    $stock = Stock::all();

    $product = Product::select('id', DB::raw("CONCAT(Name, '(', Frequency, ')') AS Name"))
        ->get()
        ->pluck('Name', 'id');
    return view('subscription.subscribe', compact('stock', 'product'));
  }

  public function subscribeStock(Request $request) {
    $data = $request->input('data');
    $stockIds = '';
    foreach ($data as $order) {
      $stockIds .= $order['value'] . ',';
    }

    $stockIds = rtrim($stockIds, ',');
    try {
      DB::beginTransaction();

      $user = User::find(Auth::user()->id);
      $user->Subscribed = '1';
      $user->save();

      $product_id = $request->product_id;
      $product = Product::find($product_id);

      if ($product) {
        $expiry_date = carbon::now();
        if($product->Name == 'Basic')
        {
          if ($product->Frequency == 'Monthly') {
            $expiry_date = $expiry_date->addMonth();
            $total_price = $product->Price;
            if (sizeof($data) > $product->NumberOfStocks) {
              $total_price += (199 * (sizeof($data) - $product->NumberOfStocks));
            }
          } else {
            $expiry_date = $expiry_date->addYear();
            $total_price = $product->Price;
            if (sizeof($data) > $product->NumberOfStocks) {
              $total_price += ((199 * (sizeof($data) - $product->NumberOfStocks))*12);
            }
          }
        }
        else{
          if ($product->Frequency == 'Monthly') {
            $expiry_date = $expiry_date->addMonth();
            $total_price = $product->Price;
            if (sizeof($data) > $product->NumberOfStocks) {
              $total_price += (299 * (sizeof($data) - $product->NumberOfStocks));
            }
          } else {
            $expiry_date = $expiry_date->addYear();
            $total_price = $product->Price;
            if (sizeof($data) > $product->NumberOfStocks) {
              $total_price += ((299 * (sizeof($data) - $product->NumberOfStocks)*12));
            }
          }
        }

        $order = ['OrderDate' => Carbon::now(), 'UserId' => Auth::user()->UserId, 'ProductId' => $product_id, 'Stocks' => $stockIds, 'TotalPrice' => $total_price, 'ExpiryDate' => $expiry_date->format('Y-m-d')];
        $order_id = Order::create($order)->id;
        DB::commit();
        return ['status' => '200', 'message' => 'Stock Subscribed', 'order_id' => $order_id];
      } else {
        return ['status' => '401', 'message' => 'Invalid product selected'];
      }
    } catch (\Exception $e) {
      DB::rollBack();
      return ['status' => '200', 'message' => $e->getMessage()];
    }
  }

  public function subscribe_by_order(Request $request, $order_id) {
    $order = Order::where('id', $order_id)->where('Status', 'Active')->first();
    $current_stock = [];
    if ($order) {
      $current_stock = explode(',', $order->Stocks);


      $product = Product::select('id', DB::raw("CONCAT(Name, '(', Frequency, ')') AS Name"))
          ->get()
          ->pluck('Name', 'id');
      $frequency = $order->product->id;
      return view('subscription.subscribe_by_order', compact('order','product','frequency'));
      } else {
      return redirect()->route('user.history')->with('error', 'Order Not found');
    }

  }

  public function get_available_stock(Request $request){
    if(Session::get('planId')){
      Session::forget('planId');
    }
    $order_id = $request->order_id;
    $product_id = $request->product_id;
    $stock = Stock::all();
    $current_stock = [];
    $total_selected_stock = "";
    $count = 0;
    $orders = Order::where('UserId', Auth::user()->UserId)->where('ProductId',$product_id  )->where('Status', 'Active')->get();

    foreach ($orders as $order) {
      if($count != 0){
        $total_selected_stock = $total_selected_stock.",";
      }
      $total_selected_stock .= $order->Stocks;
      $count++;

    }
    $current_stock = explode(',', $total_selected_stock);
    $return =view('subscription.stock_table', compact('orders','current_stock','stock'))->render();
    return ['status' => '200', 'body' =>$return];
  }

}
