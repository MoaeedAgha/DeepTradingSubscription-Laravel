<?php

namespace App\Http\Controllers;

use App\Order;
use App\Stock;
use App\User;
use Session;
use Barchart\OnDemand\Client;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use phpDocumentor\Reflection\Types\Compound;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $items = array();
        $stockplan1 = [];
        $stockplan2 = [];
        $stockplan3 = [];
        $stockplan4 = [];
        $stockIdsPlan1 = [];
        $stockIdsPlan2 = [];
        $stockIdsPlan3 = [];
        $stockIdsPlan4 = [];
        $order = Order::where('UserId', Auth::user()->UserId)->where('Status', 'Active')->get();
        if(sizeof($order)) {
            foreach ($order as $o) {
                if($o['ProductId'] == '1')
                {
                    $ids = explode(',', $o['Stocks']);
                    $stockIdsPlan1 = array_merge($stockIdsPlan1, $ids);
                }else if($o['ProductId'] == '2')
                {
                    $ids = explode(',', $o['Stocks']);
                    $stockIdsPlan2 = array_merge($stockIdsPlan2, $ids);
                }else if($o['ProductId'] == '3')
                {
                    $ids = explode(',', $o['Stocks']);
                    $stockIdsPlan3 = array_merge($stockIdsPlan3, $ids);
                }else{
                    $ids = explode(',', $o['Stocks']);
                    $stockIdsPlan4 = array_merge($stockIdsPlan4, $ids);
                }
            }
            if($stockIdsPlan1)
            $stockplan1 = Stock::whereIn('id', $stockIdsPlan1)->get();
            if($stockIdsPlan2)
            $stockplan2 = Stock::whereIn('id', $stockIdsPlan2)->get();
            if($stockIdsPlan3)
            $stockplan3 = Stock::whereIn('id', $stockIdsPlan3)->get();
            if($stockIdsPlan4)
            $stockplan4 = Stock::whereIn('id', $stockIdsPlan4)->get();
            
            if($stockplan1) {
                $stockplan1[] = "Basic Monthly Plan Stocks";
                $items[] = $stockplan1;
            }
            if($stockplan2) {
                $stockplan2[] = "Basic Yearly Plan Stocks";
                $items[] = $stockplan2;
            }
            if($stockplan3) {
                $stockplan3[] = "Advance Monthly Plan Stocks";
                $items[] = $stockplan3;
            }
            if($stockplan4) {
                $stockplan4[] = "Advance Yearly Plan Stocks";
                $items[] = $stockplan4;
            }
        }
        return view('home', compact('items' ));
    }

    public function fetchBarChartStock(){
        $ondemand = new Client('618ffd178593536fde957a9a8bf15b78');
        $results = $ondemand->getHistory(['symbol' => 'AAPL', 'type' => 'ticks']);
        Log::info($results);
        if($results['status']['code'] == 200) {
            foreach($results['results'] as $stock) {
                Stock::create([
                    'CreateDate' => Carbon::now(),
                    'Ticker' => $stock['symbol'],
                    'Date' => $stock['tradingDay'],
                    'Volume' => $stock['tickSize'],
                    'High' => $stock['tickPrice'],
                    'Low' => $stock['tickPrice']
                ]);
            }
        }
    }

    public function graph() {

        $opts = array('http'=>array('header' => "User-Agent:MyAgent/1.0\r\n"));
        //Basically adding headers to the request
        $context = stream_context_create($opts);

        $url = "http://www.nektron.com/djia_historical_predictions.json";
        $json = file_get_contents($url,false,$context);
        $json_data = json_decode($json, true);
        $myArray = array();
        $deepIndex = (int)$json_data['deep_index'];
        $historical_data = $json_data['historical_prices'];
        $deepIndexDate = $json_data['date'];

        foreach($historical_data as $json_datkey => $json_dat){
            $datastr    =   strtotime($json_datkey)* 1000;
            $y = date('Y',strtotime($json_datkey));
            $m = date('m',strtotime($json_datkey));
            $d = date('j',strtotime($json_datkey));
            $close  =   $json_dat['Close'];
            $pred   =   $json_dat['Prediction'];
            $closemyArray[] = "[".$datastr.",".$close."]";
            if($y == "2019" && $m == "01"){
                $myArray[] = '{ x: new Date('.$y.', '.$m.', '.$d.'), y: '.$close.' }';
            }
        }
        $fp = fopen('close.json', 'w');
        fwrite($fp, str_replace('"', "", json_encode($closemyArray, JSON_HEX_APOS)));
        fclose($fp);

        $pmyArray = array();
        $predmyArray = array();
        foreach($historical_data as $json_datkey => $json_dat){
            $datastr    =   strtotime($json_datkey)* 1000;
            $y = date('Y',strtotime($json_datkey));
            $m = date('m',strtotime($json_datkey));
            $d = date('j',strtotime($json_datkey));
            $close  =   $json_dat['Close'];
            $pred   =   $json_dat['Prediction'];
            $predmyArray[] = "[".$datastr.",".$pred."]";
            if($y == "2019" && $m == "01"){
                $pmyArray[] = '{ x: new Date('.$y.', '.$m.', '.$d.'), y: '.$pred.' }';
            }
        }
        $fp = fopen('pred.json', 'w');
        fwrite($fp, str_replace('"', "", json_encode($predmyArray, JSON_HEX_APOS)));
        fclose($fp);

        return view('subscription.graph', compact('deepIndex', 'deepIndexDate', 'myArray', 'pmyArray'));
    }

    public function history(){
        $orders = Order::where('UserId', Auth::user()->UserId)->get();
        return view('subscription.history', compact('orders'));
    }

    public function history_pending1(){
        $orders = Order::where('UserId', Auth::user()->UserId)->get();
        return view('subscription.history', compact('orders'));
    }
    public function pending_orders(Request $request, $order_id) {

        $orders = Order::where('UserId', Auth::user()->UserId)->where('id', $order_id)->where('Status', 'pending')->get();
        return view('subscription.pending_orders', compact('orders'));
    
      }
    public function profile(){
        $user = User::find(Auth::user()->id);
        return view('profile', compact('user'));
    }

    public function updateProfile(Request $request){
        $data = $request->input();
        $user = User::find(Auth::user()->id);
        $user->FirstName = $data['FirstName'];
        $user->MiddleName = $data['MiddleName'];
        $user->LastName = $data['LastName'];
        $user->Title = $data['Title'];
        if($data['Email'])
        {
            $user->email = $data['Email'];
        }
        $user->Company = $data['Company'];
        $user->PhoneNumber = $data['PhoneNumber'];
        $user->StreetAddress1 = $data['StreetAddress1'];
        $user->StreetAddress2 = $data['StreetAddress2'];
        $user->City = $data['City'];
        $user->State = $data['State'];
        $user->ZipCode = $data['ZipCode'];
        $user->Country = $data['Country'];
        $user->Description = $data['Description'];
        $user->save();
        return redirect()->back()->with('success', 'Profile updated successfully');
    }
}
