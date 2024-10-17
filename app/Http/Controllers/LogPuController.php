<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Telegram;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use PDF;
class LogPuController extends Controller
{
    public function log_sdm() {

        return view('publc_sdm.setup');
    }
    public function daftar_log(Request $request){
        $cekstaff = DB::table('tbl_staff')->where('kd_cabang',$request->cabang)->where('nip',$request->nip)->first();
        if ($cekstaff) {
            $datacabang =  DB::table('tbl_cabang')->where('kd_cabang',$request->cabang)->first();
            $datalog = DB::table('s_log_sdm')->where('kd_cabang',$request->cabang)->get();
            $datalogx = DB::table('s_log_sdm')->where('kd_cabang',$request->cabang)->where('status_log_sdm',2)->get();
            return view('publc_sdm.menu.daftar_log',['staff'=>$cekstaff,'cabang'=>$datacabang,'datalog'=>$datalog,'datalogx'=>$datalogx]);
        } else {
            return view('publc_sdm.setup-ulang');
        }


    }
    public function form_log(Request $request){
        $log = DB::table('s_log_sdm')->where('kd_log_sdm',$request->id)->first();
        $form = DB::table('s_log_sdm_form')->where('kd_log_sdm',$request->id)->get();
        return view('publc_sdm.menu.form_log_sdm',['log'=>$log,'form'=>$form,'user'=>$request->user]);
    }
    public function simpan_form_log(Request $request){
        $ceklog = DB::table('s_log_sdm')->where('kd_log_sdm',$request->kd_log_sdm)->first();
        $kode = $ceklog->kd_cabang.'-'.str::uuid();
        $log = DB::table('s_log_sdm_form')->where('kd_log_sdm',$request->kd_log_sdm)->get();
        DB::table('s_log_sdm_answer')->insert([
            'kd_log_sdm_answer'=>$kode,
            'kd_log_sdm'=>$request->kd_log_sdm,
            'user_answer'=>$request->user,
            'created_at'=>now(),
        ]);
        $data = "";
        foreach ($log as $value) {
            $input = $value->kd_s_log_sdm_form;
            DB::table('s_log_sdm_answer_sub')->insert([
                'kd_log_sdm_answer'=>$kode,
                'kd_s_log_sdm_form'=>$value->kd_s_log_sdm_form,
                'log_sdm_answer'=>$request->$input,
                'created_at'=>now(),
            ]);
            $data = $data. "\n".$value->nama_s_log_sdm_form." : <strong>". $request->$input. "</strong>";
        }
        $notele = DB::table('t_no_telegram')->where('kd_cabang',$ceklog->kd_cabang)->get();
        foreach ($notele as $kirim) {
            Telegram::sendMessage([
                'chat_id' => $kirim->chat_id,
                'parse_mode' => 'HTML',
                'text' => "Laporan : $ceklog->nama_log_sdm \nSudah DiLaksanakan dengan baik Oleh : $request->user \nDengan Tiket : $kode \n$data
                ",
            ]);
        }

        Session::flash('success', 'Berhasl Melaksanakan Tugas : '.$ceklog->nama_log_sdm);
        return redirect()->back();
    }
    public function show_laporan_user(Request $request){
        $log = DB::table('s_log_sdm')->where('kd_log_sdm',$request->kode)->first();
        $data = DB::table('s_log_sdm_answer')->where('kd_log_sdm',$request->kode)->where('user_answer',$request->username)->whereBetween('created_at', [$request->start." 00:00:00",$request->end." 23:59:59"])->get();
        $header = DB::table('s_log_sdm_form')->where('kd_log_sdm',$request->kode)->get();
        $pdf = PDF::loadview('publc_sdm.report.laporan',['log'=>$log , 'nama'=>$request->username, 'data'=>$data, 'header'=>$header])->setPaper('A4', 'landscape')->setOptions(['defaultFont' => 'Courier']);
        $pdf->output();
        $dompdf = $pdf->getDomPDF();
        $font = $dompdf->getFontMetrics()->get_font("calibri", "bold");
        $dompdf->get_canvas()->page_text(400, 570, "{PAGE_NUM} / {PAGE_COUNT}", $font, 10, array(0, 0, 0));
        // $dompdf->get_canvas()->page_text(33, 570, $font, 10, array(0, 0, 0));
        return base64_encode($pdf->stream());
    }
    public function telegram(): never{
        $updates = Telegram::getUpdates();
        dd($updates);
    }

}
