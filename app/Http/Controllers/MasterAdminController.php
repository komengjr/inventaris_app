<?php

namespace App\Http\Controllers;

use App\Exports\DataBarangAsetV2Export;
use App\Exports\DataBarangNonAsetExport;
use App\Exports\DataBarangV2Export;
use Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use DB;
use PDF;
class MasterAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // USER
    public function masteradmin_user()
    {
        if (Auth::user()->akses == 'admin') {
            $data = DB::table('users')->join('tbl_cabang', 'tbl_cabang.kd_cabang', '=', 'users.cabang')->get();
            return view('application.admin.masteruser', ['data' => $data]);
        } else {
            return view('application.error.404');
        }
    }
    public function masteradmin_user_add()
    {
        $cabang = DB::table('tbl_cabang')->get();
        return view('application.admin.user.form-add', ['cabang' => $cabang]);
    }
    public function masteradmin_user_save(Request $request)
    {
        DB::table('users')->insert([
            'name' => $request->name,
            'email' => $request->username,
            'email_' => '-',
            'password' => Hash::make($request->input('pwd')),
            'akses' => $request->akses,
            'cabang' => $request->cabang,
            'created_at' => now(),
        ]);
        return redirect()->back()->withSuccess('Great! Berhasil Menambahkan Data User Cabang');
    }
    // MASTER_LOKASI
    public function masteradmin_lokasi()
    {
        if (Auth::user()->akses == 'admin') {
            $datav2 = DB::table('tbl_lokasi')->get();
            $datav3 = DB::table('master_lokasi')->get();
            return view('application.admin.masterlokasi', ['datav2' => $datav2, 'datav3' => $datav3]);
        } else {
            return view('application.error.404');
        }
    }
    public function masteradmin_lokasi_clone_data()
    {
        if (Auth::user()->akses == 'admin') {
            $data = DB::table('tbl_lokasi')->get();
            foreach ($data as $value) {
                $check = DB::table('master_lokasi')->where('master_lokasi_code', $value->kd_lokasi)->first();
                if (!$check) {
                    DB::table('master_lokasi')->insert([
                        'master_lokasi_code' => $value->kd_lokasi,
                        'master_lokasi_name' => $value->nama_lokasi,
                        'created_at' => now(),
                    ]);
                }
            }
            $data_v3 = DB::table('master_lokasi')->get();
            return view('application.admin.lokasi.clone-v3', ['data_v3' => $data_v3]);
        } else {
            return view('application.error.404');
        }
    }
    public function masteradmin_lokasi_add_data_v2()
    {
        if (Auth::user()->akses == 'admin') {
            return view('application.admin.lokasi.form-add-lokasi');
        } else {
            return view('application.error.404');
        }
    }
    public function masteradmin_lokasi_add_data_v2_save(Request $request)
    {
        if (Auth::user()->akses == 'admin') {
            $check = DB::table('tbl_lokasi')->where('kd_Lokasi', $request->kd_lokasi)->first();
            if (!$check) {
                DB::table('tbl_lokasi')->insert([
                    'kd_lokasi' => $request->kd_lokasi,
                    'nama_lokasi' => $request->nama_lokasi,
                    'created_at' => now(),
                ]);
                return redirect()->back()->withSuccess('Great! Berhasil Menambahkan Data Lokasi Ver. 2');
            } else {
                return redirect()->back()->withError('Gagal! Kode Lokasi Ver. 2 Sudah ada');
            }

        } else {
            return view('application.error.404');
        }
    }

    // MASTER_KLASIFIKASI
    public function masteradmin_klasifikasi()
    {
        if (Auth::user()->akses == 'admin') {
            $data_v2 = DB::table('tbl_inventory')->get();
            $data_v3 = DB::table('inventaris_klasifikasi')->get();
            return view('application.admin.masterklasifikasi', ['data_v2' => $data_v2, 'data_v3' => $data_v3]);
        } else {
            return view('application.error.404');
        }
    }
    public function masteradmin_klasifikasi_clone_data(Request $request)
    {
        $data = DB::table('tbl_inventory')->get();
        foreach ($data as $value) {
            $check = DB::table('inventaris_klasifikasi')->where('inventaris_klasifikasi_code', $value->kd_inventaris)->first();
            if (!$check) {
                DB::table('inventaris_klasifikasi')->insert([
                    'inventaris_klasifikasi_code' => $value->kd_inventaris,
                    'inventaris_cat_code' => $value->no_urut_barang,
                    'inventaris_klasifikasi_name' => $value->nama_klasifikasi_barang,
                    'inventaris_klasifikasi_file' => 'far fa-image',
                    'created_at' => now(),
                ]);
            }
        }
        $data_v3 = DB::table('inventaris_klasifikasi')->get();
        return view('application.admin.klasifikasi.clone-v3', ['data_v3' => $data_v3]);
    }
    public function masteradmin_klasifikasi_add_data_v2()
    {
        $cat = DB::table('no_urut_barang')->get();
        return view('application.admin.klasifikasi.form-add-v2', ['cat' => $cat]);
    }
    public function masteradmin_klasifikasi_add_data_v2_save(Request $request)
    {
        $check = DB::table('tbl_inventory')->where('kd_inventaris', $request->kd_klasifikasi)->first();
        if ($check) {
            return redirect()->back()->withSuccess('Warning! Kode Klasifikasi Sudah Ada');
        } else {
            DB::table('tbl_inventory')->insert([
                'kd_inventaris' => $request->kd_klasifikasi,
                'no_urut_barang' => $request->no_urut,
                'nama_klasifikasi_barang' => $request->nama_klasifikasi,
                'kd_cabang' => '-',
                'created_at' => now()
            ]);
            return redirect()->back()->withSuccess('Great! Berhasil Menambahkan Data klasifikasi Ver. 2');
        }

    }
    public function masteradmin_category()
    {
        $data_v2 = DB::table('no_urut_barang')->get();
        $data_v3 = DB::table('inventaris_cat')->get();
        return view('application.admin.mastercategory', ['data_v2' => $data_v2, 'data_v3' => $data_v3]);
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
            if ($value->tgl_beli == "") {
                $tgl = $value->th_perolehan . "-01-02";
            } elseif ($value->tgl_beli == null) {
                $tgl = $value->th_perolehan . "-01-02";
            } else {
                $tgl = $value->tgl_beli;
            }
            if ($value->kd_jenis == "") {
                $kd_jenis = 0;
            } else {
                $kd_jenis = $value->kd_jenis;
            }

            $newdate = date('Y-m-d', strtotime($tgl));
            if (!$check) {
                DB::table('inventaris_data')->insert([
                    'inventaris_data_code' => $value->id_inventaris,
                    'inventaris_klasifikasi_code' => $value->kd_inventaris,
                    'inventaris_data_number' => $value->no_inventaris,
                    'inventaris_data_name' => $value->nama_barang,
                    'inventaris_data_location' => $value->kd_lokasi,
                    'inventaris_data_jenis' => $kd_jenis,
                    'inventaris_data_harga' => $value->harga_perolehan,
                    'inventaris_data_merk' => $value->merk,
                    'inventaris_data_type' => $value->type,
                    'inventaris_data_no_seri' => $value->no_seri,
                    'inventaris_data_suplier' => $value->suplier,
                    'inventaris_data_kondisi' => $value->kondisi_barang,
                    'inventaris_data_status' => $value->status_barang,
                    'inventaris_data_tgl_beli' => $newdate,
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
        return view('application.admin.cabang.migrasi.master-barang', [
            'old_brg' => $old_brg,
            'new_brg' => $new_brg
        ]);
    }
    public function masteradmin_cabang_reset_clone_data_master_barang(Request $request)
    {
        DB::table('inventaris_data')->where('inventaris_data_cabang', $request->code)->delete();
        $old_brg = DB::table('sub_tbl_inventory')->where('kd_cabang', $request->code)->count();
        $new_brg = DB::table('inventaris_data')->where('inventaris_data_cabang', $request->code)->count();
        return view('application.admin.cabang.migrasi.master-barang', [
            'old_brg' => $old_brg,
            'new_brg' => $new_brg
        ]);

    }
    public function masteradmin_cabang_export_excel_data_master_barang($id)
    {
        $data = DB::table('tbl_cabang')->where('kd_cabang', $id)->first();
        return Excel::download(new DataBarangV2Export($id), 'INVENTARIS_NON_ASET_' . $data->nama_cabang . '.xlsx');
    }
    public function masteradmin_cabang_export_excel_data_aset_master_barang($id)
    {
        $data = DB::table('tbl_cabang')->where('kd_cabang', $id)->first();
        return Excel::download(new DataBarangAsetV2Export($id), 'INVENTARIS_ASET_' . $data->nama_cabang . '.xlsx');
    }
    // MASTER BARANG
    public function masteradmin_cabang_data_barang(Request $request)
    {
        $data = DB::table('sub_tbl_inventory')->where('kd_cabang', $request->code)->get();
        $cabang = DB::table('tbl_cabang')->where('kd_cabang', $request->code)->first();
        return view('application.admin.cabang.data-barang', ['data' => $data, 'cabang' => $cabang]);
    }
    public function masteradmin_cabang_option_data_barang(Request $request)
    {
        if ($request->id == 'v02') {
            $data = DB::table('sub_tbl_inventory')->where('kd_cabang', $request->code)->get();
            return view('application.admin.cabang.barang.data-version-02', ['data' => $data]);
        } elseif ($request->id == 'v03') {
            $data = DB::table('inventaris_data')->where('inventaris_data_cabang', $request->code)->get();
            return view('application.admin.cabang.barang.data-version-03', ['data' => $data]);
        }
    }
    public function masteradmin_cabang_update_data_barang(Request $request)
    {
        $data = DB::table('sub_tbl_inventory')->where('id_inventaris', $request->code)->first();
        return view('application.admin.cabang.form-edit-barang', ['data' => $data]);
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
    public function masteradmin_cabang_data_peminjaman(Request $request)
    {
        $cabang = DB::table('tbl_cabang')->where('kd_cabang', $request->code)->first();
        $data = DB::table('tbl_peminjaman')->where('kd_cabang', $request->code)->get();
        return view('application.admin.cabang.data-peminjaman-cabang', ['data' => $data, 'cabang' => $cabang]);
    }
    public function masteradmin_cabang_data_peminjaman_sinkronisas(Request $request){
        $data = DB::table('tbl_peminjaman')->where('kd_cabang',$request->code)->get();
        foreach ($data as $value) {
            $staff = DB::table('tbl_staff')->where('kd_cabang',$request->code)->where('nip',$value->pj_pinjam)->first();
            if ($staff) {
                DB::table('tbl_peminjaman')->where('tiket_peminjaman',$value->tiket_peminjaman)->update([
                    'pj_pinjam'=>$staff->id_staff
                ]);
            }
        }
        return '<span class="fas fa-check-circle"></span>';
    }
    public function masteradmin_cabang_preview_data_peminjaman(Request $request)
    {
        $data = DB::table('tbl_peminjaman')->where('tiket_peminjaman', $request->code)->first();
        return view('application.admin.cabang.peminjaman.preview-peminjaman', ['data' => $data]);
    }
    public function masteradmin_cabang_print_data_peminjaman(Request $request)
    {
        $data = DB::table('tbl_peminjaman')->where('tiket_peminjaman', $request->code)->first();
        $image = base64_encode(file_get_contents(public_path('qr.png')));
        $customPaper = array(0, 0, 50.80, 95.20);
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadview('application.admin.cabang.peminjaman.report.print-peminjaman', ['data' => $data], compact('image'))->setPaper('A4', 'potrait')->setOptions(['defaultFont' => 'Helvetica']);
        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();
        $height = $canvas->get_height();
        $width = $canvas->get_width();
        $canvas->set_opacity(.2, "Multiply");
        $canvas->set_opacity(.1);
        // $canvas->page_text($width/5, $height/2, 'Lunas', '123', 30, array(22,0,0),1,2,0);
        // $canvas->page_script('
        //     $pdf->set_opacity(.1);
        //     $pdf->image("qr.png", 80, 180, 255, 220);
        //     ');
        return base64_encode($pdf->stream());
    }
    public function masteradmin_cabang_data_stock_opname(Request $request)
    {
        $data = DB::table('tbl_verifdatainventaris')->where('kd_cabang', $request->code)->get();
        return view('application.admin.cabang.data-stock-opname-cabang', ['data' => $data]);
    }
    public function masteradmin_cabang_preview_data_stock_opname(Request $request)
    {
        $data = DB::table('tbl_sub_verifdatainventaris')
            ->join('sub_tbl_inventory', 'sub_tbl_inventory.id_inventaris', '=', 'tbl_sub_verifdatainventaris.id_inventaris')
            ->where('tbl_sub_verifdatainventaris.kode_verif', $request->code)->get();
        return view('application.admin.cabang.stockopname.data-stock-opname', ['data' => $data]);
    }
    public function masteradmin_cabang_remove_data_stock_opname(Request $request)
    {
        DB::table('tbl_sub_verifdatainventaris')->where('id_sub_verifdatainventaris', $request->code)->delete();
    }
    public function masteradmin_cabang_sinkron_data_stock_opname(Request $request)
    {
        $data = DB::table('tbl_verifdatainventaris')->where('kode_verif', $request->code)->first();
        $databrg = DB::table('inventaris_data')
            ->join('tbl_nomor_ruangan_cabang', 'tbl_nomor_ruangan_cabang.id_nomor_ruangan_cbaang', '=', 'inventaris_data.id_nomor_ruangan_cbaang')
            ->where('inventaris_data.inventaris_data_tgl_beli', '<=', $data->end_date_verif)
            ->where('inventaris_data.inventaris_data_cabang', $data->kd_cabang)
            ->where('inventaris_data.inventaris_data_status', '<', 4)->get();
        foreach ($databrg as $value) {
            $check = DB::table('tbl_sub_verifdatainventaris')->where('id_inventaris', $value->inventaris_data_code)->where('kode_verif', $data->kode_verif)->first();
            if (!$check) {
                DB::table('tbl_sub_verifdatainventaris')->insert([
                    'kode_verif' => $data->kode_verif,
                    'id_inventaris' => $value->inventaris_data_code,
                    'status_data_inventaris' => 0,
                    'keterangan_data_inventaris' => 'BAIK',
                    'created_at' => now(),
                ]);
            }
        }
        return 1;
    }
    public function masteradmin_messages()
    {
        if (Auth::user()->akses == 'admin') {
            $data = DB::table('message')->orderBy('id', 'DESC')->get();
            return view('application.admin.mastermessage', ['data' => $data]);
        } else {
            return view('application.error.404');
        }
    }
    public function masteradmin_messages_replay(Request $request)
    {
        if (Auth::user()->akses == 'admin') {
            DB::table('message')->where('token_code', $request->code)->update(['status' => 0]);
            return 0;
        } else {
            return view('application.error.404');
        }
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
    // MENU AKSES
    public function masteradmin_access()
    {
        if (Auth::user()->akses == 'admin') {
            $menu = DB::table('z_menu')->get();
            return view('application.admin.masterakses', ['menu' => $menu]);
        } else {
            return view('application.error.404');
        }
    }
    public function master_setting()
    {
        if (Auth::user()->akses == 'admin') {
            return view('application.admin.mastersetting');
        } else {
            return view('application.error.404');
        }
    }

    // MASTER DEPRESIASI
    public function masteradmin_depresiasi(Request $request)
    {
        if (Auth::user()->akses == 'admin') {
            $data = DB::table('master_depresiasi')->get();
            return view('application.admin.masterdepresiasi', ['data' => $data]);
        } else {
            return view('application.error.404');
        }
    }
    public function masteradmin_depresiasi_add(Request $request)
    {
        if (Auth::user()->akses == 'admin') {
            return view('application.admin.depresiasi.form-add');
        } else {
            return view('application.error.404');
        }
    }
    public function masteradmin_depresiasi_save(Request $request)
    {
        if (Auth::user()->akses == 'admin') {
            DB::table('master_depresiasi')->insert([
                'master_depresiasi_code' => str::uuid(),
                'master_depresiasi_periode' => $request->periode,
                'master_depresiasi_status' => 1,
                'master_depresiasi_tanggal' => $request->tanggal,
                'created_at' => now(),
            ]);
            return redirect()->back()->withSuccess('Great! Berhasil Menambahkan Data');
        } else {
            return view('application.error.404');
        }
    }
    public function masteradmin_depresiasi_add_detail(Request $request)
    {
        if (Auth::user()->akses == 'admin') {
            return view('application.admin.depresiasi.form-add-detail', ['code' => $request->code]);
        } else {
            return view('application.error.404');
        }
    }
    public function masteradmin_depresiasi_save_detail(Request $request)
    {
        if (Auth::user()->akses == 'admin') {
            DB::table('master_depresiasi_sub')->insert([
                'depresiasi_sub_code' => str::uuid(),
                'master_depresiasi_code' => $request->code,
                'depresiasi_sub_name' => $request->nama,
                'depresiasi_sub_harga' => $request->harga,
                'depresiasi_sub_masa' => $request->masa,
                'depresiasi_sub_hitung' => $request->masa * 12,
                'depresiasi_sub_start' => $request->start,
                'depresiasi_sub_end' => $request->end,
                'depresiasi_sub_status' => 1,
                'created_at' => now()
            ]);
            return redirect()->back()->withSuccess('Great! Berhasil Menambahkan Data');
        } else {
            return view('application.error.404');
        }
    }
}
