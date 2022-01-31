<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Auth;

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
    protected $redirectTo = '/merchant/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function showLoginForm()
    {
        if(Auth::guard('admin')->check() == true){
            return redirect()->route('admin.home');
        }
        if(Auth::guard('officer')->check() == true){
            return redirect()->route('officer.home');
        }
        if(Auth::guard('visitor')->check() == true){
            return redirect()->route('visitor.home');
        }
        return view('merchant.login');
    }


    
    public function login(Request $request)
    {
        // validate the form data 

        $this->validate( $request, [
            'username' => 'required',
            'password'  => 'required',
        ]);

        // attempt to log the user in
        $credentials = ['username' => $request->username, 'password' => $request->password];
        if( Auth::guard('merchant')->attempt( $credentials, $request->remember ) ){
            // if successfull, redirect them to intended location
            return redirect()->route('merchant.home');

        }



        session()->flash('my_error', 'Wrong Username or password');

        // if unsuccessful, redirect them to their login with form-data
        return redirect()->back()->withInput( $request->only('username', 'remember'));
    }


    protected function guard()
    {
        return Auth::guard('merchant');
    }


    public function logout(Request $request)
    {
        Auth::guard('merchant')->logout();
        return redirect()->route('merchant.login');
    }
}

