<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\ImportSubBrg;
use App\Imports\ImportBrg;
use App\Imports\ImportLokasi;
use App\Imports\ImportNoUrutBarang;
use App\Imports\Peserta;
use App\Imports\DataPeserta;
use Maatwebsite\Excel\Facades\Excel;
use DB;
use substr;
use Session;
use Illuminate\Support\Facades\Auth;
class DataTableController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function importData()
    {
       return view('import');
    }
      
    /**
    * @return \Illuminate\Support\Collection
    */
    public function import()
    {
        Excel::import(new ImportSubBrg, request()->file('file'));
        Session::flash('sukses','Upload Data Sukses');
        return redirect()->back();
    }
    public function simpanjenisbarang()
    {
        Excel::import(new ImportBrg, request()->file('file'));
        Session::flash('sukses','Upload Data Sukses');
        return redirect()->back();
    }
    public function simpandetailbarang()
    {
        Excel::import(new ImportSubBrg, request()->file('file'));
        Session::flash('sukses','Upload Data Sukses');
        return redirect()->back();
    }
    public function simpanlokasi()
    {
        Excel::import(new ImportLokasi, request()->file('file'));
        Session::flash('sukses','Upload Data Sukses');
        return redirect()->back();
    }
    public function simpannourutbarang()
    {
        Excel::import(new ImportNoUrutBarang, request()->file('file'));
        Session::flash('sukses','Upload Data Sukses');
        return redirect()->back();
    }
    public function simpanpeserta()
    {
        Excel::import(new Peserta, request()->file('file'));
        Session::flash('sukses','Upload Data Sukses');
        return redirect()->back();
    }
    public function simpandatapeserta()
    {
        Excel::import(new DataPeserta, request()->file('file'));
        Session::flash('sukses','Upload Data Sukses');
        return redirect()->back();
    }




    public function formbarang()
    {
        $data = DB::table('tbl_inventory')
        ->select('tbl_inventory.*','no_urut_barang.*')
        ->join('no_urut_barang','no_urut_barang.no_urut_barang','=', 'tbl_inventory.no_urut_barang')
        ->orderBy('tbl_inventory.id', 'asc')
        ->get();
        return view('admin.formbarang',['data'=>$data]);
    }
    public function print($id)
    {
        $data = DB::table('sub_tbl_inventory')
        ->select('sub_tbl_inventory.*')
        ->where('kd_inventaris',$id)
        ->orderBy('sub_tbl_inventory.id', 'asc')
        ->get();
        return view('admin.print',['data'=>$data]);
    }
    public function viewdatapasien($id)
    {
        $data = DB::table('pasien_baru')
        ->select('pasien_baru.*')
        ->where('no_registrasi',$id)
        ->get();
        return view('form.viewdataregistrasi',['data'=>$data]);
    }
}
