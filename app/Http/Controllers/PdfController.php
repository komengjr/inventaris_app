<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use DB;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use SimpleSoftwareIO\QrCode\Generator;
class PdfController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
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
        ->where('id_nomor_ruangan_cbaang',$id)
        ->where('kd_cabang',auth::user()->cabang)
        ->get();
        // dd($data);
        $qrcode = base64_encode(QrCode::format('png')->size(500)->errorCorrection('H')->generate('string'));
        $pdf = PDF::loadview('index',['data'=>$data],compact('qrcode'))->setPaper('A8','landscape');
        return $pdf->stream();
    }
    public function printbarcodebyid($id)
    {
        $data = DB::table('sub_tbl_inventory')
        ->select('sub_tbl_inventory.*')
        ->where('id',$id)
        ->where('kd_cabang',auth::user()->cabang)
        ->first();
        // dd($data);
        $customPaper = array(0,0,50.80,95.20);
        $qrcode = base64_encode(QrCode::format('png')->size(500)->errorCorrection('H')->generate('string'));
        $pdf = PDF::loadview('format-barcode',['data'=>$data],compact('qrcode'))->setPaper($customPaper,'landscape')->setOptions(['defaultFont' => 'Helvetica']);
        return $pdf->stream();
    }
    public function printbarcodeksobyid($id)
    {
        $data = DB::table('sub_tbl_inventory_kso')
        ->select('sub_tbl_inventory_kso.*')
        ->where('id',$id)
        ->where('kd_cabang',auth::user()->cabang)
        ->get();
        // dd($data);
        $qrcode = base64_encode(QrCode::format('png')->size(500)->errorCorrection('H')->generate('string'));
        $pdf = PDF::loadview('divisi.print.barcodekso',['data'=>$data],compact('qrcode'))->setPaper('A8','landscape');
        return $pdf->stream();
    }
    public function printbarcodebyidinventaris($id)
    {
        $data = DB::table('sub_tbl_inventory')
        ->select('sub_tbl_inventory.*')
        ->where('id',$id)
        ->where('kd_cabang',auth::user()->cabang)
        ->first();
        // dd($data);
        $customPaper = array(0,0,50.80,95.20);
        $qrcode = base64_encode(QrCode::format('png')->size(500)->errorCorrection('H')->generate('string'));
        $pdf = PDF::loadview('format-barcode',['data'=>$data],compact('qrcode'))->setPaper($customPaper,'landscape');
        return base64_encode($pdf->stream());
    }
    public function printdataalllokasi($id,$page)
    {
        if ($page == 'all') {
            $data = DB::table('sub_tbl_inventory')
            ->select('sub_tbl_inventory.*')
            ->where('id_nomor_ruangan_cbaang',$id)
            ->where('kd_cabang',auth::user()->cabang)
            ->get();
        } elseif($page == 1) {
            $data = DB::table('sub_tbl_inventory')
            ->select('sub_tbl_inventory.*')
            ->where('id_nomor_ruangan_cbaang',$id)
            ->where('kd_cabang',auth::user()->cabang)
            ->offset(0)->limit(50)
            ->get();
        } elseif ($page == 2) {
            $data = DB::table('sub_tbl_inventory')
            ->select('sub_tbl_inventory.*')
            ->where('id_nomor_ruangan_cbaang',$id)
            ->where('kd_cabang',auth::user()->cabang)
            ->offset(50)->limit(50)
            ->get();
        } elseif ($page == 3) {
            $data = DB::table('sub_tbl_inventory')
            ->select('sub_tbl_inventory.*')
            ->where('id_nomor_ruangan_cbaang',$id)
            ->where('kd_cabang',auth::user()->cabang)
            ->offset(100)->limit(50)
            ->get();
        } elseif ($page == 4) {
            $data = DB::table('sub_tbl_inventory')
            ->select('sub_tbl_inventory.*')
            ->where('id_nomor_ruangan_cbaang',$id)
            ->where('kd_cabang',auth::user()->cabang)
            ->offset(150)->limit(50)
            ->get();
        } elseif ($page == 5) {
            $data = DB::table('sub_tbl_inventory')
            ->select('sub_tbl_inventory.*')
            ->where('id_nomor_ruangan_cbaang',$id)
            ->where('kd_cabang',auth::user()->cabang)
            ->offset(200)->limit(50)
            ->get();
        } elseif ($page == 6) {
            $data = DB::table('sub_tbl_inventory')
            ->select('sub_tbl_inventory.*')
            ->where('id_nomor_ruangan_cbaang',$id)
            ->where('kd_cabang',auth::user()->cabang)
            ->offset(250)->limit(50)
            ->get();
        } elseif ($page == 7) {
            $data = DB::table('sub_tbl_inventory')
            ->select('sub_tbl_inventory.*')
            ->where('id_nomor_ruangan_cbaang',$id)
            ->where('kd_cabang',auth::user()->cabang)
            ->offset(300)->limit(50)
            ->get();
        } elseif ($page == 8) {
            $data = DB::table('sub_tbl_inventory')
            ->select('sub_tbl_inventory.*')
            ->where('id_nomor_ruangan_cbaang',$id)
            ->where('kd_cabang',auth::user()->cabang)
            ->offset(350)->limit(50)
            ->get();
        }

        // dd($data);
        $customPaper = array(0,0,95.00,177);
        $qrcode = base64_encode(QrCode::format('png')->size(500)->errorCorrection('H')->generate('string'));
        $pdf = PDF::loadview('divisi.report.lokasi',['data'=>$data],compact('qrcode'))->setPaper($customPaper,'landscape');
        return base64_encode($pdf->stream());
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

    public function printverifikasi($id)
    {
        // $x = $id;
        $databrg = DB::table('tbl_sub_verifdatainventaris')
        ->join('sub_tbl_inventory','sub_tbl_inventory.id_inventaris','=','tbl_sub_verifdatainventaris.id_inventaris')
        ->where('tbl_sub_verifdatainventaris.kode_verif',$id)
        ->get();
        $data = DB::table('sub_tbl_inventory')->where('kd_cabang',Auth::user()->cabang)->get();
        $ttd = DB::table('tbl_ttd')->where('kd_cabang',auth::user()->cabang)->get();
        $dataverif = DB::table('tbl_verifdatainventaris')->where('kode_verif',$id)->get();
        $pdf = PDF::loadview('divisi.print.verif',['databrg'=>$databrg, 'dataverif'=>$dataverif,'data'=>$data, 'ttd'=>$ttd])->setPaper('A4','potrait');
        return $pdf->stream();
    }
    public function printpeminjaman($id)
    {
        $databrg = DB::table('tbl_sub_peminjaman')
        ->join('tbl_peminjaman','tbl_peminjaman.id_pinjam','=','tbl_sub_peminjaman.id_pinjam')
        ->join('sub_tbl_inventory','sub_tbl_inventory.id_inventaris','=','tbl_sub_peminjaman.id_inventaris')
        ->where('tbl_peminjaman.tiket_peminjaman',$id)
        ->get();
        $no = DB::table('tbl_setting_cabang')->where('kd_cabang',Auth::user()->cabang)->first();
        $ttd = DB::table('tbl_ttd')->where('kd_cabang',auth::user()->cabang)->get();
        $datapinjam = DB::table('tbl_peminjaman')->where('tiket_peminjaman',$id)->get();
        $pdf = PDF::loadview('divisi.print.peminjaman',['databrg'=>$databrg, 'datapinjam'=>$datapinjam, 'ttd'=>$ttd, 'no'=>$no])->setPaper('A4','potrait');
        return base64_encode($pdf->stream());
    }
    public function printdatamutasi($id)
    {
        $databrg = DB::table('tbl_sub_mutasi')
        ->join('tbl_mutasi','tbl_mutasi.kd_mutasi','=','tbl_sub_mutasi.kd_mutasi')
        ->join('sub_tbl_inventory','sub_tbl_inventory.id_inventaris','=','tbl_sub_mutasi.id_inventaris')
        ->where('tbl_mutasi.kd_mutasi',$id)
        ->get();
        $ttd = DB::table('tbl_ttd')->where('kd_cabang',auth::user()->cabang)->get();
        $datamutasi = DB::table('tbl_mutasi')->where('kd_mutasi',$id)->first();
        $pdf = PDF::loadview('divisi.print.datamutasi',['databrg'=>$databrg, 'datamutasi'=>$datamutasi, 'ttd'=>$ttd])->setPaper('A4','potrait');
        return base64_encode($pdf->stream());
    }
    public function printpemusnahan($id)
    {
        $databrg = DB::table('sub_tbl_inventory')
        ->where('kd_cabang','PA')
        ->get();
        $pdf = PDF::loadview('divisi.print.pemusnahan',['databrg'=>$databrg])->setPaper('A4','potrait');
        return $pdf->stream();
    }
    public function penyelesaianpeminjaman($id)
    {
        DB::table('tbl_peminjaman')->where('tiket_peminjaman',$id)->update(
            [
                'status_pinjam' => 1,
            ]
        );
        return redirect()->back();
    }
}
