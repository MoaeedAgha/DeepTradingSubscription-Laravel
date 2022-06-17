<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'UserId' => ['required', 'string', 'max:255', 'unique:User'],
            'FirstName' => ['required', 'string', 'max:255'],
            'LastName' => ['required', 'string', 'max:255'],
            'Title' => ['required', 'string', 'max:100'],
            'Email' => ['required', 'string', 'email', 'max:255', 'unique:User'],
            'Password' => ['required', 'string', 'min:8', 'confirmed'],
            'Company' => ['required', 'string'],
            'PhoneNumber' => ['required', 'string', 'min:10', 'max:12'],
            'StreetAddress1' => ['required', 'string', 'max:255'],
            'City' => ['required', 'string', 'max:100'],
            'State' => ['required', 'string', 'max:100'],
            'ZipCode' => ['required', 'string', 'min:4', 'max:6'],
            'Country' => ['required', 'string', 'max:255'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        if(isset($data['Mailing_list'])){
            $MailingList = $data['Mailing_list'];
        }
        else{
            $MailingList = 0;
        }
        return User::create([
            'UserId' => $data['UserId'],
            'FirstName' => $data['FirstName'],
            'MiddleName' => $data['MiddleName'],
            'LastName' => $data['LastName'],
            'Title' => $data['Title'],
            'Email' => $data['Email'],
            'Company' => $data['Company'],
            'PhoneNumber' => $data['PhoneNumber'],
            'Password' => Hash::make($data['Password']),
            'StreetAddress1' => $data['StreetAddress1'],
            'City' => $data['City'],
            'State' => $data['State'],
            'ZipCode' => $data['ZipCode'],
            'Country' => $data['Country'],
            'Description' => $data['Description'],
            'CreateDate' => Carbon::now(),
            'AccountStatus' => 'Active',
            'MailingList' => $MailingList
            
        ]);
    }

    public function register(Request $request)
    {
        event(new Registered($user = $this->create($request->all())));

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }
}
