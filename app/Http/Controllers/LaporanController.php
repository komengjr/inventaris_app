<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Imports\LogInventarisImport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class LaporanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function laporan()
    {
        return view('divisi.laporan.laporan');
    }
    public function allbarangcabang()
    {
        $data = DB::table('sub_tbl_inventory')
        ->select('no_inventaris','nama_barang','kd_inventaris','kd_lokasi','merk','type','harga_perolehan','status_barang')
        ->where('kd_cabang',Auth::user()->cabang)->get();
        return view('divisi.laporan.view',['data'=>$data]);
    }
    public function cetakallbarangcabang()
    {
        $data = DB::table('sub_tbl_inventory')
        ->select('no_inventaris','nama_barang','merk','type','harga_perolehan')
        ->where('kd_cabang',Auth::user()->cabang)->get();
        // $pdf = PDF::loadview('divisi.laporan.report.all-barang',['data'=>$data])->setPaper('A4','potrait');
        // return base64_encode($pdf->stream());
        // return view('divisi.laporan.report.all-barang',['data'=>$data]);
        $pdf = PDF::loadview('divisi.laporan.report.all-barang',['data'=>$data]);
    	return $pdf->download('data_report.pdf');
    }
    public function reportlokasibarangcabang()
    {
        $data = DB::table('tbl_nomor_ruangan_cabang')
        ->join('tbl_lokasi','tbl_lokasi.kd_lokasi','=','tbl_nomor_ruangan_cabang.kd_lokasi')
        ->where('tbl_nomor_ruangan_cabang.kd_cabang',Auth::user()->cabang)->get();
        return view('divisi.laporan.viewlokasi',['data'=>$data]);
    }
    public function cetakbarangperuanganpdf(Request $request)
    {
        $data = DB::table('sub_tbl_inventory')
        ->select('no_inventaris','nama_barang','merk','type','harga_perolehan')
        ->where('kd_cabang',Auth::user()->cabang)
        ->where('id_nomor_ruangan_cbaang',$request->kd_lokasi)->get();
        $pdf = PDF::loadview('divisi.laporan.report.per-ruangan',['data'=>$data])->setPaper('A4','landscape');
        return base64_encode($pdf->stream());
    }
    public function reportpeminjaman()
    {
        return view('divisi.laporan.viewpeminjaman');
    }
    public function reportstokopname()
    {
        return view('divisi.laporan.viewstokeopname');
    }
    public function postreportpeminjaman(Request $request)
    {
        $pdf = PDF::loadview('divisi.laporan.report.laporanpeminjaman',['data'=>11]);
    	return base64_encode($pdf->stream());
    }
    public function postreportstokopname(Request $request)
    {
        $pdf = PDF::loadview('divisi.laporan.report.laporanstokopname',['data'=>11]);
    	return base64_encode($pdf->stream());
    }
}
