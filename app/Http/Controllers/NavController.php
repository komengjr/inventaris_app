<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
class NavController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function recentuserlogin()
    {
        $data = DB::table('z_log_kunjungan')->where('cabang',Auth::user()->cabang)->get();
        return view('navbar.user-login',['data'=>$data]);
    }
}
