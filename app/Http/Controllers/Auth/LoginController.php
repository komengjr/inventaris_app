<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if (Auth::user()->akses == 'dir' || Auth::user()->akses == 'admin' || Auth::user()->akses == 'staff' || Auth::user()->akses == 'sdm') {
                return redirect()->route('dashboard_home')->withSuccess('Kamu Berhasil Masuk di Account  ' . Auth::user()->name);
            } else {
                return redirect()->intended('home')->withSuccess('Kamu Berhasil Masuk di Account  ' . Auth::user()->name);
                # code...
            }
            // Authentication passed...
        } else {
            return redirect()->back()->withError('Username dan Password Salah');
        }
    }
}
