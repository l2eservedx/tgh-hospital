<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
            'username' => ['required', 'string', 'max:255', 'unique:user'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:user'],
            'fname' => ['required', 'string', 'min:8'],
            'lname' => ['required', 'string', 'min:8'],
            'cid' => ['required', 'string', 'min:13', 'max:13'],
            'phonenumber' => ['required', 'string']  
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $out = new \Symfony\Component\Console\Output\ConsoleOutput();
        //$out->writeln($data['cid']);
        return User::create([

            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'email' => $data['email'],
            'pname' => 'Mr.',
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'cid' => $data['cid'],
            'phone_number' => $data['phonenumber'],
            'authKey' => '0',
            'password_reset' => '0',
            'level' => '0',
            'active' => '1',


        ]);								
					
    }
}
