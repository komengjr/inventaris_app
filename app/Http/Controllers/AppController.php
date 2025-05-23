<?php

namespace App\Http\Controllers;

use App\Exports\DataBarangAsetExport;
use App\Exports\DataBarangNonAset;
use App\Exports\DataBarangNonAsetExport;
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
use App\Exports\DataInventarisExport;
use App\Exports\DataInventarisExportRuangan;
class AppController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function dashboard_home()
    {
        return view('application.dashboard');
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
            $datakso = DB::table('sub_tbl_inventory_kso')->where('kd_cabang', Auth::user()->cabang)->count();
            $documentkso = DB::table('document_kso')
                ->join('sub_tbl_inventory_kso', 'sub_tbl_inventory_kso.id_inventaris', '=', 'document_kso.id_inventaris')
                ->where('sub_tbl_inventory_kso.kd_cabang', Auth::user()->cabang)->count();
            return view('application.dashboard.home', [
                'klasifikasi' => $klasifikasi,
                'cabang' => $cabang,
                'nonaset' => $nonaset,
                'aset' => $aset,
                'datanonaset' => $datanonaset,
                'dataaset' => $dataaset,
                'ruangan' => $ruangan,
                'datakso' => $datakso,
                'documentkso' => $documentkso,
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
    public function dashboard_data_non_aset(Request $request)
    {
        $data = DB::table('inventaris_data')->where('inventaris_data_jenis', 0)->where('inventaris_data_cabang', Auth::user()->cabang)->get();
        return view('application.dashboard.data.data-non-aset', ['data' => $data]);
    }
    public function dashboard_export_data_non_aset(Request $request)
    {
        return view('application.dashboard.data.export-data-non-aset');
    }
    public function dashboard_export_data_non_aset_data(Request $request)
    {
        return 132;
    }
    public function dashboard_export_data_non_aset_excel(Request $request)
    {
        $data = DB::table('tbl_cabang')->where('kd_cabang', Auth::user()->cabang)->first();
        return Excel::download(new DataBarangNonAsetExport(Auth::user()->cabang), 'inventaris_non_aset' . $data->nama_cabang . '.xlsx');
    }
    public function dashboard_export_data_non_aset_pdf()
    {
        $data = DB::table('tbl_cabang')
        ->join('tbl_entitas_cabang','tbl_entitas_cabang.kd_entitas_cabang','=','tbl_cabang.kd_entitas_cabang')
        ->where('tbl_cabang.kd_cabang',Auth::user()->cabang)->first();
        $barang = DB::table('inventaris_data')->where('inventaris_data_jenis',0)->where('inventaris_data_cabang',Auth::user()->cabang)->get();
        $image = base64_encode(file_get_contents(public_path('icon.png')));
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadview('application.dashboard.data.report.data-pdf-non-aset',['data'=>$data,'brg'=>$barang], compact('image'))->setPaper('A4', 'landscape')->setOptions(['defaultFont' => 'Helvetica']);
        $pdf->output();
        return base64_encode($pdf->stream());
    }
    public function dashboard_export_data_aset(Request $request)
    {
        return view('application.dashboard.data.export-data-aset');
    }
    public function dashboard_export_data_aset_data(Request $request)
    {
        return 123132132;
    }
    public function dashboard_export_data_aset_excel()
    {
        $data = DB::table('tbl_cabang')->where('kd_cabang', Auth::user()->cabang)->first();
        return Excel::download(new DataBarangAsetExport(Auth::user()->cabang), 'inventaris_aset' . $data->nama_cabang . '.xlsx');
    }
    public function dashboard_export_data_aset_pdf()
    {
        $data = DB::table('tbl_cabang')
        ->join('tbl_entitas_cabang','tbl_entitas_cabang.kd_entitas_cabang','=','tbl_cabang.kd_entitas_cabang')
        ->where('tbl_cabang.kd_cabang',Auth::user()->cabang)->first();
        $barang = DB::table('inventaris_data')->where('inventaris_data_jenis',1)->where('inventaris_data_cabang',Auth::user()->cabang)->get();
        $image = base64_encode(file_get_contents(public_path('icon.png')));
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadview('application.dashboard.data.report.data-pdf-aset',['data'=>$data,'brg'=>$barang], compact('image'))->setPaper('A4', 'landscape')->setOptions(['defaultFont' => 'Helvetica']);
        $pdf->output();
        return base64_encode($pdf->stream());
    }
    public function dashboard_data_aset(Request $request)
    {
        $data = DB::table('inventaris_data')->where('inventaris_data_jenis', 1)->where('inventaris_data_cabang', Auth::user()->cabang)->get();
        return view('application.dashboard.data.data-aset', ['data' => $data]);
    }
    public function dashboard_data_depresiasi_aset(Request $request)
    {
        $data = DB::table('tbl_depresiasi')->get();
        return view('application.dashboard.data.data-depresiasi-aset', ['data' => $data]);
    }
    public function dashboard_data_kso(Request $request)
    {
        $data = DB::table('sub_tbl_inventory_kso')->where('kd_cabang', Auth::user()->cabang)->get();
        return view('application.dashboard.data.data-kso', ['data' => $data]);
    }
    public function dashboard_lokasi_data_barang(Request $request)
    {
        $lokasi = DB::table('tbl_nomor_ruangan_cabang')->join('tbl_lokasi', 'tbl_lokasi.kd_lokasi', '=', 'tbl_nomor_ruangan_cabang.kd_lokasi')
            ->where('tbl_nomor_ruangan_cabang.id_nomor_ruangan_cbaang', $request->code)->first();
        $data = DB::table('inventaris_data')->where('id_nomor_ruangan_cbaang', $request->code)->where('inventaris_data_status', '<', 4)->get();
        return view('application.dashboard.data.data-lokasi', ['data' => $data, 'lokasi' => $lokasi, 'id' => $request->code]);
    }
    public function masteradmin_cabang_data_lokasi_print_barcode(Request $request)
    {
        $data = DB::table('inventaris_data')->where('id_nomor_ruangan_cbaang', $request->id)
            ->where('inventaris_data_cabang', auth::user()->cabang)
            ->get();
        // dd($data);
        $customPaper = array(0, 0, 50.80, 98.00);
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadview('application.dashboard.report.barcode-lokasi', ['data' => $data])->setPaper($customPaper, 'landscape')->setOptions(['defaultFont' => 'Helvetica']);
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
    // STOK OPNAME
    public function menu_stock_opname($akses)
    {
        $data = DB::table('tbl_verifdatainventaris')->where('kd_cabang', auth::user()->cabang)
            ->orderBy('id_verifdatainventaris', 'desc')
            ->get();
        return view('application.stockopname.menu-stock-opname', ['data' => $data]);
    }
    public function menu_stock_opname_kondisi_data(Request $request)
    {
        $data = DB::table('tbl_sub_verifdatainventaris')
            ->join('sub_tbl_inventory', 'sub_tbl_inventory.id_inventaris', '=', 'tbl_sub_verifdatainventaris.id_inventaris')
            ->where('kode_verif', $request->code)->where('status_data_inventaris', $request->status)->get();
        return view('application.stockopname.data-kondisi', ['data' => $data]);
    }
    public function menu_stock_opname_remove_full_data(Request $request)
    {
        return view('application.stockopname.remove-data-full-stock', ['id' => $request->code]);
    }
    public function menu_stock_opname_proses_remove_full_data(Request $request)
    {
        DB::table('tbl_sub_verifdatainventaris')->where('kode_verif', $request->code)->delete();
        return 123;
    }
    public function menu_stock_opname_proses_data(Request $request)
    {
        $cekdata = DB::table('tbl_verifdatainventaris')
            ->where('kode_verif', $request->code)
            ->first();
        $data = DB::table('sub_tbl_inventory')->where('kd_cabang', Auth::user()->cabang)->where('status_barang', '>=', 4)->get();
        $tbl_cabang = DB::table('tbl_cabang')->where('kd_cabang', auth::user()->cabang)->get();
        $lokasi = DB::table('tbl_lokasi')->get();
        $no_ruangan = DB::table('tbl_nomor_ruangan_cabang')->where('kd_cabang', Auth::user()->cabang)->orderBy('nomor_ruangan', 'ASC')->get();
        return view('application.stockopname.proses-stock-opname', [
            'cekdata' => $cekdata,
            'cabang' => $tbl_cabang,
            'lokasi' => $lokasi,
            'no_ruangan' => $no_ruangan,
            'data' => $data,
            'id' => $request->code,
        ]);
    }
    public function menu_stock_opname_proses_data_with_kamera(Request $request)
    {
        return view('application.stockopname.kamera-stock-opname', ['tiket' => $request->code]);
    }
    public function menu_stock_opname_scan_data_with_kamera(Request $request)
    {
        $data = DB::table('sub_tbl_inventory')
            ->where('kd_cabang', Auth::user()->cabang)
            ->where('no_inventaris', $request->data)->first();
        return view('application.stockopname.result-kamera-stock', ['data' => $data, 'kode' => $request->tiket]);
    }
    public function menu_stock_opname_proses_data_with_scanner(Request $request)
    {
        return view('application.stockopname.scanner-stock-opname', ['tiket' => $request->code]);
    }
    public function menu_stock_opname_scan_data_with_scanner(Request $request)
    {
        $data = DB::table('sub_tbl_inventory')
            ->where('kd_cabang', Auth::user()->cabang)
            ->where('no_inventaris', $request->nama)->first();
        return view('application.stockopname.hasil-scanner', ['data' => $data, 'kode' => $request->tiket]);
    }
    public function menu_stock_opname_edit_data_tanggal(Request $request)
    {
        $data = DB::table('tbl_verifdatainventaris')->where('kode_verif', $request->code)->first();
        return view('application.stockopname.form-edit-tgl', ['data' => $data]);
    }

    // MENU MUTASI
    public function menu_mutasi($akses)
    {
        if ($this->url_akses($akses) == true) {
            $data = DB::table('tbl_mutasi')->where('kd_cabang', auth::user()->cabang)->orderBy('id_mutasi', 'DESC')->get();
            $order = DB::table('tbl_mutasi')->where('target_mutasi', Auth::user()->cabang)->where('status_mutasi', 0)->count();
            $rekap = DB::table('tbl_mutasi')->where('target_mutasi', Auth::user()->cabang)->where('status_mutasi', 1)->count();
            $asal = DB::table('tbl_mutasi')->where('asal_mutasi', Auth::user()->cabang)->count();
            $target = DB::table('tbl_mutasi')->where('target_mutasi', Auth::user()->cabang)->count();
            $jumlah = $asal + $target;
            $datakategori = DB::table('no_urut_barang')->get();
            return view('application.mutasi.menumutasi', ['datakategori' => $datakategori, 'data' => $data, 'order' => $order, 'rekap' => $rekap, 'jumlah' => $jumlah]);
        } else {
            return Redirect::to('dashboard');
        }
    }
    // MENU PEMUSNAHAN
    public function menu_pemusnahan($akses)
    {
        if ($this->url_akses($akses) == true) {
            return view('application.pemusnahan.menupemusnahan');
        } else {
            return Redirect::to('dashboard');
        }
    }
}
