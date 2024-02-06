<?php

namespace App\Http\Controllers;
use App\Exports\DataInventarisExport;
use App\Exports\DataInventarisExportRuangan;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;
use DB;
class ExcelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data = DB::table('tbl_cabang')->where('kd_cabang',Auth::user()->cabang)->first();
        return Excel::download(new DataInventarisExport(Auth::user()->cabang), 'inventaris_'.$data->nama_cabang.'.xlsx');
    }
    public function exportruangan($id)
    {
        $datalokasi = DB::table('tbl_nomor_ruangan_cabang')
        ->join('tbl_lokasi','tbl_lokasi.kd_lokasi','=','tbl_nomor_ruangan_cabang.kd_lokasi')
        ->where('id_nomor_ruangan_cbaang',$id)->first();
        return Excel::download(new DataInventarisExportRuangan(Auth::user()->cabang,$id), 'inventaris_'.$id.'('.$datalokasi->nama_lokasi.').xlsx');
    }
    public function exportbarcoderuangan($id)
    {
        $data = DB::table('sub_tbl_inventory')
        ->select('sub_tbl_inventory.*')
        ->where('id_nomor_ruangan_cbaang',$id)
        ->where('kd_cabang',auth::user()->cabang)
        ->get();
        // dd($data);
        $qrcode = base64_encode(QrCode::format('png')->size(400)->errorCorrection('H')->generate('string'));
        $pdf = PDF::loadview('index',['data'=>$data],compact('qrcode'))->setPaper('A8','landscape');
        return base64_encode($pdf->stream());
    }
}
