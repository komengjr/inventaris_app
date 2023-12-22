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
        return view('divisi.laporan.view');
    }
    public function cetakallbarangcabang()
    {
        $data = DB::table('sub_tbl_inventory')
        ->select('no_inventaris','nama_barang','merk','type','harga_perolehan')
        ->where('kd_cabang',Auth::user()->cabang)->get();
        $pdf = PDF::loadview('divisi.laporan.report.all-barang',['data'=>$data])->setPaper('A4','potrait');
        return base64_encode($pdf->stream());
    }
}
