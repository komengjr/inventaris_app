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

class MaintenanceController extends Controller
{
    public function tambahdatamaintenance()
    {
        return view('divisi.maintenance.tambahdata');
    }
    public function posttambahdatamaintenance(Request $request)
    {
        Session::flash('sukses','Berhasil Membuat Tiket Maintenance');
        return redirect()->back();
    }
    public function caridatabarangmaintenance($id)
    {
        $data = DB::table('sub_tbl_inventory')->where('nama_barang', 'like', '%' . $id . '%')->get();
        return view('divisi.maintenance.daftarlistinventaris',['data'=>$data]);
    }
    public function pilihdatabarangmaintenance($id)
    {
        $data = DB::table('sub_tbl_inventory')->where('id_inventaris',$id)->first();
        return view('divisi.maintenance.formmaintenance',['data'=>$data]);
    }
}
