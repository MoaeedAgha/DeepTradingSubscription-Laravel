<?php

namespace App\Http\Controllers;

use App\Order;
use App\Stock;
use App\User;
use Barchart\OnDemand\Client;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use phpDocumentor\Reflection\Types\Compound;

class AdminController extends Controller
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
        $users = User::where('Role', 'user')->get();
        return view('admin.dashboard', compact('users'));
    }

    public function details($id){
        $user = User::find($id);
        return view('admin.details', compact('user'));
    }
    
    public function user_all_orders($id){
        $user = User::find($id);
        $orders = '';
        $user_id = $user['UserId'];
        if($user) {
                $orders = Order::where('UserId', $user['UserId'])->get();
            
        }
        return view('admin.user_all_orders', compact('orders'));
    }

    public function setActiveStatus(Request $request){
        $user = User::find($request->userId);
        if($user) {
            if($user->AccountStatus == 'Active')
                $user->AccountStatus = 'In-Active';
            else
                $user->AccountStatus = 'Active';
            $user->save();
            return [
                'status' => 200,
                'message' => 'Status changes successfully'
            ];
        } else {
            return [
                'status' => 401,
                'message' => 'Unable to update the status'
            ];
        }
    }

    public function users(){
        $users = User::where('Role', 'user')->get();

        if($users) {
            foreach($users as $user) {
                $order = Order::where('UserId', $user->UserId)->where('Status', 'Active')->first();
                if($order) {
                    $user['stocks'] = getStocks($order->Stocks);
                    $user['order_amount'] = $order->TotalPrice;
                } else {
                    $user['stocks'] = '';
                    $user['order_amount'] = 0;
                }
            }
        }
        return view('admin.users', compact('users'));
    }
}
