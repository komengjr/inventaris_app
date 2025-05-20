<?php

namespace App\Http\Controllers;

use Faker\Provider\Uuid;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Pion\Laravel\ChunkUpload\Handler\HandlerFactory;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;
use Maatwebsite\Excel\Facades\Excel;
use Session;
use DB;
use PDF;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class AppController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function url_akses($akses)
    {
        $data = DB::table('z_menu_user')->where('menu_sub_code', $akses)->where('access_code', Auth::user()->akses)->first();
        if ($data) {
            return true;
        } else {
            return false;
        }
    }
    public function dashboard($akses)
    {
        if ($this->url_akses($akses) == true) {
            $klasifikasi = DB::table('inventaris_cat')->get();
            $cabang = DB::table('tbl_cabang')->where('kd_cabang', Auth::user()->cabang)->first();
            $nonaset = DB::table('inventaris_data')->where('inventaris_data_jenis', 0)->where('inventaris_data_cabang', Auth::user()->cabang)->sum('inventaris_data_harga');
            $aset = DB::table('inventaris_data')->where('inventaris_data_jenis', 1)->where('inventaris_data_cabang', Auth::user()->cabang)->sum('inventaris_data_harga');
            $datanonaset = DB::table('inventaris_data')->where('inventaris_data_jenis', 0)->where('inventaris_data_cabang', Auth::user()->cabang)->count();
            $dataaset = DB::table('inventaris_data')->where('inventaris_data_jenis', 1)->where('inventaris_data_cabang', Auth::user()->cabang)->count();
            $ruangan = DB::table('tbl_nomor_ruangan_cabang')
                ->join('master_lokasi', 'tbl_nomor_ruangan_cabang.kd_lokasi', '=', 'master_lokasi.master_lokasi_code')
                ->where('tbl_nomor_ruangan_cabang.kd_cabang', Auth::user()->cabang)->get();
            return view('application.dashboard.home', [
                'klasifikasi' => $klasifikasi,
                'cabang' => $cabang,
                'nonaset' => $nonaset,
                'aset' => $aset,
                'datanonaset' => $datanonaset,
                'dataaset' => $dataaset,
                'ruangan' => $ruangan,
            ]);
        } else {
            return Redirect::to('dashboard');
        }

    }
    public function dashboard_add()
    {
        $lokasi = DB::table('master_lokasi')->get();
        $klasifikasi = DB::table('inventaris_klasifikasi')->get();
        return view('application.dashboard.form.form-add-non-aset', ['lokasi' => $lokasi, 'klasifikasi' => $klasifikasi]);
    }
    public function dashboard_lokasi_data_barang(Request $request)
    {
        $lokasi = DB::table('tbl_nomor_ruangan_cabang')->join('tbl_lokasi', 'tbl_lokasi.kd_lokasi', '=', 'tbl_nomor_ruangan_cabang.kd_lokasi')
            ->where('tbl_nomor_ruangan_cabang.id_nomor_ruangan_cbaang', $request->code)->first();
        $data = DB::table('inventaris_data')->where('id_nomor_ruangan_cbaang', $request->code)->where('inventaris_data_status','<',4)->get();
        return view('application.dashboard.data.data-lokasi', ['data' => $data, 'lokasi' => $lokasi, 'id' => $request->code]);
    }
    public function masteradmin_cabang_data_lokasi_print_barcode(Request $request)
    {

        $data = DB::table('inventaris_data')->where('id_nomor_ruangan_cbaang',$request->id)
        ->where('inventaris_data_cabang',auth::user()->cabang)
        ->get();
        // dd($data);
        $customPaper = array(0,0,50.80,98.00);
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadview('application.dashboard.report.barcode-lokasi',['data'=>$data])->setPaper($customPaper, 'landscape')->setOptions(['defaultFont' => 'Helvetica']);
        $pdf->output();

        return base64_encode($pdf->stream());
    }
    public function peminjaman($akses)
    {
        if ($this->url_akses($akses) == true) {
            $data = DB::table('tbl_peminjaman')->where('kd_cabang', Auth::user()->cabang)->get();
            return view('application.peminjaman.menupeminjaman', ['data' => $data]);
        } else {
            return Redirect::to('dashboard');
        }

    }
}
