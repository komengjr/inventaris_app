<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DivisiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function menu()
    {
        $datapinjam = DB::table('tbl_peminjaman')->get();
        return view('divisi.menu',[ 'datapinjam' => $datapinjam]);
    }
    public function tambahdatapeminjaman()
    {
        $randomString = Str::random(4);
        $tgl = date('d/m/Y');
        $jadi = 'PB-'.$tgl.'-'.$randomString;


        return view('divisi.formpeminjaman',['tiket' => $jadi ]);
    }
    public function lengkapipeminjaman($id)
    {
        $cekdata = DB::table('tbl_peminjaman')
        ->where('id_pinjam',$id)
        ->get();
        return view('divisi.menulengkapi.lengkapi_peminjaman',['cekdata'=>$cekdata]);
    }
    public function inputdatabarangpinjam($id)
    {
        $databrg = DB::table('sub_tbl_inventory')
        ->join('tbl_lokasi','tbl_lokasi.kd_lokasi','=','sub_tbl_inventory.kd_lokasi')
        ->where('kd_cabang',auth::user()->cabang)->get();
        return view('divisi.menulengkapi.inputdatabarangpinjam',['databrg'=>$databrg,'id'=>$id]);
    }
    public function tablepeminjaman($id)
    {
        return view('divisi.menulengkapi.tablepeminjaman');
    }





    public function tambahdatamutasi()
    {
        $randomString = Str::random(4);
        $tgl = date('d/m/Y');
        $jadi = 'MT-'.$tgl.'-'.$randomString;
        return view('divisi.formmutasi',['tiket' => $jadi]);
    }
    public function tambahdatapemusnahan()
    {
        $randomString = Str::random(4);
        $tgl = date('d/m/Y');
        $jadi = 'PM-'.$tgl.'-'.$randomString;
        return view('divisi.formpemusnahan',['tiket' => $jadi]);
    }
    public function posttambah(Request $request)
    {
        DB::table('tbl_peminjaman')->insert(
            [
                'tiket_peminjaman' => $request->input('tiket_peminjaman'),
                'nama_kegiatan' => $request->input('nama_kegiatan'),
                'tgl_pinjam' => $request->input('tgl_pinjam'),
                'pj_pinjam' => $request->input('pj_pinjam'),
                'status_pinjam' => 0,
                'deskripsi' => $request->input('deskripsi'),
                'created_at' => date('Y-m-d H:i:s'),
            ]);
            Session::flash('sukses','Berhasil Membuat Tiket Tugas User'.$request->input('tiket_peminjaman'));
            return redirect()->back();
    }







    public function faq()
    {
        return view('faq');
    }
}
