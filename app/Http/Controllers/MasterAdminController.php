<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use DB;
class MasterAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function masteradmin_user()
    {
        if (Auth::user()->akses == 'admin') {
            return view('application.admin.masteruser');
        } else {
            return view('application.error.404');
        }
    }
    public function masteradmin_cabang()
    {
        if (Auth::user()->akses == 'admin') {
            $data = DB::table('tbl_cabang')
                ->join('tbl_setting_cabang', 'tbl_cabang.kd_cabang', '=', 'tbl_setting_cabang.kd_cabang')
                ->join('tbl_entitas_cabang', 'tbl_entitas_cabang.kd_entitas_cabang', '=', 'tbl_cabang.kd_entitas_cabang')
                ->get();
            return view('application.admin.mastercabang', ['data' => $data]);
        } else {
            return view('application.error.404');
        }
    }
    public function masteradmin_cabang_edit(Request $request)
    {
        $data = DB::table('tbl_cabang')->where('kd_cabang', $request->code)->first();
        return view('application.admin.cabang.form-edit-cabang', ['data' => $data]);
    }
    public function masteradmin_cabang_migrasi_data_cabang(Request $request)
    {
        $cabang = DB::table('tbl_cabang')->where('kd_cabang', $request->code)->first();
        $old_brg = DB::table('sub_tbl_inventory')->where('kd_cabang', $request->code)->count();
        $new_brg = DB::table('inventaris_data')->where('inventaris_data_cabang', $request->code)->count();
        return view('application.admin.cabang.form-migrasi-kode-cabang', [
            'id' => $request->code,
            'cabang' => $cabang,
            'old_brg' => $old_brg,
            'new_brg' => $new_brg
        ]);
    }
    public function masteradmin_cabang_clone_data_master_barang(Request $request)
    {
        $data = DB::table('sub_tbl_inventory')->where('kd_cabang', $request->code)->get();
        foreach ($data as $value) {
            $check = DB::table('inventaris_data')->where('inventaris_data_code', $value->id_inventaris)->where('inventaris_data_cabang', $value->kd_cabang)->first();
            if (!$check) {
                DB::table('inventaris_data')->insert([
                    'inventaris_data_code' => $value->id_inventaris,
                    'inventaris_klasifikasi_code' => $value->kd_inventaris,
                    'inventaris_data_number' => $value->no_inventaris,
                    'inventaris_data_name' => $value->nama_barang,
                    'inventaris_data_location' => $value->kd_lokasi,
                    'inventaris_data_jenis' => $value->kd_jenis,
                    'inventaris_data_harga' => $value->harga_perolehan,
                    'inventaris_data_merk' => $value->merk,
                    'inventaris_data_type' => $value->type,
                    'inventaris_data_no_seri' => $value->no_seri,
                    'inventaris_data_suplier' => $value->suplier,
                    'inventaris_data_kondisi' => $value->kondisi_barang,
                    'inventaris_data_status' => $value->status_barang,
                    // 'inventaris_data_tgl_beli' => $value->tgl_beli,
                    'inventaris_data_cabang' => $value->kd_cabang,
                    'inventaris_data_urut' => $value->no,
                    'inventaris_data_file' => $value->gambar,
                    'id_nomor_ruangan_cbaang' => $value->id_nomor_ruangan_cbaang,
                    'created_at' => now(),
                ]);
            }
        }
        $old_brg = DB::table('sub_tbl_inventory')->where('kd_cabang', $request->code)->count();
        $new_brg = DB::table('inventaris_data')->where('inventaris_data_cabang', $request->code)->count();
        return view('application.admin.cabang.migrasi.master-barang',[
            'old_brg' => $old_brg,
            'new_brg' => $new_brg
        ]);
    }
    // MASTER BARANG
    public function masteradmin_cabang_data_barang(Request $request)
    {
        $data = DB::table('sub_tbl_inventory')->where('kd_cabang', $request->code)->get();
        $cabang = DB::table('tbl_cabang')->where('kd_cabang', $request->code)->first();
        return view('application.admin.cabang.data-barang', ['data' => $data, 'cabang' => $cabang]);
    }
    public function masteradmin_cabang_update_data_barang(Request $request)
    {
        return view('application.admin.cabang.form-edit-barang');
    }
    public function masteradmin_cabang_data_lokasi(Request $request)
    {
        $data = DB::table('tbl_nomor_ruangan_cabang')
            ->join('tbl_lokasi', 'tbl_lokasi.kd_lokasi', '=', 'tbl_nomor_ruangan_cabang.kd_lokasi')->where('tbl_nomor_ruangan_cabang.kd_cabang', $request->code)->get();
        $cabang = DB::table('tbl_cabang')->where('kd_cabang', $request->code)->first();
        return view('application.admin.cabang.data-lokasi', ['data' => $data, 'cabang' => $cabang]);
    }
    public function masteradmin_cabang_update_data_lokasi(Request $request)
    {
        return view('application.admin.cabang.form-edit-lokasi');
    }
    public function masteradmin_cabang_data_barang_lokasi(Request $request)
    {
        $data = DB::table('sub_tbl_inventory')->where('id_nomor_ruangan_cbaang', $request->code)->get();
        return view('application.admin.cabang.data-barang-lokasi', ['data' => $data]);
    }
    public function masteradmin_menu()
    {
        if (Auth::user()->akses == 'admin') {
            $data = DB::table('z_menu_sub')->get();
            return view('application.admin.mastermenu', ['data' => $data]);
        } else {
            return view('application.error.404');
        }
    }
    public function masteradmin_menu_add()
    {
        if (Auth::user()->akses == 'admin') {
            $menu = DB::table('z_menu')->get();
            return view('application.admin.menu.form-add', ['menu' => $menu]);
        } else {
            return view('application.error.404');
        }
    }
    public function masteradmin_menu_save(Request $request)
    {
        if (Auth::user()->akses == 'admin') {
            DB::table('z_menu_sub')->insert([
                'menu_sub_code' => str::uuid(),
                'menu_code' => $request->menu,
                'menu_sub_name' => $request->sub_menu,
                'menu_sub_link' => $request->link,
                'menu_sub_icon' => $request->icon,
                'menu_sub_status' => 1,
                'created_at' => now(),
            ]);
            return redirect()->back()->withSuccess('Great! Berhasil Menambahkan Data');
        } else {
            return view('application.error.404');
        }
    }
}
