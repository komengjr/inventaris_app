<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use DB;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
class PdfController extends Controller
{
    public function print(Request $request ,$id)
    {
        $data = DB::table('sub_tbl_inventory')
        ->select('sub_tbl_inventory.*')
        ->where('kd_inventaris',$id)
        ->where('kd_cabang',auth::user()->cabang)
        ->get();
        $qrcode = base64_encode(QrCode::format('svg')->size(200)->errorCorrection('H')->generate('string'));
        $pdf = PDF::loadview('index',['id'=>$id,'data'=>$data],compact('qrcode'))->setPaper($request->input('ukuran'),'potrait');
        return $pdf->stream();
    }
    public function printbarcodelokasi(Request $request,$id)
    {
        $data = DB::table('sub_tbl_inventory')
        ->select('sub_tbl_inventory.*')
        ->where('kd_lokasi',$request->input('kd_lokasi'))
        ->where('kd_cabang',auth::user()->cabang)
        ->get();
        // dd($data);
        $qrcode = base64_encode(QrCode::format('svg')->size(200)->errorCorrection('H')->generate('string'));
        $pdf = PDF::loadview('index',['data'=>$data],compact('qrcode'))->setPaper('A8','potrait');
        return $pdf->stream();
    }
    public function printpeserta()
    {
        $data = DB::table('tbl_peserta')
        ->select('tbl_peserta.*')
        ->get();
        $qrcode = base64_encode(QrCode::format('svg')->size(200)->errorCorrection('H')->generate('string'));
        $pdf = PDF::loadview('peserta',['data'=>$data],compact('qrcode'))->setPaper('A8','landscape');
        return $pdf->stream();
    }
    public function printdokumenmutasi($id)
    {
        $datamutasi = DB::table('tbl_mutasi')
        ->select('tbl_mutasi.*')
        ->where('id_mutasi',$id)
        ->get();
        $databrg = DB::table('tbl_sub_mutasi')
        ->select('tbl_sub_mutasi.*')
        ->where('id_mutasi',$id)
        ->get();
        // $qrcode = base64_encode(QrCode::format('svg')->size(200)->errorCorrection('H')->generate('string'));
        $pdf = PDF::loadview('pdf.dokumen_mutasi',['datamutasi'=>$datamutasi,'databrg'=>$databrg])->setPaper('A4','potrait');
        return $pdf->stream();
    }
}
