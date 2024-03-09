<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function formmutasi()
    {
        $data = DB::table('tbl_mutasi')
            ->select('tbl_mutasi.*')
            ->get();
        return view('admin.form_mutasi', ['data' => $data]);
    }
    public function inputdatamutasibaru(Request $request)
    {
        $randomString = Str::random(5);
        // $mytime = Carbon\Carbon::now();
        if ($request->input('jenis_mutasi') == 1) {
            DB::table('tbl_mutasi')->insert(
                [
                    'kd_mutasi' => 'mutasi-' . $randomString,
                    'kd_cabang' => auth::user()->cabang,
                    'jenis_mutasi' => $request->input('jenis_mutasi'),
                    'asal_mutasi' => auth::user()->cabang,
                    'target_mutasi' => auth::user()->cabang,
                    'departemen' => $request->input('departemen'),
                    'divisi' => $request->input('divisi'),
                    'penanggung_jawab' => $request->input('pj'),
                    'tanggal_buat' => Carbon::now()->format('d-m-Y H:i:s'),
                    'penerima' => $request->input('penerima'),
                    'menyetujui' => $request->input('menyetujui'),
                    'yang_menyerahkan' => $request->input('ym'),
                    'ket' => 1,
                ]
            );
        } elseif ($request->input('jenis_mutasi') == 2) {
            DB::table('tbl_mutasi')->insert(
                [
                    'kd_mutasi' => 'mutasi-' . $randomString,
                    'kd_cabang' => auth::user()->cabang,
                    'jenis_mutasi' => $request->input('jenis_mutasi'),
                    'asal_mutasi' => auth::user()->cabang,
                    'target_mutasi' => auth::user()->cabang,
                    'departemen' => $request->input('departemen'),
                    'divisi' => $request->input('divisi'),
                    'penanggung_jawab' => $request->input('pj'),
                    'tanggal_buat' => Carbon::now()->format('d-m-Y H:i:s'),
                    'penerima' => $request->input('penerima'),
                    'menyetujui' => $request->input('menyetujui'),
                    'yang_menyerahkan' => $request->input('ym'),
                    'ket' => 1,
                ]
            );
        } elseif ($request->input('jenis_mutasi') == 3) {
            DB::table('tbl_mutasi')->insert(
                [
                    'kd_mutasi' => 'mutasi-' . $randomString,
                    'kd_cabang' => auth::user()->cabang,
                    'jenis_mutasi' => $request->input('jenis_mutasi'),
                    'asal_mutasi' => auth::user()->cabang,
                    'target_mutasi' => auth::user()->cabang,
                    'departemen' => $request->input('departemen'),
                    'divisi' => $request->input('divisi'),
                    'penanggung_jawab' => $request->input('pj'),
                    'tanggal_buat' => Carbon::now()->format('d-m-Y H:i:s'),
                    'penerima' => $request->input('penerima'),
                    'menyetujui' => $request->input('menyetujui'),
                    'yang_menyerahkan' => $request->input('ym'),
                    'ket' => 1,
                ]
            );
        } elseif ($request->input('jenis_mutasi') == 4) {
            DB::table('tbl_mutasi')->insert(
                [
                    'kd_mutasi' => 'mutasi-' . $randomString,
                    'kd_cabang' => auth::user()->cabang,
                    'jenis_mutasi' => $request->input('jenis_mutasi'),
                    'asal_mutasi' => auth::user()->cabang,
                    'target_mutasi' => $request->input('target_lokasi'),
                    'departemen' => $request->input('departemen'),
                    'divisi' => $request->input('divisi'),
                    'penanggung_jawab' => $request->input('pj'),
                    'tanggal_buat' => Carbon::now()->format('d-m-Y H:i:s'),
                    'penerima' => $request->input('penerima'),
                    'menyetujui' => $request->input('menyetujui'),
                    'yang_menyerahkan' => $request->input('ym'),
                    'ket' => 1,
                ]
            );
        }


        $data = DB::table('tbl_mutasi')
            ->select('tbl_mutasi.*')
            ->get();
        return view('admin.form.tablemutasi', ['data' => $data]);
    }
    public function tampilformmuitasi($id)
    {
        $data = DB::table('tbl_mutasi')
            ->select('tbl_mutasi.*')
            ->where('id_mutasi', $id)
            ->get();
        $databrg = DB::table('tbl_sub_mutasi')
            ->select('tbl_sub_mutasi.*', 'sub_tbl_inventory.kd_inventaris', 'sub_tbl_inventory.nama_barang', 'sub_tbl_inventory.merk', 'sub_tbl_inventory.type', 'sub_tbl_inventory.no_seri', 'sub_tbl_inventory.th_pembuatan', 'sub_tbl_inventory.harga_perolehan', 'sub_tbl_inventory.th_perolehan', 'sub_tbl_inventory.gambar')
            ->join('sub_tbl_inventory', 'sub_tbl_inventory.id', '=', 'tbl_sub_mutasi.id_inventaris')
            ->where('tbl_sub_mutasi.kd_mutasi', $data[0]->id_mutasi)
            ->get();
        return view('admin.form.subdatamutasi', ['data' => $data, 'databrg' => $databrg]);
    }
    public function tambahsubdatamutasibarangx($id)
    {

        $data_lokasi = DB::table('tbl_lokasi')
            ->select('tbl_lokasi.*')
            ->get();
        return view('admin.form.inputdatabarang', ['data_lokasi' => $data_lokasi, 'id' => $id]);
    }
    public function selectlokasi($id, $kd)
    {
        $data_brg = DB::table('sub_tbl_inventory')
            ->select('sub_tbl_inventory.*')
            ->where('kd_lokasi', $id)
            ->where('kd_cabang', auth::user()->cabang)
            ->get();
        $lokasi = DB::table('tbl_lokasi')
            ->select('tbl_lokasi.*')
            ->get();

        return view('admin.form.selectlokasi', ['data_brg' => $data_brg, 'id' => $kd, 'lokasi' => $lokasi]);
    }

    public function kliktambahbrgmutasi(Request $request, $id)
    {
        $cekbrg = DB::table('sub_tbl_inventory')
            ->select('sub_tbl_inventory.*')
            ->where('id', $request->input('kd_inventaris'))
            ->get();

        DB::table('tbl_sub_mutasi')->insert(
            [
                'kd_mutasi' => $id,
                'id_inventaris' => $request->input('kd_inventaris'),
                'kd_lokasi_awal' => $cekbrg[0]->kd_lokasi,
                'kd_lokasi_tujuan' => $request->input('kd_lokasi'),
                'kd_cabang_awal' => $cekbrg[0]->kd_cabang,
                'kd_cabang_tujuan' => $cekbrg[0]->kd_cabang,
                'ket' => 1,
            ]
        );
        $databrg = DB::table('tbl_sub_mutasi')
            ->select('tbl_sub_mutasi.*', 'sub_tbl_inventory.*')
            ->join('sub_tbl_inventory', 'sub_tbl_inventory.id', '=', 'tbl_sub_mutasi.id_inventaris')
            ->where('tbl_sub_mutasi.id_mutasi', $id)
            ->get();
        // $data = DB::table('sub')
        return view('admin.form.tablebarangmutasi', ['databrg' => $databrg]);
    }
    // Form Pemusnagan---------------------------------------------------------------------------------------
    public function formmusnah()
    {
        $data = DB::table('tbl_musnah')
            ->select('tbl_musnah.*')
            ->get();
        return view('admin.form_musnah', ['data' => $data]);
    }
    public function inputdatamusnahbaru(Request $request)
    {
        $randomString = Str::random(5);
        DB::table('tbl_musnah')->insert(
            [
                'no_surat' => $randomString,
                'kd_cabang' => 33,
                'tgl_buat' => $request->input('tgl_buat'),
                'dasar_pengajuan' => $request->input('dasar_pengajuan'),
                'penggagas' => $request->input('penggagas'),
                'user_verifikasi' => $request->input('user_verifikasi'),
                'user_persetujuan' => $request->input('user_persetujuan'),
                'user_eksekusi' => $request->input('user_eksekusi'),
                'ket' => 1,
            ]
        );
        $data = DB::table('tbl_musnah')
            ->select('tbl_musnah.*')
            ->get();

        return view('admin.form.tablepemusnahan', ['data' => $data]);
    }
    public function xxshowdatamusnah($id)
    {
        $data = DB::table('tbl_musnah')
            ->select('tbl_musnah.*')
            ->where('id_musnah', $id)
            ->get();
        $databrg = DB::table('tbl_sub_musnah')
            ->select('tbl_sub_musnah.*', 'sub_tbl_inventory.kd_inventaris', 'sub_tbl_inventory.nama_barang', 'sub_tbl_inventory.merk', 'sub_tbl_inventory.type', 'sub_tbl_inventory.no_seri', 'sub_tbl_inventory.th_pembuatan', 'sub_tbl_inventory.harga_perolehan', 'sub_tbl_inventory.th_perolehan', 'sub_tbl_inventory.gambar')
            ->join('sub_tbl_inventory', 'sub_tbl_inventory.id', '=', 'tbl_sub_musnah.id_inventaris')
            ->where('tbl_sub_musnah.id_musnah', $id)
            ->get();
        return view('admin.form.form_pemusnahan', ['data' => $data, 'databrg' => $databrg]);
    }
    public function addpemusnahanbarang($id)
    {
        $data_lokasi = DB::table('tbl_lokasi')
            ->select('tbl_lokasi.*')
            ->get();
        return view('admin.form.tbl_pemusnahan', ['data_lokasi' => $data_lokasi, 'id' => $id]);
    }

    public function selectlokasi1($id, $kd)
    {
        $data_brg = DB::table('sub_tbl_inventory')
            ->select('sub_tbl_inventory.*')
            ->where('kd_lokasi', $id)
            ->where('kd_cabang', auth::user()->cabang)
            ->get();

        return view('admin.form.selectlokasi1', ['data_brg' => $data_brg, 'id' => $kd]);
    }
    public function kliktambahbrgmusnah(Request $request, $id)
    {

        DB::table('tbl_sub_musnah')->insert(
            [
                'id_musnah' => $id,
                'id_inventaris' => $request->input('kd_inventaris'),
                'ket' => 1,
            ]
        );
        $databrg = DB::table('tbl_sub_musnah')
            ->select('tbl_sub_musnah.*', 'sub_tbl_inventory.kd_inventaris', 'sub_tbl_inventory.nama_barang', 'sub_tbl_inventory.merk', 'sub_tbl_inventory.type', 'sub_tbl_inventory.no_seri', 'sub_tbl_inventory.th_pembuatan', 'sub_tbl_inventory.harga_perolehan', 'sub_tbl_inventory.th_perolehan', 'sub_tbl_inventory.gambar')
            ->join('sub_tbl_inventory', 'sub_tbl_inventory.id', '=', 'tbl_sub_musnah.id_inventaris')
            ->where('tbl_sub_musnah.id_musnah', $id)
            ->get();
        // $data = DB::table('sub')
        return view('admin.form.tablebarangmusnah', ['databrg' => $databrg]);
    }
    public function hapussubtablemusnah($id, $no)
    {
        DB::table('tbl_sub_musnah')->where('id', $id)->delete();
        $databrg = DB::table('tbl_sub_musnah')
            ->select('tbl_sub_musnah.*', 'sub_tbl_inventory.kd_inventaris', 'sub_tbl_inventory.nama_barang', 'sub_tbl_inventory.merk', 'sub_tbl_inventory.type', 'sub_tbl_inventory.no_seri', 'sub_tbl_inventory.th_pembuatan', 'sub_tbl_inventory.harga_perolehan', 'sub_tbl_inventory.th_perolehan', 'sub_tbl_inventory.gambar')
            ->join('sub_tbl_inventory', 'sub_tbl_inventory.id', '=', 'tbl_sub_musnah.id_inventaris')
            ->where('tbl_sub_musnah.id_musnah', $no)
            ->get();
        return view('admin.form.tablebarangmusnah', ['databrg' => $databrg]);
    }
    public function datapemusnahaninventaris()
    {
        $datapemusnahan = DB::table('tbl_pemusnahan')
            ->join('sub_tbl_inventory', 'sub_tbl_inventory.id_inventaris', '=', 'tbl_pemusnahan.id_inventaris')
            ->join('tbl_cabang', 'tbl_cabang.kd_cabang', '=', 'sub_tbl_inventory.kd_cabang')
            ->get();
        return view('admin.pemusnahan.list-pemusnahan', ['datapemusnahan' => $datapemusnahan]);
    }
    public function senddatapemusnahaninventaris(Request $request)
    {
        $data = DB::table('tbl_pemusnahan')->get();
        foreach ($data as $value) {
            DB::table('sub_tbl_inventory')->where('id_inventaris', $value->id_inventaris)
                ->update([
                    'status_barang' => 5,
                ]);
        }
        return redirect()->back();
    }
    public function hapussubtablemutasi($id, $no)
    {
        DB::table('tbl_sub_mutasi')->where('id', $id)->delete();
        $databrg = DB::table('tbl_sub_mutasi')
            ->select('tbl_sub_mutasi.*', 'sub_tbl_inventory.kd_inventaris', 'sub_tbl_inventory.nama_barang', 'sub_tbl_inventory.merk', 'sub_tbl_inventory.type', 'sub_tbl_inventory.no_seri', 'sub_tbl_inventory.th_pembuatan', 'sub_tbl_inventory.harga_perolehan', 'sub_tbl_inventory.th_perolehan', 'sub_tbl_inventory.gambar')
            ->join('sub_tbl_inventory', 'sub_tbl_inventory.id', '=', 'tbl_sub_mutasi.id_inventaris')
            ->where('tbl_sub_mutasi.id_mutasi', $no)
            ->get();
        return view('admin.form.tablebarangmutasi', ['databrg' => $databrg]);
    }
    public function jenis_mutasi($id)
    {
        return view('admin.form.jenis_mutasi', ['id' => $id]);
    }
    // PEMINJAMAN
    public function datapeminjamaninventaris(Request $request)
    {
        $datapeminjaman = DB::table('tbl_peminjaman')
            ->join('tbl_cabang', 'tbl_cabang.kd_cabang', '=', 'tbl_peminjaman.kd_cabang')
            ->join('tbl_staff', 'tbl_staff.nip', '=', 'tbl_peminjaman.pj_pinjam')->get();
        return view('admin.peminjaman.list-peminjaman-barang', ['datapeminjaman' => $datapeminjaman]);
    }

}
