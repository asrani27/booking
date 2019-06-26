<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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

    public function login()
    {
        $login = request()->input('username');
        $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        
        if(Auth::attempt([$field => $login, 'password' => request()->password])) 
        {
            $pesan = array(
            'message' => 'SELAMAT DATANG ADMIN', 
            'alert-type' => 'success');
            return redirect('/home')->with($pesan);
        } 
        else 
        {
            $pesan = array(
            'message' => 'Username atau Password Tidak Ditemukan', 
            'alert-type' => 'error');
            
            return back()->with($pesan);
        }
    }
}
