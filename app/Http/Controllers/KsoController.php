<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use DB;
class KsoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function view()
    {
        $data = DB::table('sub_tbl_inventory_kso')->where('kd_cabang', Auth::user()->cabang)->get();
        return view('divisi.data_kso.data-kso', ['data' => $data]);
    }
    public function tambahbarang()
    {
        $kode = DB::table('tbl_inventory')->get();
        $ruangan = DB::table('tbl_nomor_ruangan_cabang')
            ->join('tbl_lokasi', 'tbl_lokasi.kd_lokasi', '=', 'tbl_nomor_ruangan_cabang.kd_lokasi')
            ->where('tbl_nomor_ruangan_cabang.kd_cabang', auth::user()->cabang)
            ->get();
        return view('divisi.data_kso.form-tambah', ['kode' => $kode, 'ruangan' => $ruangan]);
    }
    public function simpanbarang(Request $request)
    {
        $cekruangan = DB::table('tbl_nomor_ruangan_cabang')->where('id_nomor_ruangan_cbaang',$request->input('no_ruangan'))->first();
        if ($request->input('link') == "") {
            $gambar = '';
        } else {
            $gambar = 'public/databrg/kso/'.auth::user()->cabang.'/'.$request->input('link');
        }

        $jumlahbarang = DB::table('sub_tbl_inventory_kso')->where('kd_cabang',auth::user()->cabang)->count();
        $nomor = DB::table('tbl_setting_cabang')->where('kd_cabang',auth::user()->cabang)->first();
        $tahun = date('Y', strtotime($request->input('tgl_kso')));
        $nilai = preg_replace("/[^0-9]/","",$request->harga_perolehan);
        $entitas = DB::table('tbl_entitas_cabang')
        ->join('tbl_cabang','tbl_cabang.kd_entitas_cabang','=','tbl_entitas_cabang.kd_entitas_cabang')
        ->where('tbl_cabang.kd_cabang',Auth::user()->cabang)->first();
        if ($entitas) {
            DB::table('sub_tbl_inventory_kso')->insert(
                [
                            'id_inventaris' => auth::user()->cabang.'-KSO-'.mt_rand(100000, 9999999),
                            'no_inventaris' => ($jumlahbarang+1).'/KSO/'.$request->input('kd_inventaris').'/'.$cekruangan->kd_lokasi.'/'.$entitas->simbol_entitas.".".$nomor->no_cabang.'/'.date('Y'),
                            'nama_barang' => $request->input('nama_barang'),
                            'no_mou_id' => $request->input('no_mou'),
                            'no_kso_alat' => $request->input('no_kso'),
                            'gambar' => $gambar,
                            'kd_inventaris' => $request->input('kd_inventaris'),
                            'kd_lokasi' => $cekruangan->kd_lokasi,
                            'tgl_kso' => $request->tgl_kso,
                            'id_nomor_ruangan_cbaang' => $request->input('no_ruangan'),
                            'kd_cabang' => auth::user()->cabang,
                            'no_seri' => $request->input('no_seri'),
                            'merk' => $request->input('merk'),
                            'kondisi_barang' => 'BAIK',
                            'status_barang' => 0,
                            'no' => ($jumlahbarang+1),
                            'created_at' => now(),
                ]
            );
            Session::flash('sukses','Berhasil Input Data Barang KSO');
            return redirect()->back();
        }else{
            Session::flash('gagal','Entitas Cabang Masih Kosong');
            return redirect()->back();
        }
    }
}
