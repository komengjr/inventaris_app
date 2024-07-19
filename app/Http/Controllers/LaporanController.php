<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
// use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Session;
// use App\Imports\LogInventarisImport;
// use Maatwebsite\Excel\Facades\Excel;
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
            ->select('no_inventaris', 'nama_barang', 'kd_inventaris', 'kd_lokasi', 'merk', 'type', 'harga_perolehan', 'status_barang')
            ->where('kd_cabang', Auth::user()->cabang)->get();
        return view('divisi.laporan.view', ['data' => $data]);
    }
    public function cetakallbarangcabang()
    {
        $data = DB::table('sub_tbl_inventory')
            ->select('no_inventaris', 'nama_barang', 'merk', 'type', 'harga_perolehan')
            ->where('kd_cabang', Auth::user()->cabang)->get();
        // $pdf = PDF::loadview('divisi.laporan.report.all-barang',['data'=>$data])->setPaper('A4','potrait');
        // return base64_encode($pdf->stream());
        // return view('divisi.laporan.report.all-barang',['data'=>$data]);
        $pdf = PDF::loadview('divisi.laporan.report.all-barang', ['data' => $data]);
        return $pdf->download('data_report.pdf');
    }
    public function reportlokasibarangcabang()
    {
        $data = DB::table('tbl_nomor_ruangan_cabang')
            ->join('tbl_lokasi', 'tbl_lokasi.kd_lokasi', '=', 'tbl_nomor_ruangan_cabang.kd_lokasi')
            ->where('tbl_nomor_ruangan_cabang.kd_cabang', Auth::user()->cabang)->get();
        return view('divisi.laporan.viewlokasi', ['data' => $data]);
    }
    public function cetakbarangperuanganpdf(Request $request)
    {
        $data = DB::table('sub_tbl_inventory')
            ->select('no_inventaris', 'nama_barang', 'merk', 'type', 'harga_perolehan', 'th_perolehan')
            ->where('kd_cabang', Auth::user()->cabang)
            ->where('status_barang','!=',5)
            ->where('id_nomor_ruangan_cbaang', $request->kd_lokasi)->get();
        $dataruangan = DB::table('tbl_nomor_ruangan_cabang')
            ->join('tbl_lokasi', 'tbl_lokasi.kd_lokasi', '=', 'tbl_nomor_ruangan_cabang.kd_lokasi')
            ->where('tbl_nomor_ruangan_cabang.id_nomor_ruangan_cbaang', $request->kd_lokasi)->first();
        $nocabang = DB::table('tbl_setting_cabang')->where('kd_cabang', Auth::user()->cabang)->first();
        $cabang = DB::table('tbl_cabang')->select('tbl_cabang.*')->where('kd_cabang',Auth::user()->cabang)->first();
        $tgl = date("d-m-Y",strtotime($request->tanggal));
        $pdf = PDF::loadview('divisi.laporan.report.per-ruangan', ['data' => $data, 'dataruangan' => $dataruangan, 'nocabang' => $nocabang , 'tgl'=>$tgl])->setPaper('A4', 'landscape');
        $pdf->output();
        $dompdf = $pdf->getDomPDF();
        $font = $dompdf->getFontMetrics()->get_font("helvetica", "bold");
        $dompdf->get_canvas()->page_text(400, 570, "{PAGE_NUM} / {PAGE_COUNT} - $dataruangan->nama_lokasi ( $dataruangan->nomor_ruangan )", $font, 10, array(0, 0, 0));
        $dompdf->get_canvas()->page_text(33, 570, "$cabang->nama_cabang", $font, 10, array(0, 0, 0));
        return base64_encode($pdf->stream());
    }
    public function cetakbarcodebarangperuanganpdf(Request $request)
    {
        if ($request->kd_lokasi == "" || $request->panjang = "" || $request->lebar == "") {
            return 'null';
        } else {
            $data = DB::table('sub_tbl_inventory')
                ->select('sub_tbl_inventory.*')
                ->where('id_nomor_ruangan_cbaang', $request->kd_lokasi)
                ->where('kd_cabang', Auth::user()->cabang)
                ->get();
            $panjangx = $request->panjang_/2.54*72;
            $lebar = $request->lebar/2.54*72;
            $customPaper = array(0, 0, $panjangx, $lebar);
            $pdf = PDF::loadview('pdf.cetak_barang', ['data' => $data, 'panjang'=>$request->panjang_,'lebar'=>$request->lebar])->setPaper($customPaper, 'landscape')->setOptions(['defaultFont' => 'Courier']);
            return base64_encode($pdf->stream());
        }

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
        $data = DB::table('tbl_peminjaman')->where('kd_cabang', Auth::user()->cabang)->whereBetween('tgl_pinjam', [$request->startdate, $request->enddate])->get();
        $pdf = PDF::loadview('divisi.laporan.report.laporanpeminjaman', ['data' => $data, 'startdate' => $request->startdate, 'enddate' => $request->enddate])->setPaper('A4', 'landscape');
        return base64_encode($pdf->stream());
    }
    public function postreportstokopname(Request $request)
    {
        $pdf = PDF::loadview('divisi.laporan.report.laporanstokopname', ['data' => 11]);
        return base64_encode($pdf->stream());
    }
    public function reportklasifikasibarangcabang()
    {
        $data = DB::table('tbl_inventory')->get();
        return view('divisi.laporan.viewklasifikasi',['data'=>$data]);
    }
    public function filterdataklasifikasi(Request $request)
    {
        $items = DB::table('sub_tbl_inventory')->where('kd_inventaris',91838130913801923809)->get();
        for ($i=0; $i < $request->total; $i++) {
            $data[$i] = DB::table('sub_tbl_inventory')->where('kd_inventaris',$request->klasifikasi[$i])->where('kd_cabang',Auth::user()->cabang)->get();
            $items=$items->merge($data[$i]);
        }
        return view('divisi.laporan.datafilterklasifikasi',['data'=>$items]);
    }
}
