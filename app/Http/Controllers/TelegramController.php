<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Telegram;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Auth;
use PDF;

class TelegramController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function notificationtelegram(){
        $data = DB::table('t_no_telegram')
        ->join('tbl_cabang','tbl_cabang.kd_cabang','=','t_no_telegram.kd_cabang')
        ->where('t_no_telegram.kd_cabang',Auth::user()->cabang)->first();
        if ($data) {
            Telegram::sendMessage([
                'chat_id' => $data->chat_id,
                'parse_mode' => 'HTML',
                'text' => "Selamat Datang : $data->nama_cabang
                ",
            ]);
            Session::flash('success', 'Berhasl Mencoba Notification');
            return redirect()->back();
        } else {
            Session::flash('error', 'No Belum Terdaftar');
            return redirect()->back();
        }


    }
}
