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
class FrontendController extends Controller {

  public function __construct()
  {
     // $this->middleware('auth');
  }

  public function index() {
      $page = 'Home';

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

    return view('frontend.home', compact('page','deepIndex', 'deepIndexDate', 'myArray', 'pmyArray'));
  }
  public function getUserId($UserId){
    $UserId = User::select('*')->where('UserId', $UserId)->get(); 
    echo json_encode($UserId);
    exit;

  }
  public function about_us(Request $request) {
    $page = 'About';

    return view('frontend.about_us', compact('page'));

  }

  public function contact_us() {
    $page = 'Contact Us';

  return view('frontend.contact_us', compact('page'));
  }

  public function our_story() {
    $page = 'Our Story';
    return view('frontend.our_story', compact('page'));
  }

  public function pricing_plan() {
    $page = 'Pricing Plan';
    return view('frontend.pricing_plan', compact('page'));
  }

  public function what_we_do() {
    $page = 'What We Do';
    return view('frontend.what_we_do', compact('page'));
  }
}
