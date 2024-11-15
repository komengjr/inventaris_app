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
        $cekruangan = DB::table('tbl_nomor_ruangan_cabang')->where('id_nomor_ruangan_cbaang', $request->input('no_ruangan'))->first();
        if ($request->input('link') == "") {
            $gambar = '';
        } else {
            $gambar = 'public/databrg/kso/' . auth::user()->cabang . '/' . $request->input('link');
        }

        $jumlahbarang = DB::table('sub_tbl_inventory_kso')->where('kd_cabang', auth::user()->cabang)->count();
        $nomor = DB::table('tbl_setting_cabang')->where('kd_cabang', auth::user()->cabang)->first();
        $tahun = date('Y', strtotime($request->input('tgl_kso')));
        $nilai = preg_replace("/[^0-9]/", "", $request->harga_perolehan);
        $entitas = DB::table('tbl_entitas_cabang')
            ->join('tbl_cabang', 'tbl_cabang.kd_entitas_cabang', '=', 'tbl_entitas_cabang.kd_entitas_cabang')
            ->where('tbl_cabang.kd_cabang', Auth::user()->cabang)->first();
        if ($entitas) {
            DB::table('sub_tbl_inventory_kso')->insert(
                [
                    'id_inventaris' => auth::user()->cabang . '-KSO-' . mt_rand(100000, 9999999),
                    'no_inventaris' => ($jumlahbarang + 1) . '/KSO/' . $request->input('kd_inventaris') . '/' . $cekruangan->kd_lokasi . '/' . $entitas->simbol_entitas . "." . $nomor->no_cabang . '/' . date('Y'),
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
                    'no' => ($jumlahbarang + 1),
                    'created_at' => now(),
                ]
            );
            Session::flash('sukses', 'Berhasil Input Data Barang KSO');
            return redirect()->back();
        } else {
            Session::flash('gagal', 'Entitas Cabang Masih Kosong');
            return redirect()->back();
        }
    }
    public function detailbarangkso(Request $request)
    {
        $data = DB::table('sub_tbl_inventory_kso')
            ->select('sub_tbl_inventory_kso.*')
            ->where('id_inventaris', $request->id)
            ->first();
        $datalokasi = DB::table('tbl_lokasi')
            ->select('tbl_lokasi.*')
            ->get();
        $kode = DB::table('tbl_inventory')
            ->select('tbl_inventory.*')
            ->get();
        // dd($id);
        return view('divisi.data_kso.detail-data-kso', ['data' => $data, 'datalokasi' => $datalokasi, 'kode' => $kode, 'id' => $data->id]);
    }
    public function simpandetailbarangkso(Request $request)
    {
        $entitas = DB::table('tbl_entitas_cabang')
            ->join('tbl_cabang', 'tbl_cabang.kd_entitas_cabang', '=', 'tbl_entitas_cabang.kd_entitas_cabang')
            ->join('tbl_setting_cabang', 'tbl_setting_cabang.kd_cabang', '=', 'tbl_cabang.kd_cabang')
            ->where('tbl_setting_cabang.kd_cabang', Auth::user()->cabang)->first();
        $cekdata = DB::table('sub_tbl_inventory_kso')->where('id_inventaris', $request->input('kode_kode'))->first();
        if ($request->link != "") {
            $gambar = 'public/databrg/kso/' . auth::user()->cabang . '/' . $request->input('link');
        } else {
            if ($cekdata->gambar == "") {
                $gambar = "";
            } else {
                $gambar = $cekdata->gambar;
            }

        }
        if ($cekdata->kd_lokasi != $request->input('kd_lokasi') || $cekdata->kd_inventaris != $request->input('kd_inventaris')) {
            $no_ruangan = DB::table('tbl_nomor_ruangan_cabang')->where('kd_lokasi', $request->input('kd_lokasi'))->where('kd_cabang', Auth::user()->cabang)->first();
            $nilai = preg_replace("/[^0-9]/", "", $request->harga_perolehan);
            DB::table('sub_tbl_inventory_kso')
                ->where('id_inventaris', $request->input('kode_kode'))
                ->update([
                    // 'no_inventaris' => $cekdata->no . '/' . $request->input('kd_inventaris') . '/' . $request->input('kd_lokasi') . '/' . $entitas->simbol_entitas . '.' . $entitas->no_cabang . '/' . $request->input('th_perolehan'),
                    'nama_barang' => $request->input('nama_barang'),
                    'no_mou_id' => $request->input('no_mou'),
                    'no_kso_alat' => $request->input('no_kso'),
                    'kd_inventaris' => $request->input('kd_inventaris'),
                    'kd_lokasi' => $request->input('kd_lokasi'),
                    'merk' => $request->input('merk'),
                    'no_seri' => $request->input('no_seri'),
                    'tgl_kso' => $request->input('tgl_kso'),
                    'id_nomor_ruangan_cbaang' => $no_ruangan->id_nomor_ruangan_cbaang,
                    'gambar' => $gambar
                ]);
            DB::table('log_history_inventaris')->insert([
                'no_log' => 'LOG' . Auth::user()->cabang . date('Ymd-His'),
                'id_inventaris' => $request->kode_kode,
                'kategori_inventaris' => 0,
                'type_history' => 'P',
                'before_history' => $cekdata->kd_lokasi,
                'after_history' => $request->kd_lokasi,
                'created_at' => now(),
            ]);
        } else {
            $nilai = preg_replace("/[^0-9]/", "", $request->harga_perolehan);
            DB::table('sub_tbl_inventory_kso')
                ->where('id_inventaris', $request->input('kode_kode'))
                ->update([
                    'nama_barang' => $request->input('nama_barang'),
                    'no_mou_id' => $request->input('no_mou'),
                    'no_kso_alat' => $request->input('no_kso'),
                    'kd_inventaris' => $request->input('kd_inventaris'),
                    'kd_lokasi' => $request->input('kd_lokasi'),
                    'merk' => $request->input('merk'),
                    'no_seri' => $request->input('no_seri'),
                    'tgl_kso' => $request->input('tgl_kso'),
                    'gambar' => $gambar
                ]);
        }
    }
    public function uploaddokumentbarangkso(Request $request)
    {
        $data = DB::table('sub_tbl_inventory_kso')
            ->select('sub_tbl_inventory_kso.*')
            ->where('id_inventaris', $request->id)
            ->first();
        $datalokasi = DB::table('tbl_lokasi')
            ->select('tbl_lokasi.*')
            ->get();
        $kode = DB::table('tbl_inventory')
            ->select('tbl_inventory.*')
            ->get();
        $document = DB::table('document_kso')->where('id_inventaris',$request->id)->get();
        // dd($id);
        return view('divisi.data_kso.upload-dokumen', ['data' => $data, 'datalokasi' => $datalokasi, 'kode' => $kode, 'id' => $data->id , 'document'=>$document]);
    }
    public function simpandokumentbarangkso(Request $request){
        DB::table('document_kso')->insert([
            'id_inventaris'=>$request->id_inventaris,
            'periode_kso'=>$request->periode,
            'file_kso'=> 'public/document/kso/'.Auth::user()->cabang.'/'.$request->link,
            'created_at'=>now(),
        ]);
        Session::flash('sukses', 'Berhasil Upload Dokument Barang KSO');
            return redirect()->back();
    }
    public function showdokumentbarangkso(Request $request){
        $link = DB::table('document_kso')->where('id_document_kso',$request->id)->first();
        return view('divisi.data_kso.show-document-kso',['link'=>$link]);
    }
}
