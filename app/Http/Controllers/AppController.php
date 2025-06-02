<?php

namespace App\Http\Controllers;

use App\Exports\DataBarangAsetExport;
use App\Exports\DataBarangNonAset;
use App\Exports\DataBarangNonAsetExport;
use Faker\Provider\Uuid;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Pion\Laravel\ChunkUpload\Handler\HandlerFactory;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;
use Maatwebsite\Excel\Facades\Excel;
use Session;
use DB;
use PDF;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Exports\DataInventarisExport;
use App\Exports\DataInventarisExportRuangan;
use App\sub_tbl_inventory;
use App\DataInventaris;
class AppController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function dashboard_home()
    {
        $cabang = DB::table('tbl_cabang')->where('kd_cabang', Auth::user()->cabang)->first();
        return view('application.dashboard', ['cabang' => $cabang]);
    }
    public function url_akses($akses)
    {
        $data = DB::table('z_menu_user')->where('menu_sub_code', $akses)->where('access_code', Auth::user()->akses)->first();
        if ($data) {
            return true;
        } else {
            return false;
        }
    }
    public function dashboard($akses)
    {
        if ($this->url_akses($akses) == true) {
            $klasifikasi = DB::table('inventaris_cat')->get();
            $cabang = DB::table('tbl_cabang')->where('kd_cabang', Auth::user()->cabang)->first();
            $nonaset = DB::table('inventaris_data')->where('inventaris_data_jenis', 0)->where('inventaris_data_cabang', Auth::user()->cabang)->sum('inventaris_data_harga');
            $aset = DB::table('inventaris_data')->where('inventaris_data_jenis', 1)->where('inventaris_data_cabang', Auth::user()->cabang)->sum('inventaris_data_harga');
            $datanonaset = DB::table('inventaris_data')->where('inventaris_data_jenis', 0)->where('inventaris_data_cabang', Auth::user()->cabang)->count();
            $dataaset = DB::table('inventaris_data')->where('inventaris_data_jenis', 1)->where('inventaris_data_cabang', Auth::user()->cabang)->count();
            $ruangan = DB::table('tbl_nomor_ruangan_cabang')
                ->join('master_lokasi', 'tbl_nomor_ruangan_cabang.kd_lokasi', '=', 'master_lokasi.master_lokasi_code')
                ->where('tbl_nomor_ruangan_cabang.kd_cabang', Auth::user()->cabang)->get();
            $datakso = DB::table('sub_tbl_inventory_kso')->where('kd_cabang', Auth::user()->cabang)->count();
            $documentkso = DB::table('document_kso')
                ->join('sub_tbl_inventory_kso', 'sub_tbl_inventory_kso.id_inventaris', '=', 'document_kso.id_inventaris')
                ->where('sub_tbl_inventory_kso.kd_cabang', Auth::user()->cabang)->count();
            return view('application.dashboard.home', [
                'klasifikasi' => $klasifikasi,
                'cabang' => $cabang,
                'nonaset' => $nonaset,
                'aset' => $aset,
                'datanonaset' => $datanonaset,
                'dataaset' => $dataaset,
                'ruangan' => $ruangan,
                'datakso' => $datakso,
                'documentkso' => $documentkso,
            ]);
        } else {
            return Redirect::to('dashboard');
        }

    }
    public function dashboard_add()
    {
        $lokasi = DB::table('tbl_nomor_ruangan_cabang')
            ->join('master_lokasi', 'master_lokasi.master_lokasi_code', '=', 'tbl_nomor_ruangan_cabang.kd_lokasi')
            ->where('tbl_nomor_ruangan_cabang.kd_cabang', Auth::user()->cabang)
            ->get();
        $klasifikasi = DB::table('inventaris_klasifikasi')->get();
        return view('application.dashboard.form.form-add-non-aset', ['lokasi' => $lokasi, 'klasifikasi' => $klasifikasi]);
    }
    public function dashboard_add_data_non_aset(Request $request)
    {
        $entitas = DB::table('tbl_entitas_cabang')
            ->join('tbl_cabang', 'tbl_cabang.kd_entitas_cabang', '=', 'tbl_entitas_cabang.kd_entitas_cabang')
            ->join('tbl_setting_cabang', 'tbl_setting_cabang.kd_cabang', '=', 'tbl_cabang.kd_cabang')
            ->where('tbl_setting_cabang.kd_cabang', Auth::user()->cabang)->first();
        $total = DB::table('inventaris_data')->where('inventaris_data_cabang', Auth::user()->cabang)->count();
        $lokasi = DB::table('tbl_nomor_ruangan_cabang')->where('id_nomor_ruangan_cbaang', $request->lokasi)->first();
        $nilai = preg_replace("/[^0-9]/", "", $request->harga_perolehan);
        if ($request->link == null) {
            $link = null;
        } else {
            $link = 'public/databrg/new/' . Auth::user()->cabang . '/' . $request->link;
        }
        DB::table('inventaris_data')->insert([
            'inventaris_data_code' => Auth::user()->cabang . '' . date('Ymdhis'),
            'inventaris_klasifikasi_code' => $request->klasifikasi,
            'inventaris_data_number' => ($total + 1) . '/' . $request->klasifikasi . '/' . $lokasi->kd_lokasi . '/' . $entitas->simbol_entitas . '.' . $entitas->no_cabang . '/' . date('Y', strtotime($request->tgl_beli)),
            'inventaris_data_name' => $request->nama_barang,
            'inventaris_data_location' => $lokasi->kd_lokasi,
            'inventaris_data_jenis' => $request->jenis,
            'inventaris_data_harga' => $nilai,
            'inventaris_data_merk' => $request->merk,
            'inventaris_data_type' => $request->type,
            'inventaris_data_no_seri' => $request->seri,
            'inventaris_data_suplier' => $request->suplier,
            'inventaris_data_kondisi' => $request->kondisi,
            'inventaris_data_status' => 0,
            'inventaris_data_tgl_beli' => $request->tgl_beli,
            'inventaris_data_cabang' => Auth::user()->cabang,
            'inventaris_data_urut' => $total + 1,
            'inventaris_data_file' => $link,
            'id_nomor_ruangan_cbaang' => $request->lokasi,
            'created_at' => now(),
        ]);
        return '<button type="submit" class="btn btn-outline-success" id="button-simpan-data-non-aset"><i
                        class="fa fa-save"></i> Simpan Data</button>';
    }
    public function dashboard_data_non_aset(Request $request)
    {
        $data = DB::table('inventaris_data')->where('inventaris_data_jenis', 0)->where('inventaris_data_cabang', Auth::user()->cabang)->get();
        return view('application.dashboard.data.data-non-aset', ['data' => $data]);
    }
    public function dashboard_export_data_non_aset(Request $request)
    {
        return view('application.dashboard.data.export-data-non-aset');
    }
    public function dashboard_export_data_non_aset_data(Request $request)
    {
        return 132;
    }
    public function dashboard_export_data_non_aset_excel(Request $request)
    {
        $data = DB::table('tbl_cabang')->where('kd_cabang', Auth::user()->cabang)->first();
        return Excel::download(new DataBarangNonAsetExport(Auth::user()->cabang), 'inventaris_non_aset' . $data->nama_cabang . '.xlsx');
    }
    public function dashboard_export_data_non_aset_pdf()
    {
        $data = DB::table('tbl_cabang')
            ->join('tbl_entitas_cabang', 'tbl_entitas_cabang.kd_entitas_cabang', '=', 'tbl_cabang.kd_entitas_cabang')
            ->where('tbl_cabang.kd_cabang', Auth::user()->cabang)->first();
        $barang = DB::table('inventaris_data')->where('inventaris_data_jenis', 0)->where('inventaris_data_cabang', Auth::user()->cabang)->get();
        $image = base64_encode(file_get_contents(public_path('icon.png')));
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadview('application.dashboard.data.report.data-pdf-non-aset', ['data' => $data, 'brg' => $barang], compact('image'))->setPaper('A4', 'landscape')->setOptions(['defaultFont' => 'Helvetica']);
        $pdf->output();
        return base64_encode($pdf->stream());
    }
    public function dashboard_export_data_aset(Request $request)
    {
        return view('application.dashboard.data.export-data-aset');
    }
    public function dashboard_export_data_aset_data(Request $request)
    {
        return 123132132;
    }
    public function dashboard_export_data_aset_excel()
    {
        $data = DB::table('tbl_cabang')->where('kd_cabang', Auth::user()->cabang)->first();
        return Excel::download(new DataBarangAsetExport(Auth::user()->cabang), 'inventaris_aset' . $data->nama_cabang . '.xlsx');
    }
    public function dashboard_export_data_aset_pdf()
    {
        $data = DB::table('tbl_cabang')
            ->join('tbl_entitas_cabang', 'tbl_entitas_cabang.kd_entitas_cabang', '=', 'tbl_cabang.kd_entitas_cabang')
            ->where('tbl_cabang.kd_cabang', Auth::user()->cabang)->first();
        $barang = DB::table('inventaris_data')->where('inventaris_data_jenis', 1)->where('inventaris_data_cabang', Auth::user()->cabang)->get();
        $image = base64_encode(file_get_contents(public_path('icon.png')));
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadview('application.dashboard.data.report.data-pdf-aset', ['data' => $data, 'brg' => $barang], compact('image'))->setPaper('A4', 'landscape')->setOptions(['defaultFont' => 'Helvetica']);
        $pdf->output();
        return base64_encode($pdf->stream());
    }
    public function dashboard_data_aset(Request $request)
    {
        $data = DB::table('inventaris_data')->where('inventaris_data_jenis', 1)->where('inventaris_data_cabang', Auth::user()->cabang)->get();
        return view('application.dashboard.data.data-aset', ['data' => $data]);
    }
    public function dashboard_data_depresiasi_aset(Request $request)
    {
        $data = DB::table('tbl_depresiasi')->get();
        return view('application.dashboard.data.data-depresiasi-aset', ['data' => $data]);
    }
    public function dashboard_data_kso(Request $request)
    {
        $data = DB::table('sub_tbl_inventory_kso')->where('kd_cabang', Auth::user()->cabang)->get();
        return view('application.dashboard.data.data-kso', ['data' => $data]);
    }
    public function dashboard_data_kso_document(Request $request)
    {
        $data = DB::table('document_kso')->where('id_inventaris', $request->code)->get();
        return view('application.dashboard.data.data-kso.document-kso', ['data' => $data]);
    }
    public function dashboard_lokasi_data_barang(Request $request)
    {
        $lokasi = DB::table('tbl_nomor_ruangan_cabang')->join('tbl_lokasi', 'tbl_lokasi.kd_lokasi', '=', 'tbl_nomor_ruangan_cabang.kd_lokasi')
            ->where('tbl_nomor_ruangan_cabang.id_nomor_ruangan_cbaang', $request->code)->first();
        $data = DB::table('inventaris_data')->where('id_nomor_ruangan_cbaang', $request->code)->where('inventaris_data_status', '<', 4)->get();
        return view('application.dashboard.data.data-lokasi', ['data' => $data, 'lokasi' => $lokasi, 'id' => $request->code]);
    }
    public function masteradmin_cabang_data_lokasi_print_barcode(Request $request)
    {
        $data = DB::table('inventaris_data')->where('id_nomor_ruangan_cbaang', $request->id)
            ->where('inventaris_data_cabang', auth::user()->cabang)
            ->get();
        // dd($data);
        $customPaper = array(0, 0, 50.80, 98.00);
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadview('application.dashboard.report.barcode-lokasi', ['data' => $data])->setPaper($customPaper, 'landscape')->setOptions(['defaultFont' => 'Helvetica']);
        $pdf->output();
        return base64_encode($pdf->stream());
    }
    // PEMINJAMAN
    public function peminjaman($akses)
    {
        if ($this->url_akses($akses) == true) {
            $data = DB::table('tbl_peminjaman')->where('kd_cabang', Auth::user()->cabang)->orderBy('id_pinjam', 'DESC')->get();
            return view('application.peminjaman.menupeminjaman', ['data' => $data]);
        } else {
            return Redirect::to('dashboard');
        }

    }
    public function peminjaman_add(Request $request)
    {
        $cabang = DB::table('tbl_cabang')->get();
        $staff = DB::table('tbl_staff')->where('kd_cabang', Auth::user()->cabang)->get();
        return view('application.peminjaman.form-add-peminjaman', ['cabang' => $cabang, 'staff' => $staff]);
    }
    public function peminjaman_data_order(Request $request)
    {
        $data = DB::table('tbl_peminjaman')
            ->join('tbl_cabang', 'tbl_cabang.kd_cabang', '=', 'tbl_peminjaman.kd_cabang')
            ->where('tbl_peminjaman.tujuan_cabang', Auth::user()->cabang)
            ->where('tbl_peminjaman.kd_cabang','!=' ,Auth::user()->cabang)
            ->where('status_pinjam', 2)->get();
        return view('application.peminjaman.data-order-peminjaman', ['data' => $data]);
    }
    public function peminjaman_terima_data_order(Request $request)
    {
        $data = DB::table('tbl_peminjaman')->where('id_pinjam', $request->code)->first();
        $brg = DB::table('tbl_sub_peminjaman')
            ->join('inventaris_data', 'inventaris_data.inventaris_data_code', '=', 'tbl_sub_peminjaman.id_inventaris')
            ->where('tbl_sub_peminjaman.id_pinjam', $request->code)->get();
        return view('application.peminjaman.form-terima-order-peminjaman', ['data' => $data, 'brg' => $brg]);
    }
    public function peminjaman_terima_data_barang(Request $request)
    {
        $data = DB::table('tbl_sub_peminjaman')->where('id_sub_peminjaman', $request->code)->first();
        DB::table('tbl_sub_peminjaman')->where('id_sub_peminjaman', $request->code)->update(['status_sub_peminjaman' => 1]);
        $brg = DB::table('tbl_sub_peminjaman')
            ->join('inventaris_data', 'inventaris_data.inventaris_data_code', '=', 'tbl_sub_peminjaman.id_inventaris')
            ->where('tbl_sub_peminjaman.id_pinjam', $data->id_pinjam)->get();
        return view('application.peminjaman.table-terima-order-peminjaman', ['brg' => $brg]);
    }
    public function verifikasi_peminjaman_terima_data_barang(Request $request)
    {
        $data = DB::table('tbl_sub_peminjaman')
            ->join('tbl_peminjaman', 'tbl_peminjaman.id_pinjam', '=', 'tbl_sub_peminjaman.id_pinjam')
            ->where('tbl_peminjaman.tiket_peminjaman', $request->code)
            ->where('tbl_sub_peminjaman.status_sub_peminjaman', 0)->first();
        if ($data) {
            return 0;
            # code...
        } else {
            DB::table('tbl_peminjaman')->where('tiket_peminjaman', $request->code)->update([
                'status_pinjam' => 3,
                'pj_pinjam_cabang' => $request->penerima,
                'deskripsi_tujuan' => $request->deskripsi,
            ]);
            return 1;
            # code...
        }

    }
    public function peminjaman_save(Request $request)
    {
        DB::table('tbl_peminjaman')->insert([
            'tiket_peminjaman' => 'PJ-SDM-' . Auth::user()->cabang . '-' . date('Ymdhis'),
            'nama_kegiatan' => $request->tujuan,
            'tujuan_cabang' => $request->cabang,
            'tgl_pinjam' => $request->tgl_pinjam,
            'batas_tgl_pinjam' => $request->batas_pinjam,
            'pj_pinjam' => $request->pj,
            'status_pinjam' => 0,
            'kd_cabang' => Auth::user()->cabang,
            'deskripsi' => $request->deskripsi,
            'created_at' => now(),
        ]);
        return redirect()->back()->withSuccess('Great! Berhasil Menambahkan Data');
    }
    public function peminjaman_proses(Request $request)
    {
        $data = DB::table('tbl_peminjaman')->where('tiket_peminjaman', $request->code)->first();
        $brg = DB::table('tbl_sub_peminjaman')
            ->join('inventaris_data', 'inventaris_data.inventaris_data_code', '=', 'tbl_sub_peminjaman.id_inventaris')
            ->where('tbl_sub_peminjaman.id_pinjam', $data->id_pinjam)->get();
        $user = DB::table('wa_number_cabang')->where('kd_cabang', Auth::user()->cabang)->where('wa_number_akses', 'MGR')->get();
        return view('application.peminjaman.form-prosess-peminjaman', ['data' => $data, 'brg' => $brg, 'user' => $user]);
    }
    public function peminjaman_find_data(Request $request)
    {
        $data = DB::table('inventaris_data')->where('inventaris_data_cabang', Auth::user()->cabang)->where('inventaris_data_name', 'like', '%' . $request->name . '%')->get();
        return view('application.peminjaman.hasil-pencarian-barang', ['data' => $data, 'tiket' => $request->code]);
    }
    public function peminjaman_pilih_data(Request $request)
    {
        DB::table('tbl_sub_peminjaman')->insert([
            'id_pinjam' => $request->code,
            'id_inventaris' => $request->id,
            'kd_cabang' => Auth::user()->cabang,
            'kondisi_pinjam' => 'BAIK',
            'tgl_pinjam_barang' => now(),
            'status_sub_peminjaman' => 0,
            'created_at' => now()
        ]);
        $brg = DB::table('tbl_sub_peminjaman')
            ->join('inventaris_data', 'inventaris_data.inventaris_data_code', '=', 'tbl_sub_peminjaman.id_inventaris')
            ->where('tbl_sub_peminjaman.id_pinjam', $request->code)->get();
        return view('application.peminjaman.table-fix-peminjaman', ['brg' => $brg]);
    }
    public function peminjaman_batal_pilih_data(Request $request)
    {
        DB::table('tbl_sub_peminjaman')->where('id_sub_peminjaman', $request->code)->delete();
        $brg = DB::table('tbl_sub_peminjaman')
            ->join('inventaris_data', 'inventaris_data.inventaris_data_code', '=', 'tbl_sub_peminjaman.id_inventaris')
            ->where('tbl_sub_peminjaman.id_pinjam', $request->id)->get();
        return view('application.peminjaman.table-fix-peminjaman', ['brg' => $brg]);
    }
    public function peminjaman_data_verifikasi(Request $request)
    {
        $data = DB::table('tbl_peminjaman')->where('tiket_peminjaman', $request->code)->first();
        $brg = DB::table('tbl_sub_peminjaman')
            ->join('inventaris_data', 'inventaris_data.inventaris_data_code', '=', 'tbl_sub_peminjaman.id_inventaris')
            ->join('tbl_peminjaman', 'tbl_peminjaman.id_pinjam', '=', 'tbl_sub_peminjaman.id_pinjam')
            ->where('tbl_peminjaman.tiket_peminjaman', $request->code)->get();
        return view('application.peminjaman.form-verifikasi-user', ['data' => $data, 'brg' => $brg]);
    }
    public function peminjaman_data_verifikasi_user(Request $request)
    {
        $check = DB::table('tbl_peminjaman')->where('tiket_peminjaman', $request->code)->where('token_pinjam', $request->token)->first();
        if ($check) {
            if ($check->kd_cabang == $check->tujuan_cabang) {
                DB::table('tbl_peminjaman')->where('tiket_peminjaman', $request->code)->update(['status_pinjam' => 3]);
            } else {
                DB::table('tbl_peminjaman')->where('tiket_peminjaman', $request->code)->update(['status_pinjam' => 2]);
            }
            return 1;
        } else {
            return 0;
        }
    }
    public function peminjaman_proses_verifikasi(Request $request)
    {
        $data = DB::table('tbl_peminjaman')->where('tiket_peminjaman', $request->code)->first();
        $brg = DB::table('tbl_sub_peminjaman')
            ->join('inventaris_data', 'inventaris_data.inventaris_data_code', '=', 'tbl_sub_peminjaman.id_inventaris')
            ->join('tbl_peminjaman', 'tbl_peminjaman.id_pinjam', '=', 'tbl_sub_peminjaman.id_pinjam')
            ->where('tbl_peminjaman.tiket_peminjaman', $request->code)->get();
        return view('application.peminjaman.form-verifikasi-peminjaman', ['data' => $data, 'brg' => $brg]);
    }
    public function verifikasi_data_peminjaman(Request $request)
    {
        $check = DB::table('tbl_sub_peminjaman')
            ->join('tbl_peminjaman', 'tbl_peminjaman.id_pinjam', '=', 'tbl_sub_peminjaman.id_pinjam')
            ->where('tbl_peminjaman.tiket_peminjaman', $request->code)->first();
        if ($check) {
            $token = mt_rand(1000000, 9999999);
            $qrcode = base64_encode(QrCode::format('png')
                ->size(500)
                ->merge('/storage/app/public/logo.png')
                ->errorCorrection('H')
                ->eyeColor(2, 100, 100, 255, 0, 0, 0)
                ->style('round')
                ->margin(2)
                ->generate($token));

            DB::table('tbl_peminjaman')->where('tiket_peminjaman', $request->code)->update([
                'status_pinjam' => 1,
                'token_pinjam' => $token,
                'pj_cabang' => $request->mengetahui,
            ]);
            $number = DB::table('wa_number_cabang')->where('wa_number_code', $request->mengetahui)->first();
            $pesan = "";
            $no = 1;
            $data = DB::table('tbl_sub_peminjaman')
                ->join('inventaris_data', 'inventaris_data.inventaris_data_code', '=', 'tbl_sub_peminjaman.id_inventaris')
                ->where('tbl_sub_peminjaman.id_pinjam', $check->id_pinjam)->get();
            foreach ($data as $value) {
                $texts = $no++ . '. ' . $value->inventaris_data_name . "\n";
                $pesan = $pesan . $texts;
            }
            $text = "Hai \nAda Notifikasi Peminjaman Barang\nDengan No Tiket : ".$check->tiket_peminjaman."\nToken Peminjaman Anda : *" . $token .
                "*\n\nList Barang Yang dipinjam :\n" . $pesan . "\nPastikan Token disimpan Untuk Verifikasi Data Peminjaman.\n\nSupport By. *Transforma Digital*";
            DB::table('message')->insert([
                'token_code' => str::uuid(),
                'number' => $number->wa_number_no,
                'pesan' => $text,
                'file' => $qrcode,
                'status' => 0,
                'time' => now(),
            ]);
            return '1';
        } else {
            return '0';
        }
    }
    public function proses_check_data_barang_peminjaman(Request $request)
    {
        $data = DB::table('tbl_sub_peminjaman')
            ->join('inventaris_data', 'inventaris_data.inventaris_data_code', '=', 'tbl_sub_peminjaman.id_inventaris')
            ->join('tbl_peminjaman', 'tbl_peminjaman.id_pinjam', '=', 'tbl_sub_peminjaman.id_pinjam')
            ->where('tbl_sub_peminjaman.id_sub_peminjaman', $request->code)->first();
        return view('application.peminjaman.check-barang-peminjaman', ['data' => $data]);
    }
    public function proses_save_check_data_barang_peminjaman(Request $request)
    {
        DB::table('tbl_sub_peminjaman')->where('id_sub_peminjaman', $request->id_pinjam)->update([
            'tgl_kembali_barang' => now(),
            'kondisi_kembali' => $request->catatan,
            'status_sub_peminjaman' => 1,
        ]);
        $brg = DB::table('tbl_sub_peminjaman')
            ->join('inventaris_data', 'inventaris_data.inventaris_data_code', '=', 'tbl_sub_peminjaman.id_inventaris')
            ->join('tbl_peminjaman', 'tbl_peminjaman.id_pinjam', '=', 'tbl_sub_peminjaman.id_pinjam')
            ->where('tbl_peminjaman.tiket_peminjaman', $request->code)->get();
        return view('application.peminjaman.table-check-peminjaman', ['brg' => $brg]);
    }
    public function proses_verifikasi_data_peminjaman(Request $request)
    {
        $check = DB::table('tbl_sub_peminjaman')
            ->join('tbl_peminjaman', 'tbl_peminjaman.id_pinjam', '=', 'tbl_sub_peminjaman.id_pinjam')
            ->where('tbl_sub_peminjaman.tgl_kembali_barang', '=', null)
            ->where('tbl_peminjaman.tiket_peminjaman', $request->code)->first();
        if (!$check) {
            DB::table('tbl_peminjaman')->where('tiket_peminjaman', $request->code)->update([
                'status_pinjam' => 4
            ]);
            return '1';
        } else {
            return '0';
        }
    }
    public function print_report_data_peminjaman(Request $request)
    {
        return view('application.peminjaman.print-data-peminjaman', ['code' => $request->code]);
    }
    public function print_report_data_peminjaman_show(Request $request)
    {
        $cabang = DB::table('tbl_cabang')->join('tbl_entitas_cabang', 'tbl_entitas_cabang.kd_entitas_cabang', '=', 'tbl_cabang.kd_entitas_cabang')
            ->where('tbl_cabang.kd_cabang', Auth::user()->cabang)->first();
        if ($cabang->kd_entitas_cabang == 'PTP') {
            $image = base64_encode(file_get_contents(public_path('vendor/pramita.png')));
        } elseif ($cabang->kd_entitas_cabang == 'SIMA') {
            $image = base64_encode(file_get_contents(public_path('vendor/sima.jpeg')));
            # code...
        }
        $peminjaman = DB::table('tbl_peminjaman')->where('tiket_peminjaman', $request->code)->first();
        $data = DB::table('tbl_sub_peminjaman')
            ->join('inventaris_data', 'inventaris_data.inventaris_data_code', '=', 'tbl_sub_peminjaman.id_inventaris')
            ->join('tbl_peminjaman', 'tbl_peminjaman.id_pinjam', '=', 'tbl_sub_peminjaman.id_pinjam')
            ->where('tbl_peminjaman.tiket_peminjaman', $request->code)->get();

        $customPaper = array(0, 0, 50.80, 95.20);
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadview('application.peminjaman.report.report-peminjaman', ['data' => $data, 'cabang' => $cabang, 'peminjaman' => $peminjaman], compact('image'))->setPaper('A4', 'potrait')->setOptions(['defaultFont' => 'Helvetica']);
        $pdf->output();
        $dompdf = $pdf->getDomPDF();
        $font = $dompdf->getFontMetrics()->get_font("helvetica", "bold");
        $dompdf->get_canvas()->page_text(300, 820, "{PAGE_NUM} / {PAGE_COUNT}", $font, 10, array(0, 0, 0));
        return base64_encode($pdf->stream());
    }

    // MENU PEMUSNAHAN
    public function menu_pemusnahan($akses)
    {
        if ($this->url_akses($akses) == true) {
            $data = DB::table('tbl_pemusnahan')
                ->join('inventaris_data', 'inventaris_data.inventaris_data_code', '=', 'tbl_pemusnahan.id_inventaris')
                ->where('tbl_pemusnahan.kd_cabang', Auth::user()->cabang)->orderBy('id_pemusnahan', 'DESC')->get();
            return view('application.pemusnahan.menupemusnahan', ['data' => $data]);
        } else {
            return Redirect::to('dashboard');
        }
    }
    public function menu_pemusnahan_add(Request $request)
    {
        return view('application.pemusnahan.form-add');
    }
    public function menu_pemusnahan_find_data_barang(Request $request)
    {
        if ($request->option == 'name') {
            $data = DB::table('inventaris_data')->where('inventaris_data_cabang', Auth::user()->cabang)->where('inventaris_data_name', 'like', '%' . $request->name . '%')->get();
        } elseif ($request->option == 'no_inventaris') {
            $data = DB::table('inventaris_data')->where('inventaris_data_cabang', Auth::user()->cabang)->where('inventaris_data_number', 'like', '%' . $request->name . '%')->get();
        }
        return view('application.pemusnahan.data-table-pemusnahan', ['data' => $data]);
    }
    public function menu_pemusnahan_pilih_data_barang(Request $request)
    {
        $data = DB::table('inventaris_data')->where('inventaris_data_code', $request->code)->first();
        $wa = DB::table('wa_number_cabang')->where('kd_cabang', Auth::user()->cabang)->get();
        return view('application.pemusnahan.form-proses-pemusnahan', ['data' => $data, 'wa' => $wa]);
    }
    public function menu_pemusnahan_pilih_data_barang_save(Request $request)
    {
        $token = mt_rand(1000000, 9999999);
        $code = str::uuid();
        $check = DB::table('tbl_pemusnahan')->where('id_inventaris', $request->id_inventaris)->first();
        $no = DB::table('wa_number_cabang')->where('id_wa_number', $request->pj)->first();

        if ($check) {
            return redirect()->back()->withError('Fail ! Data Barang Sudah tidak Ada');
        } else {
            $qrcode = base64_encode(QrCode::format('png')
                ->size(500)
                ->merge('/storage/app/public/logo.png')
                ->errorCorrection('H')
                ->eyeColor(2, 100, 100, 255, 0, 0, 0)
                ->style('dot')
                ->margin(2)
                ->generate($token));
            $text = "Hai \n\nToken Pemusnahan Anda : *" . $token .
                "*\n\nPastikan Token disimpan Untuk Verifikasi Data yang Ingin di Musnahkan..\n\nSupport By. *Transforma Digital*";
            DB::table('tbl_pemusnahan')->insert([
                'kd_pemusnahan' => $code,
                'id_inventaris' => $request->id_inventaris,
                'kd_cabang' => Auth::user()->cabang,
                'dasar_pengajuan' => $request->dasar_pengajuan,
                'verifikasi' => $request->verifikasi,
                'persetujuan' => 'setuju',
                'eksekusi' => $request->eksekusi,
                'status_pemusnahan' => 0,
                'tgl_pemusnahan' => $request->tgl_pemusnahan,
                'token_pemusnahan' => $token,
                'pj_pemusnahan' => $request->pj,
                'created_at' => now()
            ]);
            DB::table('message')->insert([
                'token_code' => $code,
                'number' => $no->wa_number_no,
                'pesan' => $text,
                'file' => $qrcode,
                'status' => 0,
                'time' => now(),
                'created_at' => now(),
            ]);
            return redirect()->back()->withSuccess('Great! Berhasil Menambahkan Data Pemusnahan');
        }
    }
    public function menu_pemusnahan_pilih_data_barang_verifikasi(Request $request)
    {
        return view('application.pemusnahan.form-verifikasi-pemusnahan', ['code' => $request->code]);
    }
    public function menu_pemusnahan_pilih_data_barang_verifikasi_code(Request $request)
    {
        $check = DB::table('tbl_pemusnahan')->where('id_pemusnahan', $request->tiket)->where('token_pemusnahan', $request->code)->first();
        if ($check) {
            $id = 1;
            DB::table('tbl_pemusnahan')->where('id_pemusnahan', $request->tiket)->update([
                'status_pemusnahan' => 1
            ]);
        } else {
            $id = 0;
        }
        return view('application.pemusnahan.notif-verifikasi', ['id' => $id]);
    }
    public function menu_pemusnahan_pilih_data_barang_print(Request $request)
    {
        return view('application.pemusnahan.form-print-pemusnahan', ['code' => $request->code]);
    }
    public function menu_pemusnahan_pilih_data_barang_print_report(Request $request)
    {
        $cabang = DB::table('tbl_cabang')->join('tbl_entitas_cabang', 'tbl_entitas_cabang.kd_entitas_cabang', '=', 'tbl_cabang.kd_entitas_cabang')
            ->where('tbl_cabang.kd_cabang', Auth::user()->cabang)->first();
        if ($cabang->kd_entitas_cabang == 'PTP') {
            $image = base64_encode(file_get_contents(public_path('vendor/pramita.png')));
        } elseif ($cabang->kd_entitas_cabang == 'SIMA') {
            $image = base64_encode(file_get_contents(public_path('vendor/sima.jpeg')));
            # code...
        }
        $data = DB::table('tbl_pemusnahan')->join('inventaris_data', 'inventaris_data.inventaris_data_code', '=', 'tbl_pemusnahan.id_inventaris')
            ->where('tbl_pemusnahan.id_pemusnahan', $request->code)->first();
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadview('application.pemusnahan.report.report-pemusnahan', ['cabang' => $cabang, 'data' => $data], compact('image'))->setPaper('A4', 'potrait')->setOptions(['defaultFont' => 'Helvetica']);
        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();
        $height = $canvas->get_height();
        $width = $canvas->get_width();
        $canvas->set_opacity(.2, "Multiply");
        $canvas->set_opacity(.1);
        return base64_encode($pdf->stream());
    }
    // STOK OPNAME
    public function menu_stock_opname($akses)
    {
        if ($this->url_akses($akses) == true) {
            $data = DB::table('tbl_verifdatainventaris')->where('kd_cabang', auth::user()->cabang)
                ->orderBy('id_verifdatainventaris', 'desc')
                ->get();
            return view('application.stockopname.menu-stock-opname', ['data' => $data]);
        } else {
            return Redirect::to('dashboard');
        }

    }
    public function menu_stock_opname_kondisi_data(Request $request)
    {
        $data = DB::table('tbl_sub_verifdatainventaris')
            ->join('sub_tbl_inventory', 'sub_tbl_inventory.id_inventaris', '=', 'tbl_sub_verifdatainventaris.id_inventaris')
            ->where('kode_verif', $request->code)->where('status_data_inventaris', $request->status)->get();
        return view('application.stockopname.data-kondisi', ['data' => $data]);
    }
    public function menu_stock_opname_remove_full_data(Request $request)
    {
        return view('application.stockopname.remove-data-full-stock', ['id' => $request->code]);
    }
    public function menu_stock_opname_proses_remove_full_data(Request $request)
    {
        DB::table('tbl_sub_verifdatainventaris')->where('kode_verif', $request->code)->delete();
        return 123;
    }
    public function menu_stock_opname_proses_data(Request $request)
    {
        $cekdata = DB::table('tbl_verifdatainventaris')
            ->where('kode_verif', $request->code)
            ->first();
        $data = DB::table('sub_tbl_inventory')->where('kd_cabang', Auth::user()->cabang)->where('status_barang', '>=', 4)->get();
        $tbl_cabang = DB::table('tbl_cabang')->where('kd_cabang', auth::user()->cabang)->get();
        $lokasi = DB::table('tbl_lokasi')->get();
        $no_ruangan = DB::table('tbl_nomor_ruangan_cabang')->where('kd_cabang', Auth::user()->cabang)->orderBy('nomor_ruangan', 'ASC')->get();
        return view('application.stockopname.proses-stock-opname', [
            'cekdata' => $cekdata,
            'cabang' => $tbl_cabang,
            'lokasi' => $lokasi,
            'no_ruangan' => $no_ruangan,
            'data' => $data,
            'id' => $request->code,
        ]);
    }
    public function menu_stock_opname_proses_data_with_kamera(Request $request)
    {
        return view('application.stockopname.kamera-stock-opname', ['tiket' => $request->code]);
    }
    public function menu_stock_opname_scan_data_with_kamera(Request $request)
    {
        $data = DB::table('sub_tbl_inventory')
            ->where('kd_cabang', Auth::user()->cabang)
            ->where('no_inventaris', $request->data)->first();
        return view('application.stockopname.result-kamera-stock', ['data' => $data, 'kode' => $request->tiket]);
    }
    public function menu_stock_opname_proses_data_with_scanner(Request $request)
    {
        return view('application.stockopname.scanner-stock-opname', ['tiket' => $request->code]);
    }
    public function menu_stock_opname_scan_data_with_scanner(Request $request)
    {
        $data = DB::table('sub_tbl_inventory')
            ->where('kd_cabang', Auth::user()->cabang)
            ->where('no_inventaris', $request->nama)->first();
        return view('application.stockopname.hasil-scanner', ['data' => $data, 'kode' => $request->tiket]);
    }
    public function menu_stock_opname_edit_data_tanggal(Request $request)
    {
        $data = DB::table('tbl_verifdatainventaris')->where('kode_verif', $request->code)->first();
        return view('application.stockopname.form-edit-tgl', ['data' => $data]);
    }


    // MENU MUTASI
    public function menu_mutasi($akses)
    {
        if ($this->url_akses($akses) == true) {
            $data = DB::table('tbl_mutasi')
                ->join('tbl_cabang', 'tbl_cabang.kd_cabang', '=', 'tbl_mutasi.target_mutasi')
                ->where('tbl_mutasi.kd_cabang', auth::user()->cabang)->orderBy('tbl_mutasi.id_mutasi', 'DESC')->get();
            $cabang = DB::table('tbl_cabang')->where('kd_cabang', Auth::user()->cabang)->first();
            return view('application.mutasi.menumutasi', ['cabang' => $cabang, 'data' => $data]);
        } else {
            return Redirect::to('dashboard');
        }
    }
    public function menu_mutasi_add(Request $request)
    {
        $cabang = DB::table('tbl_cabang')->where('kd_cabang', '!=', Auth::user()->cabang)->get();
        $wa = DB::table('wa_number_cabang')->where('kd_cabang', Auth::user()->cabang)->get();
        return view('application.mutasi.form-add-mutasi', ['cabang' => $cabang, 'wa' => $wa]);
    }
    public function menu_mutasi_save(Request $request)
    {
        $jadi = 'MT-' . date('Ymd') . '-' . Str::random(4);
        DB::table('tbl_mutasi')->insert([
            'kd_mutasi' => $jadi,
            'jenis_mutasi' => 1,
            'kd_cabang' => auth::user()->cabang,
            'asal_mutasi' => auth::user()->cabang,
            'target_mutasi' => $request->cabang,
            'departemen' => 0,
            'divisi' => 0,
            'penanggung_jawab' => $request->pj_alat,
            'tanggal_buat' => $request->tgl_order,
            'menyetujui' => $request->menyetujui,
            'yang_menyerahkan' => $request->menyerahkan,
            'ket' => $request->deskripsi,
            'status_mutasi' => 0,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        return redirect()->back()->withSuccess('Great! Berhasil Menambahkan Data Pemusnahan');
    }
    public function menu_mutasi_rekap_data_order_mutasi()
    {
        $data = DB::table('tbl_mutasi')
            ->join('tbl_cabang', 'tbl_cabang.kd_cabang', '=', 'tbl_mutasi.asal_mutasi')
            ->where('tbl_mutasi.target_mutasi', Auth::user()->cabang)
            ->where('tbl_mutasi.status_mutasi', 3)->get();
        return view('application.mutasi.data-order-mutasi', ['data' => $data]);
    }
    public function menu_mutasi_show_data_order_mutasi()
    {
        $data = DB::table('tbl_mutasi')
            ->join('tbl_cabang', 'tbl_cabang.kd_cabang', '=', 'tbl_mutasi.asal_mutasi')
            ->where('tbl_mutasi.target_mutasi', Auth::user()->cabang)
            ->where('tbl_mutasi.status_mutasi', 2)->get();
        return view('application.mutasi.data-order-mutasi', ['data' => $data]);
    }
    public function menu_mutasi_terima_data_order_mutasi(Request $request)
    {
        $data = DB::table('tbl_mutasi')->where('kd_mutasi', $request->code)->first();
        $brg = DB::table('tbl_sub_mutasi')->join('inventaris_data', 'inventaris_data.inventaris_data_code', '=', 'tbl_sub_mutasi.id_inventaris')
            ->where('tbl_sub_mutasi.kd_mutasi', $request->code)->get();
        return view('application.mutasi.form-terima-order', ['data' => $data, 'brg' => $brg]);
    }
    public function menu_mutasi_pilih_lokasi_data_order_mutasi(Request $request)
    {
        $data = DB::table('tbl_sub_mutasi')
            ->join('inventaris_data', 'inventaris_data.inventaris_data_code', '=', 'tbl_sub_mutasi.id_inventaris')
            ->where('tbl_sub_mutasi.id_sub_mutasi', $request->code)->first();
        $lokasi = DB::table('tbl_nomor_ruangan_cabang')->join('master_lokasi', 'master_lokasi.master_lokasi_code', '=', 'tbl_nomor_ruangan_cabang.kd_lokasi')
            ->where('tbl_nomor_ruangan_cabang.kd_cabang', Auth::user()->cabang)->get();
        return view('application.mutasi.form-pilih-lokasi-barang', ['data' => $data, 'lokasi' => $lokasi]);
    }
    public function menu_mutasi_proses_lokasi_data_order_mutasi(Request $request)
    {
        DB::table('tbl_sub_mutasi')->where('id_sub_mutasi', $request->id_mutasi)->update([
            'kd_lokasi_tujuan' => $request->lokasi
        ]);
        $data = DB::table('tbl_sub_mutasi')
            ->join('inventaris_data', 'inventaris_data.inventaris_data_code', '=', 'tbl_sub_mutasi.id_inventaris')
            ->where('tbl_sub_mutasi.kd_mutasi', $request->kd_mutasi)->get();
        return view('application.mutasi.table-data-barang-mutasi', ['data' => $data]);
    }
    public function menu_mutasi_proses_terima_lokasi_data_order_mutasi(Request $request)
    {
        $check = DB::table('tbl_sub_mutasi')->where('kd_mutasi', $request->code)->where('kd_lokasi_tujuan', null)->first();
        if ($check) {
            return 0;
        } else {
            $jumlah = DB::table('inventaris_data')->where('inventaris_data_cabang', Auth::user()->cabang)->count();
            $data = DB::table('tbl_sub_mutasi')
                ->join('inventaris_data', 'inventaris_data.inventaris_data_code', '=', 'tbl_sub_mutasi.id_inventaris')
                ->where('tbl_sub_mutasi.kd_mutasi', $request->code)->get();
            foreach ($data as $value) {
                $lokasi = DB::table('tbl_nomor_ruangan_cabang')->where('id_nomor_ruangan_cbaang', $value->kd_lokasi_tujuan)->first();
                DB::table('inventaris_data')->insert([
                    'inventaris_data_code' => Auth::user()->cabang . '' . date('ymdhis') . '' . mt_rand(100, 999),
                    'inventaris_klasifikasi_code' => $value->inventaris_klasifikasi_code,
                    'inventaris_data_number' => 'not created',
                    'inventaris_data_name' => $value->inventaris_data_name,
                    'inventaris_data_location' => $lokasi->kd_lokasi,
                    'inventaris_data_jenis' => $value->inventaris_data_jenis,
                    'inventaris_data_harga' => $value->inventaris_data_harga,
                    'inventaris_data_merk' => $value->inventaris_data_merk,
                    'inventaris_data_type' => $value->inventaris_data_type,
                    'inventaris_data_no_seri' => $value->inventaris_data_no_seri,
                    'inventaris_data_suplier' => $value->inventaris_data_suplier,
                    'inventaris_data_kondisi' => 'BAIK',
                    'inventaris_data_status' => 0,
                    'inventaris_data_tgl_beli' => now(),
                    'inventaris_data_cabang' => Auth::user()->cabang,
                    'inventaris_data_urut' => ($jumlah + 1),
                    'inventaris_data_file' => $value->inventaris_data_file,
                    'id_nomor_ruangan_cbaang' => $value->kd_lokasi_tujuan,
                    'created_at' => now(),
                ]);
            }
            DB::table('tbl_mutasi')->where('kd_mutasi', $request->code)->update([
                'tgl_terima' => now(),
                'penerima' => $request->penerima,
                'status_mutasi' => 3
            ]);
            return 1;
        }
    }
    public function menu_mutasi_add_barang(Request $request)
    {
        $data = DB::table('tbl_mutasi')->where('kd_mutasi', $request->code)->first();
        $brg = DB::table('tbl_sub_mutasi')->join('inventaris_data', 'inventaris_data.inventaris_data_code', '=', 'tbl_sub_mutasi.id_inventaris')
            ->where('tbl_sub_mutasi.kd_mutasi', $request->code)->get();

        return view('application.mutasi.form-proses-data-barang', ['data' => $data, 'brg' => $brg]);
    }
    public function menu_mutasi_remove_mutasi(Request $request)
    {
        $data = DB::table('tbl_mutasi')->where('kd_mutasi', $request->code)->first();
        return view('application.mutasi.form-remove-mutasi', ['data' => $data]);
    }
    public function menu_mutasi_proses_remove_mutasi(Request $request)
    {
        DB::table('tbl_sub_mutasi')->where('kd_mutasi', $request->code)->delete();
        DB::table('tbl_mutasi')->where('kd_mutasi', $request->code)->delete();
        return redirect()->back()->withSuccess('Great! Berhasil Penghapusan Data');
    }
    public function menu_mutasi_find_data(Request $request)
    {
        $data = DB::table('inventaris_data')->where('inventaris_data_cabang', Auth::user()->cabang)->where('inventaris_data_name', 'like', '%' . $request->name . '%')->get();
        return view('application.mutasi.hasil-pencarian-barang', ['data' => $data, 'tiket' => $request->code]);
    }
    public function menu_mutasi_pilih_data(Request $request)
    {
        $data = DB::table('inventaris_data')->where('inventaris_data_code', $request->id)->first();
        DB::table('tbl_sub_mutasi')->insert([
            'kd_mutasi' => $request->code,
            'id_inventaris' => $request->id,
            'kd_lokasi_awal' => $data->id_nomor_ruangan_cbaang,
            'created_at' => now()
        ]);
        $brg = DB::table('tbl_sub_mutasi')->join('inventaris_data', 'inventaris_data.inventaris_data_code', '=', 'tbl_sub_mutasi.id_inventaris')
            ->where('tbl_sub_mutasi.kd_mutasi', $request->code)->get();
        return view('application.mutasi.table-check-mutasi', ['brg' => $brg]);
    }
    public function menu_mutasi_verifikasi_data_mutasi(Request $request)
    {
        $check = DB::table('tbl_sub_mutasi')
            ->join('tbl_mutasi', 'tbl_mutasi.kd_mutasi', '=', 'tbl_sub_mutasi.kd_mutasi')
            ->where('tbl_sub_mutasi.kd_mutasi', $request->code)->first();
        if ($check) {
            $token = mt_rand(1000000, 9999999);
            $number = DB::table('wa_number_cabang')->where('wa_number_code', $check->menyetujui)->first();
            $no = 1;
            $qrcode = base64_encode(QrCode::format('png')
                ->size(500)
                ->merge('/storage/app/public/logo.png')
                ->errorCorrection('H')
                ->eyeColor(2, 100, 100, 255, 0, 0, 0)
                ->style('dot')
                ->margin(2)
                ->generate($token));
            $barang = "";
            $data = DB::table('tbl_sub_mutasi')
                ->join('inventaris_data', 'inventaris_data.inventaris_data_code', '=', 'tbl_sub_mutasi.id_inventaris')
                ->where('tbl_sub_mutasi.kd_mutasi', $request->code)->get();
            foreach ($data as $value) {
                $list = $no++ . '. ' . $value->inventaris_data_name . "\n";
                $barang = $barang . '' . $list;
            }
            $text = "Hai \n\nToken Mutasi Anda : *" . $token . "*\nList Barang :\n" . $barang .
                "\n\nPastikan Token disimpan Untuk Verifikasi Data yang Ingin di Mutasi..\n\nSupport By. *Transforma Digital*";
            DB::table('message')->insert([
                'token_code' => str::uuid(),
                'number' => $number->wa_number_no,
                'pesan' => $text,
                'file' => $qrcode,
                'status' => 0,
                'time' => now(),
                'created_at' => now(),
            ]);
            DB::table('tbl_mutasi')->where('kd_mutasi', $request->code)->update([
                'status_mutasi' => 1,
                'token_mutasi' => $token,
            ]);
            return 1;
        } else {
            return 0;
        }
    }
    public function menu_mutasi_verifikasi_code_data_mutasi(Request $request)
    {
        $check = DB::table('tbl_mutasi')->where('kd_mutasi', $request->code)->where('token_mutasi', $request->verifikasi_code)->first();
        if ($check) {
            DB::table('tbl_mutasi')->where('kd_mutasi', $request->code)->update(['status_mutasi' => 2]);
            return 1;
        } else {
            return 0;
        }
    }
    public function menu_mutasi_proses_verifikasi_data_mutasi(Request $request)
    {
        $data = DB::table('tbl_mutasi')->where('kd_mutasi', $request->code)->first();
        $brg = DB::table('tbl_sub_mutasi')
            ->join('inventaris_data', 'inventaris_data.inventaris_data_code', '=', 'tbl_sub_mutasi.id_Inventaris')
            ->where('tbl_sub_mutasi.kd_mutasi', $request->code)->get();
        return view('application.mutasi.form-proses-verifikasi-mutasi', ['data' => $data, 'brg' => $brg]);
    }
    public function menu_mutasi_print_data_mutasi(Request $request)
    {
        return view('application.mutasi.form-print-data-mutasi', ['code' => $request->code]);
    }
    public function menu_mutasi_proses_print_data_mutasi(Request $request)
    {
        $cabang = DB::table('tbl_cabang')->join('tbl_entitas_cabang', 'tbl_entitas_cabang.kd_entitas_cabang', '=', 'tbl_cabang.kd_entitas_cabang')
            ->where('tbl_cabang.kd_cabang', Auth::user()->cabang)->first();
        if ($cabang->kd_entitas_cabang == 'PTP') {
            $image = base64_encode(file_get_contents(public_path('vendor/pramita.png')));
        } elseif ($cabang->kd_entitas_cabang == 'SIMA') {
            $image = base64_encode(file_get_contents(public_path('vendor/sima.jpeg')));
            # code...
        }
        $mutasi = DB::table('tbl_mutasi')
            ->join('tbl_cabang', 'tbl_cabang.kd_cabang', '=', 'tbl_mutasi.target_mutasi')
            ->where('tbl_mutasi.kd_mutasi', $request->code)->first();
        $brg = DB::table('tbl_sub_mutasi')
            ->join('inventaris_data', 'inventaris_data.inventaris_data_code', '=', 'tbl_sub_mutasi.id_inventaris')
            ->where('tbl_sub_mutasi.kd_mutasi', $request->code)->get();
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadview('application.mutasi.report.report-mutasi', ['cabang' => $cabang, 'mutasi' => $mutasi, 'brg' => $brg], compact('image'))->setPaper('A4', 'potrait')->setOptions(['defaultFont' => 'Helvetica']);
        $pdf->output();
        // $canvas = $pdf->getDomPDF()->getCanvas();
        // $height = $canvas->get_height();
        // $width = $canvas->get_width();
        // $canvas->set_opacity(.2, "Multiply");
        // $canvas->set_opacity(.1);
        $dompdf = $pdf->getDomPDF();
        $font = $dompdf->getFontMetrics()->get_font("helvetica", "bold");
        $dompdf->get_canvas()->page_text(300, 820, "{PAGE_NUM} / {PAGE_COUNT}", $font, 10, array(0, 0, 0));
        return base64_encode($pdf->stream());
    }

    // MENU CABANG
    public function menu_cabang($akses)
    {
        if ($this->url_akses($akses) == true) {
            $data = DB::table('tbl_cabang')
                ->join('tbl_entitas_cabang', 'tbl_entitas_cabang.kd_entitas_cabang', '=', 'tbl_cabang.kd_entitas_cabang')
                ->join('tbl_setting_cabang', 'tbl_setting_cabang.kd_cabang', '=', 'tbl_cabang.kd_cabang')
                ->get();
            return view('application.menu-cabang.menu-cabang', ['data' => $data]);
        } else {
            return Redirect::to('dashboard');
        }
    }
    public function menu_cabang_find_cabang(Request $request)
    {
        $data = DB::table('tbl_cabang')
            ->join('tbl_entitas_cabang', 'tbl_entitas_cabang.kd_entitas_cabang', '=', 'tbl_cabang.kd_entitas_cabang')
            ->join('tbl_setting_cabang', 'tbl_setting_cabang.kd_cabang', '=', 'tbl_cabang.kd_cabang')
            ->where('tbl_cabang.nama_cabang', 'like', '%' . $request->code . '%')
            ->get();
        return view('application.menu-cabang.pencarian-cabang', ['data' => $data]);
    }
    public function menu_cabang_data_barang(Request $request)
    {
        $cabang = DB::table('tbl_cabang')->where('kd_cabang', $request->code)->first();
        $data = DB::table('inventaris_data')->where('inventaris_Data_cabang', $request->code)->get();
        return view('application.menu-cabang.data-barang', ['cabang' => $cabang, 'data' => $data]);
    }
    public function menu_cabang_data_peminjaman(Request $request)
    {
        $cabang = DB::table('tbl_cabang')->where('kd_cabang', $request->code)->first();
        $data = DB::table('tbl_peminjaman')
            ->join('tbl_cabang', 'tbl_cabang.kd_cabang', '=', 'tbl_peminjaman.tujuan_cabang')
            ->join('tbl_staff', 'tbl_staff.nip', '=', 'tbl_peminjaman.pj_pinjam')
            ->where('tbl_peminjaman.kd_cabang', $request->code)->orderBy('id_pinjam', 'DESC')->get();
        return view('application.menu-cabang.data-peminjaman', ['cabang' => $cabang, 'data' => $data]);
    }
    public function menu_cabang_data_peminjaman_print(Request $request)
    {
        $cabang = DB::table('tbl_cabang')->join('tbl_entitas_cabang', 'tbl_entitas_cabang.kd_entitas_cabang', '=', 'tbl_cabang.kd_entitas_cabang')
            ->where('tbl_cabang.kd_cabang', $request->cabang)->first();
        if ($cabang->kd_entitas_cabang == 'PTP') {
            $image = base64_encode(file_get_contents(public_path('vendor/pramita.png')));
        } elseif ($cabang->kd_entitas_cabang == 'SIMA') {
            $image = base64_encode(file_get_contents(public_path('vendor/sima.jpeg')));
            # code...
        }
        $peminjaman = DB::table('tbl_peminjaman')->where('tiket_peminjaman', $request->code)->first();
        $data = DB::table('tbl_sub_peminjaman')
            ->join('inventaris_data', 'inventaris_data.inventaris_data_code', '=', 'tbl_sub_peminjaman.id_inventaris')
            ->join('tbl_peminjaman', 'tbl_peminjaman.id_pinjam', '=', 'tbl_sub_peminjaman.id_pinjam')
            ->where('tbl_peminjaman.tiket_peminjaman', $request->code)->get();

        $customPaper = array(0, 0, 50.80, 95.20);
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadview('application.menu-cabang.report.report-peminjaman', ['data' => $data, 'cabang' => $cabang, 'peminjaman' => $peminjaman], compact('image'))->setPaper('A4', 'potrait')->setOptions(['defaultFont' => 'Helvetica']);
        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();
        $height = $canvas->get_height();
        $width = $canvas->get_width();
        $canvas->set_opacity(.2, "Multiply");
        $canvas->set_opacity(.1);
        return base64_encode($pdf->stream());
    }
    public function menu_cabang_data_mutasi(Request $request)
    {
        $cabang = DB::table('tbl_cabang')->where('kd_cabang', $request->code)->first();
        $data = DB::table('tbl_mutasi')->where('kd_cabang', $request->code)->get();
        return view('application.menu-cabang.data-mutasi', ['cabang' => $cabang, 'data' => $data]);
    }
    public function menu_cabang_data_mutasi_print(Request $request)
    {
        $cabang = DB::table('tbl_cabang')->join('tbl_entitas_cabang', 'tbl_entitas_cabang.kd_entitas_cabang', '=', 'tbl_cabang.kd_entitas_cabang')
            ->where('tbl_cabang.kd_cabang', $request->cabang)->first();
        if ($cabang->kd_entitas_cabang == 'PTP') {
            $image = base64_encode(file_get_contents(public_path('vendor/pramita.png')));
        } elseif ($cabang->kd_entitas_cabang == 'SIMA') {
            $image = base64_encode(file_get_contents(public_path('vendor/sima.jpeg')));
            # code...
        }
        $mutasi = DB::table('tbl_mutasi')
            ->join('tbl_cabang', 'tbl_cabang.kd_cabang', '=', 'tbl_mutasi.target_mutasi')
            ->where('tbl_mutasi.kd_mutasi', $request->code)->first();
        $customPaper = array(0, 0, 50.80, 95.20);
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadview('application.menu-cabang.report.report-mutasi', ['cabang' => $cabang, 'mutasi' => $mutasi], compact('image'))->setPaper('A4', 'potrait')->setOptions(['defaultFont' => 'Helvetica']);
        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();
        $height = $canvas->get_height();
        $width = $canvas->get_width();
        $canvas->set_opacity(.2, "Multiply");
        $canvas->set_opacity(.1);
        return base64_encode($pdf->stream());
    }
    public function menu_cabang_data_stockopname(Request $request)
    {
        $cabang = DB::table('tbl_cabang')->where('kd_cabang', $request->code)->first();
        $data = DB::table('tbl_verifdatainventaris')->where('kd_cabang', $request->code)->orderBy('id_verifdatainventaris', 'DESC')->get();
        return view('application.menu-cabang.data-stockopname', ['cabang' => $cabang, 'data' => $data]);
    }
    public function menu_cabang_data_stockopname_print(Request $request)
    {
        $cabang = DB::table('tbl_cabang')->join('tbl_entitas_cabang', 'tbl_entitas_cabang.kd_entitas_cabang', '=', 'tbl_cabang.kd_entitas_cabang')
            ->where('tbl_cabang.kd_cabang', $request->cabang)->first();
        if ($cabang->kd_entitas_cabang == 'PTP') {
            $image = base64_encode(file_get_contents(public_path('vendor/pramita.png')));
        } elseif ($cabang->kd_entitas_cabang == 'SIMA') {
            $image = base64_encode(file_get_contents(public_path('vendor/sima.jpeg')));
            # code...
        }
        $data = DB::table('tbl_verifdatainventaris')->where('kode_verif', $request->code)->first();
        $brg = DB::table('tbl_sub_verifdatainventaris')
            ->join('inventaris_data', 'inventaris_data.inventaris_data_code', '=', 'tbl_sub_verifdatainventaris.id_inventaris')
            ->where('tbl_sub_verifdatainventaris.kode_verif', $request->code)->get();
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadview('application.menu-cabang.report.report-stockopname', ['cabang' => $cabang, 'data' => $data, 'brg' => $brg], compact('image'))->setPaper('A4', 'potrait')->setOptions(['defaultFont' => 'Helvetica']);
        $pdf->output();
        $dompdf = $pdf->getDomPDF();
        $font = $dompdf->getFontMetrics()->get_font("helvetica", "bold");
        $dompdf->get_canvas()->page_text(300, 820, "{PAGE_NUM} / {PAGE_COUNT}", $font, 10, array(0, 0, 0));
        return base64_encode($pdf->stream());
    }

    // MASTER BARANG
    public function master_barang($akses)
    {
        if ($this->url_akses($akses) == true) {
            $data = DB::table('inventaris_data')->limit(20)->get();
            return view('application.master-data.master-barang', ['data' => $data]);
        } else {
            return Redirect::to('dashboard');
        }
    }
    public function master_barang_data(Request $request)
    {
        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowperpage = $request->get("length"); // Rows display per page

        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $order_arr = $request->get('order');
        $search_arr = $request->get('search');

        $columnIndex = $columnIndex_arr[0]['column']; // Column index
        $columnName = $columnName_arr[$columnIndex]['data']; // Column name
        $columnSortOrder = $order_arr[0]['dir']; // asc or desc
        $searchValue = $search_arr['value']; // Search value

        // Total records
        $totalRecords = DataInventaris::select('count(*) as allcount')->where('inventaris_data_cabang', Auth::user()->cabang)->count();
        $totalRecordswithFilter = DataInventaris::select('count(*) as allcount')->where('inventaris_data_name', 'like', '%' . $searchValue . '%')->where('inventaris_data_cabang', Auth::user()->cabang)->count();

        // Fetch records
        $records = DataInventaris::orderBy('id_inventaris_data', $columnSortOrder)
            // ->join('tbl_pemeriksaan','tbl_pemeriksaan.kd_pemeriksaan','=','tbl_perusahaan_paket_log.kd_pemeriksaan')
            ->where('inventaris_data.inventaris_data_name', 'like', '%' . $searchValue . '%')
            ->where('inventaris_data_cabang', Auth::user()->cabang)
            ->select('inventaris_data.*')
            ->skip($start)
            ->take($rowperpage)
            ->get();

        $data_arr = array();
        // $no = 1;
        foreach ($records as $record) {
            $id = $record->inventaris_data_urut;
            $nama_barang = $record->inventaris_data_name;
            $kd_lokasi = $record->inventaris_data_location;
            $no_inventaris = $record->inventaris_data_number;
            $harga_perolehan = $record->inventaris_data_harga;
            $kd_inventaris = $record->inventaris_klasifikasi_code;
            $merk = $record->inventaris_data_merk . ' <br> ' . $record->inventaris_data_type . ' <br> ' . $record->inventaris_data_no_seri;
            $tglbeli = date('d-m-Y', strtotime($record->inventaris_data_tgl_beli));
            $button = "<div class='btn-group' role='group'>
                                    <button class='btn btn-sm btn-primary dropdown-toggle' id='btnGroupVerticalDrop2'
                                        type='button' data-bs-toggle='dropdown' aria-haspopup='true'
                                        aria-expanded='false'><span class='fas fa-align-left'
                                            data-fa-transform='shrink-3'></span></button>
                                    <div class='dropdown-menu' aria-labelledby='btnGroupVerticalDrop2'>
                                        <button class='dropdown-item' data-bs-toggle='modal'
                                            data-bs-target='#modal-master-barang' id='button-edit-master-cabang'
                                            data-code='$record->inventaris_data_code'><span class='far fa-edit'></span>
                                            Edit Data Master</button>
                                        <button class='dropdown-item' data-bs-toggle='modal'
                                            data-bs-target='#modal-master-barang-lg' id='button-cetak-barcode-master-cabang'
                                            data-code='$record->inventaris_data_code'><span class='fas fa-qrcode'></span>
                                            Print Barcode</button>
                                    </div>
                                </div>";
            $ruangan = DB::table('tbl_nomor_ruangan_cabang')->where('id_nomor_ruangan_cbaang', $record->id_nomor_ruangan_cbaang)->first();
            if ($ruangan) {
                $dataruangan = $ruangan->nomor_ruangan;
                if ($record->inventaris_data_status == 5) {
                    $status_barang = '<span class="badge bg-danger" style="font-size: 11px;">Musnah</span>';
                    $button = "";
                } else if ($record->inventaris_data_status == 4) {
                    $status_barang = '<span class="badge bg-warning " style="font-size: 11px;">Mutasi</span>';
                    $button = "";
                } else {
                    $status_barang = '<span class="badge bg-success " style="font-size: 11px;">Baik</span>';
                }
                ;
            } else {
                $dataruangan = '<span class="badge bg-danger" style="font-size: 9px;">Tidak di temukan</span>';
                if ($record->inventaris_data_status == 5) {
                    $status_barang = '<span class="badge bg-danger " style="font-size: 11px;">Musnah</span>';
                    $button = "";
                } else if ($record->inventaris_data_status == 4) {
                    $status_barang = '<span class="badge bg-warning " style="font-size: 11px;">Mutasi</span>';
                    $button = "";
                } else {
                    $status_barang = '<span class="badge bg-success " style="font-size: 11px;">Baik</span>';

                }
            }
            $data_arr[] = array(
                "id" => $id,
                "nama_barang" => $nama_barang,
                "no_inventaris" => $no_inventaris,
                "harga_perolehan" => number_format($harga_perolehan, 0, ",", "."),
                "kd_inventaris" => $kd_inventaris,
                "kd_lokasi" => $kd_lokasi,
                "dataruangan" => $dataruangan,
                "merk" => $merk,
                "tglbeli" => $tglbeli,
                "status_barang" => $status_barang,
                "btn" => $button
            );
        }

        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
            "aaData" => $data_arr
        );

        echo json_encode($response);
        exit;

    }
    public function master_barang_data_edit(Request $request)
    {
        $data = DB::table('inventaris_data')->where('inventaris_data.inventaris_data_code', $request->code)->first();
        $lokasi = DB::table('tbl_nomor_ruangan_cabang')
            ->join('master_lokasi', 'master_lokasi.master_lokasi_code', '=', 'tbl_nomor_ruangan_cabang.kd_lokasi')
            ->where('tbl_nomor_ruangan_cabang.kd_cabang', Auth::user()->cabang)->get();
        $klasifikasi = DB::table('inventaris_klasifikasi')->get();
        return view('application.master-data.master-barang.form-edit-master-barang', ['data' => $data, 'lokasi' => $lokasi, 'klasifikasi' => $klasifikasi]);
    }
    public function master_barang_data_save(Request $request)
    {
        if ($request->lokasi == "") {
            $loc = $request->location;
        } else {
            $x = DB::table('tbl_nomor_ruangan_cabang')->where('id_nomor_ruangan_cbaang', $request->lokasi)->first();
            $loc = $x->kd_lokasi;
        }

        DB::table('inventaris_data')->where('inventaris_data_code', $request->code)->update([
            'inventaris_data_name' => $request->nama_barang,
            'inventaris_data_number' => $request->no_inventaris,
            'inventaris_data_location' => $loc,
            'inventaris_data_jenis' => $request->jenis,
            'inventaris_data_harga' => $request->harga,
            'inventaris_data_merk' => $request->merk,
            'inventaris_data_type' => $request->type,
            'inventaris_data_no_seri' => $request->no_seri,
            'inventaris_data_suplier' => $request->suplier,
            'inventaris_data_tgl_beli' => $request->tgl_beli,
            'id_nomor_ruangan_cbaang' => $request->lokasi,
        ]);
        return redirect()->back()->withSuccess('Great! Berhasil Menambahkan Data Pemusnahan');
    }
    public function master_barang_data_cetak_barcode(Request $request)
    {
        $cabang = DB::table('tbl_cabang')->join('tbl_entitas_cabang', 'tbl_entitas_cabang.kd_entitas_cabang', '=', 'tbl_cabang.kd_entitas_cabang')
            ->where('tbl_cabang.kd_cabang', Auth::user()->cabang)->first();
        if ($cabang->kd_entitas_cabang == 'PTP') {
            $image = base64_encode(file_get_contents(public_path('vendor/pramita.png')));
        } elseif ($cabang->kd_entitas_cabang == 'SIMA') {
            $image = base64_encode(file_get_contents(public_path('vendor/sima.jpeg')));
            # code...
        }
        $customPaper = array(0, 0, 50.80, 95.20);
        $data = DB::table('inventaris_data')
            ->where('inventaris_data_code', $request->code)->first();
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadview('application.master-data.master-barang.report.report-barcode', ['data' => $data])->setPaper($customPaper, 'landscape')->setOptions(['defaultFont' => 'Helvetica']);
        $pdf->output();
        $canvas = $pdf->getDomPDF()->getCanvas();
        $height = $canvas->get_height();
        $width = $canvas->get_width();
        $canvas->set_opacity(.2, "Multiply");
        $canvas->set_opacity(.1);
        return base64_encode($pdf->stream());
    }
    public function master_barang_sinkronisasi_data_cabang(Request $request)
    {
        $cabang = DB::table('tbl_cabang')
            ->join('tbl_setting_cabang', 'tbl_setting_cabang.kd_cabang', '=', 'tbl_cabang.kd_cabang')
            ->join('tbl_entitas_cabang', 'tbl_entitas_cabang.kd_entitas_cabang', '=', 'tbl_cabang.kd_entitas_cabang')
            ->where('tbl_cabang.kd_cabang', Auth::user()->cabang)->first();
        $no = 1;
        $urut = 1;
        $data = DB::table('inventaris_data')->where('inventaris_data_cabang', Auth::user()->cabang)->orderBy('id_inventaris_data', 'ASC')->get();
        foreach ($data as $value) {
            DB::table('inventaris_data')->where('inventaris_data_code', $value->inventaris_data_code)->update([
                'inventaris_data_number' => $no++ . '/' . $value->inventaris_klasifikasi_code . '/' . $value->inventaris_data_location . '/' . $cabang->simbol_entitas . '.' . $cabang->no_cabang . '/' . date('Y', strtotime($value->inventaris_data_tgl_beli)),
                'inventaris_data_urut' => $urut++
            ]);
        }
    }
    // MASTER NO DOCUMENT
    public function master_no_document($akses)
    {
        if ($this->url_akses($akses) == true) {
            $data = DB::table('master_doocument')->get();
            return view('application.master-data.master-no-document', ['data' => $data]);
        } else {
            return Redirect::to('dashboard');
        }
    }
    // MASTER NO WHATSAPP
    public function master_no_whatsapp($akses)
    {
        if ($this->url_akses($akses) == true) {
            $data = DB::table('wa_number_cabang')->where('kd_cabang', Auth::user()->cabang)->get();
            return view('application.master-data.master-no-whatsapp', ['data' => $data]);
        } else {
            return Redirect::to('dashboard');
        }
    }
    public function master_no_whatsapp_add(Request $request)
    {

        return view('application.master-data.whatsapp.form-add');
    }
    public function master_no_whatsapp_save(Request $request)
    {
        if (substr($request->nomor, 0, 1) == 0) {
            $nomor = "+62" . substr(trim($request->nomor), 1);
        } elseif (substr($request->nomor, 0, 2) == '62') {
            $nomor = "+" . $request->nomor;
        } else {
            $nomor = $request->pj;
        }
        DB::table('wa_number_cabang')->insert([
            'wa_number_code' => str::uuid(),
            'wa_number_name' => $request->name,
            'wa_number_no' => $nomor,
            'kd_cabang' => Auth::user()->cabang,
            'wa_number_akses' => $request->akses,
            'created_at' => now()
        ]);
        return redirect()->back()->withSuccess('Great! Berhasil Menambahkan Data');
    }
    public function master_no_whatsapp_update(Request $request)
    {
        $data = DB::table('wa_number_cabang')->where('wa_number_code', $request->code)->first();
        return view('application.master-data.whatsapp.form-update', ['data' => $data]);
    }
    public function master_no_whatsapp_update_save(Request $request)
    {
        DB::table('wa_number_cabang')->where('wa_number_code', $request->code)->update([
            'wa_number_name' => $request->name,
            'wa_number_no' => $request->nomor,
            'wa_number_akses' => $request->akses,
        ]);
        return redirect()->back()->withSuccess('Great! Berhasil Update Data');
    }
}
