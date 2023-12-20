<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
// use App\Imports\LogInventarisImport;
// use Maatwebsite\Excel\Facades\Excel;

class MaintenanceController extends Controller
{
    public function tambahdatamaintenance()
    {
        return view('divisi.maintenance.tambahdata');
    }
    public function menumaintenance()
    {
        $dataperiode = DB::table('tbl_periode')->where('status_periode',1)->get();
        $datamaintenance = DB::table('tbl_maintenance')
        ->where('tbl_maintenance.kd_cabang',Auth::user()->cabang)
        ->join('sub_tbl_inventory','sub_tbl_inventory.id_inventaris','=','tbl_maintenance.id_inventaris')->get();
        return view('divisi.menumaintenance',[ 'dataperiode' => $dataperiode, 'datamaintenance'=>$datamaintenance]);
    }
    public function posttambahdatamaintenance(Request $request)
    {
        if ($request->link == "") {
            $file = "";
        } else {
            $file = 'public/upload/documentmaintenance/'.Auth::user()->cabang.'/'.$request->link;
        }

        DB::table('tbl_maintenance')->insert([
            'kd_maintenance'=>'M_'.date('d-m-Y').'_'.mt_rand(100,999),
            'id_inventaris'=>$request->id_inventaris,
            'pelapor'=>$request->pelapor,
            'kd_cabang'=>Auth::user()->cabang,
            'tgl_mulai'=>$request->tgl_mulai,
            'tgl_akhir'=>'-',
            'status_maintenance'=>1,
            'ket_maintenance'=>$request->ket_maintenance,
            'file_maintenance'=>$file,
        ]);
        Session::flash('sukses','Berhasil Membuat Tiket Maintenance');
        return redirect()->back();
    }
    public function caridatabarangmaintenance($id)
    {
        $data = DB::table('sub_tbl_inventory')->where('nama_barang', 'like', '%' . $id . '%')->where('kd_cabang',Auth::user()->cabang)->get();
        return view('divisi.maintenance.daftarlistinventaris',['data'=>$data]);
    }
    public function pilihdatabarangmaintenance($id)
    {
        $data = DB::table('sub_tbl_inventory')->where('id_inventaris',$id)->first();
        return view('divisi.maintenance.formmaintenance',['data'=>$data]);
    }
    public function showfilemaintenance($id)
    {
        $data = DB::table('tbl_maintenance')->where('id_maintenance',$id)->first();
        return view('divisi.maintenance.datafilemaintenance',['data'=>$data]);
    }
    public function tindakanmaintenance($id)
    {
        return view('divisi.maintenance.tindakanmaintenance',['id'=>$id]);
    }
    public function posttindakanmaintenance(Request $request)
    {
    DB::table('tbl_maintenance')->where('kd_maintenance',$request->id)->update([
        'tgl_akhir'=>$request->tgl_akhir,
        'ket_maintenance'=>$request->deskripsi,
        'status_maintenance'=>2,
    ]);
    Session::flash('sukses','Berhasil Update Data');
    return redirect()->back();
    }
    public function printmaintenance($id)
    {
        $data = 123;
        $qrcode = base64_encode(QrCode::format('svg')->size(200)->errorCorrection('H')->generate('string'));
        $pdf = PDF::loadview('divisi.maintenance.cetakmaintenance',['id'=>$id,'data'=>$data],compact('qrcode'))->setPaper('A4','potrait');
        return base64_encode($pdf->stream());
    }
}
