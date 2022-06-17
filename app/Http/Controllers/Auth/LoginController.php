<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use http\Client\Curl\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request){
        $user = \App\User::where('Email', $request->Email)->first();
        if($user) {
            if($user->AccountStatus == 'Active') {
                if (Hash::check($request->Password, $user->Password)) {
                    Auth::login($user);
                    if ($user->Role == 'admin') {
                        return redirect()->route('admin.dashboard');
                    } else {
                        if(Session::get('planId'))
                        {
                            return redirect()->route('subscribe');
                        }
                        else
                        {
                            return redirect()->route('home');
                        }
                    }
                } else {
                    return redirect()->back()->with('error', 'Invalid email or password');
                }
            } else {
                return redirect()->back()->with('error', 'Your account is in active');
            }
        } else {
            return redirect()->back()->with('error', 'Invalid email or password');
        }
    }

}
