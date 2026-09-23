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
            }
        } else {
            return redirect()->back()->withError('Username dan Password Salah');
        }
    }
    public function authenticate_v2(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return 1;
        } else {
            return 0;
        }
    }
    public function verifikasi_Login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $name = htmlspecialchars($user->name);

            if (in_array($user->akses, ['dir', 'admin', 'staff', 'sdm'])) {
                $redirectUrl = route('dashboard_home');
            } else {
                $redirectUrl = route('home');
            }

            // Return JSON agar mudah ditangani oleh JavaScript AJAX dengan aman
            return response()->json([
                'status' => 'success',
                'message' => "Selamat Datang, {$name}. Mengalihkan...",
                'redirect' => $redirectUrl
            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Username atau kata sandi yang Anda masukkan salah.'
        ], 401);
    }
}
