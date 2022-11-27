<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class DivisiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function menu()
    {
        return view('divisi.menu');
    }
    public function tambahdatapeminjaman()
    {
        $randomString = Str::random(4);
        $tgl = date('d/m/Y');
        $jadi = 'PB-'.$tgl.'-'.$randomString;
        return view('divisi.formpeminjaman',['tiket' => $jadi]);
    }
    public function tambahdatamutasi()
    {
        $randomString = Str::random(4);
        $tgl = date('d/m/Y');
        $jadi = 'MT-'.$tgl.'-'.$randomString;
        return view('divisi.formmutasi',['tiket' => $jadi]);
    }
    public function tambahdatapemusnahan()
    {
        $randomString = Str::random(4);
        $tgl = date('d/m/Y');
        $jadi = 'PM-'.$tgl.'-'.$randomString;
        return view('divisi.formpemusnahan',['tiket' => $jadi]);
    }
}
