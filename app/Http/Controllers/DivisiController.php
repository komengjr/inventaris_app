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
    public function updatedatainventori(Request $request)
    {
        DB::table('sub_tbl_inventory')
        ->where('id_inventaris',$request->input('kode_kode'))
        ->update([
                    'nama_barang' => $request->input('nama_barang'),
                    // 'kd_inventaris' => $request->input('kd_inventaris'),
                    'kd_lokasi' => $request->input('kd_lokasi'),
                    // 'kd_cabang' => $request->input('kd_cabang'),
                    // 'th_pembuatan' => $request->input('th_pembuatan'),
                    // 'outlet' => $request->input('outlet'),
                    'th_perolehan' => $request->input('th_perolehan'),
                    'merk' => $request->input('merk'),
                    'no_seri' => $request->input('no_seri'),
                    'suplier' => $request->input('suplier'),
                    'type' => $request->input('type'),
                    'harga_perolehan' => $request->input('harga_perolehan'),
                    // 'tgl_mutasi' => $request->input('tgl_mutasi'),
                    // 'tujuan_mutasi' => $request->input('tujuan_mutasi'),
                    // 'nilai_buku' => $request->input('nilai_buku'),
                    // 'tgl_musnah' => $request->input('tgl_musnah'),
                    // 'kondisi_barang' => $request->input('kondisi_barang'),
                    // 'jam_input' => $request->input('jam_input'),
                    // 'ket_musnah' => $request->input('ket_musnah'),

                ]);
        $data = DB::table('sub_tbl_inventory')
        ->select('sub_tbl_inventory.*')
        ->where('kd_lokasi',$request->input('kd_lokasi'))
        ->where('kd_cabang',$request->input('kd_cabang'))
        ->get();
        $id = $request->input('kd_lokasi');
        // dd($id);
        return view('admin.sub_barang1',['data'=>$data,'id'=>$id ]);
    }


    public function menu()
    {
        $datapinjam = DB::table('tbl_peminjaman')->where('kd_cabang',auth::user()->cabang)->orderBy('id_pinjam', 'DESC')->get();
        return view('divisi.menu',[ 'datapinjam' => $datapinjam]);
    }
    public function menumaintenance()
    {
        $datapinjam = DB::table('tbl_peminjaman')->where('kd_cabang',auth::user()->cabang)->orderBy('id_pinjam', 'DESC')->get();
        return view('divisi.menumaintenance',[ 'datapinjam' => $datapinjam]);
    }
    public function menupemusnahan()
    {
        $datapinjam = DB::table('tbl_peminjaman')->where('kd_cabang',auth::user()->cabang)->orderBy('id_pinjam', 'DESC')->get();
        return view('divisi.menupemusnahan',[ 'datapinjam' => $datapinjam]);
    }
    public function verifdatainventaris()
    {
        $dataverif = DB::table('tbl_verifdatainventaris')->where('kd_cabang',auth::user()->cabang)->get();
        return view('divisi.verifdatainventaris',[ 'dataverif' => $dataverif]);
    }
    public function tambahdatapeminjaman()
    {
        $randomString = Str::random(4);
        $tgl = date('d:m:Y');
        $jadi = 'PB-'.$tgl.'-'.$randomString;


        return view('divisi.formpeminjaman',['tiket' => $jadi ]);
    }
    public function tambahdataverifikasiinventaris()
    {
        $randomString = Str::random(4);
        $tgl = date('d:m:Y');
        $jadi = 'VI-'.$tgl.'-'.$randomString;


        return view('divisi.formverivikasi',['tiket' => $jadi ]);
    }
    public function lengkapipeminjaman($id)
    {
        $cekdata = DB::table('tbl_peminjaman')
        ->where('id_pinjam',$id)
        ->get();
        $databarang = DB::table('tbl_sub_peminjaman')->where('id_pinjam',$id)->get();
        return view('divisi.menulengkapi.lengkapi_peminjaman',['cekdata'=>$cekdata ,'databarang'=>$databarang]);
    }
    public function inputdatabarangpinjam($id)
    {
        $databrg = DB::table('sub_tbl_inventory')
        ->join('tbl_lokasi','tbl_lokasi.kd_lokasi','=','sub_tbl_inventory.kd_lokasi')
        ->where('kd_cabang',auth::user()->cabang)->get();
        $databarang = DB::table('tbl_sub_peminjaman')->where('id_pinjam',$id)->get();
        return view('divisi.menulengkapi.inputdatabarangpinjam',['databrg'=>$databrg,'id'=>$id]);
    }
    public function pengembaliandatabarang($id)
    {
        $databrg = DB::table('sub_tbl_inventory')
        ->join('tbl_lokasi','tbl_lokasi.kd_lokasi','=','sub_tbl_inventory.kd_lokasi')
        ->where('kd_cabang',auth::user()->cabang)->get();
        $databarang = DB::table('tbl_sub_peminjaman')->where('id_pinjam',$id)->get();
        return view('divisi.menulengkapi.pengembaliandatabarangpinjam',['databrg'=>$databrg,'id'=>$id]);
    }
    public function tablepeminjaman($id,$ids)
    {

        $cekdata = DB::table('sub_tbl_inventory')
        ->where('id_inventaris',$id)
        ->where('kd_cabang',auth::user()->cabang)
        ->get();

        if ($cekdata->isEmpty()) {
            $notif = 0;
            $databarang = DB::table('tbl_sub_peminjaman')->where('id_pinjam',$ids)->get();
            return view('divisi.menulengkapi.tablepeminjaman',['notif'=>$notif, 'databarang'=>$databarang]);
        } else {
            $cekiddata = DB::table('tbl_sub_peminjaman')
            ->join('tbl_peminjaman','tbl_sub_peminjaman.id_pinjam','=','tbl_peminjaman.id_pinjam')
            ->where('tbl_sub_peminjaman.id_inventaris',$id)
            ->where('tbl_peminjaman.id_pinjam',$ids)
            ->where('tbl_peminjaman.status_pinjam',0)
            ->get();

            if ($cekiddata->isEmpty()) {

                $cekdatasub = DB::table('tbl_sub_peminjaman')
                ->where('tbl_sub_peminjaman.id_inventaris',$id)
                ->where('tbl_sub_peminjaman.status_sub_peminjaman',0)
                ->get();

                if ($cekdatasub->isEmpty()) {
                    DB::table('tbl_sub_peminjaman')->insert(
                        [
                            'id_pinjam' => $ids,
                            'id_inventaris' => $id,
                            'tgl_pinjam_barang' => date('Y-m-d H:i:s'),
                            'status_sub_peminjaman' => 0,
                            'created_at' => date('Y-m-d H:i:s'),
                        ]);
                    $notif = 1;
                    $databarang = DB::table('tbl_sub_peminjaman')->where('id_pinjam',$ids)->get();
                    return view('divisi.menulengkapi.tablepeminjaman',['notif'=>$notif, 'databarang'=>$databarang]);
                } else {
                    $notif = 2;
                    $databarang = DB::table('tbl_sub_peminjaman')->where('id_pinjam',$ids)->get();
                    return view('divisi.menulengkapi.tablepeminjaman',['notif'=>$notif, 'databarang'=>$databarang]);
                }




            } else {
                $notif = 2;
                $databarang = DB::table('tbl_sub_peminjaman')->where('id_pinjam',$ids)->get();
                return view('divisi.menulengkapi.tablepeminjaman',['notif'=>$notif, 'databarang'=>$databarang]);
            }


        }


    }
    public function pengembaliantablepeminjaman($id,$ids)
    {

        $cekdata = DB::table('sub_tbl_inventory')
        ->where('id_inventaris',$id)
        ->where('kd_cabang',auth::user()->cabang)
        ->get();

        if ($cekdata->isEmpty()) {
            $notif = 0;
            $databarang = DB::table('tbl_sub_peminjaman')->where('id_pinjam',$ids)->get();
            return view('divisi.menulengkapi.tablepeminjaman',['notif'=>$notif, 'databarang'=>$databarang]);
        } else {
            $cekiddata = DB::table('tbl_sub_peminjaman')
            ->join('tbl_peminjaman','tbl_sub_peminjaman.id_pinjam','=','tbl_peminjaman.id_pinjam')
            ->where('id_inventaris',$id)
            ->where('tbl_sub_peminjaman.id_pinjam',$ids)
            ->where('tbl_sub_peminjaman.status_sub_peminjaman',0)
            ->where('tbl_peminjaman.status_pinjam',0)->get();

            if ($cekiddata->isEmpty()) {
                $notif = 2;
                $databarang = DB::table('tbl_sub_peminjaman')->where('id_pinjam',$ids)->get();
                return view('divisi.menulengkapi.tablepeminjaman',['notif'=>$notif, 'databarang'=>$databarang]);


            } else {
                DB::table('tbl_sub_peminjaman')
                ->where('id_inventaris',$id)
                ->where('id_pinjam',$ids)
                ->update([
                            'tgl_kembali_barang' => date('Y-m-d H:i:s'),
                            'status_sub_peminjaman' => 1,

                        ]);
                $notif = 1;
                $databarang = DB::table('tbl_sub_peminjaman')->where('id_pinjam',$ids)->get();
                return view('divisi.menulengkapi.tablepeminjaman',['notif'=>$notif, 'databarang'=>$databarang]);
            }


        }


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
                'kd_cabang' => auth::user()->cabang,
                'deskripsi' => $request->input('deskripsi'),
                'created_at' => date('Y-m-d H:i:s'),
            ]);
            Session::flash('sukses','Berhasil Membuat Tiket Tugas User'.$request->input('tiket_peminjaman'));
            return redirect()->back();
    }
    public function posttambahverifikasi(Request $request)
    {
        DB::table('tbl_verifdatainventaris')->insert(
            [
                'kode_verif' => $request->input('tiket_verif'),
                'tgl_verif' => $request->input('waktu'),
                'tahun' => 2022,
                'kd_cabang' => auth::user()->cabang,
                'status_verif' => 0,
                'created_at' => date('Y-m-d H:i:s'),
            ]);
            Session::flash('sukses','Berhasil Membuat Tiket Tugas User'.$request->input('tiket_verif'));
            return redirect()->back();
    }
    public function verifikasilengkapi($id)
    {
        $cekdata = DB::table('tbl_verifdatainventaris')
        ->where('kode_verif',$id)
        ->get();
        $tbl_cabang = DB::table('tbl_cabang')->where('kd_cabang',auth::user()->cabang)->get();
        $lokasi = DB::table('tbl_lokasi')->get();
        // $databarang = DB::table('sub_tbl_inventory')->where('kode_verif',$id)->get();
        // $databarang = DB::table('tbl_sub_verifdatainventaris')->where('kode_verif',$id)->get();
        return view('divisi.menulengkapi.lengkapi_verifikasi',['cekdata'=> $cekdata,'cabang'=>$tbl_cabang, 'lokasi'=>$lokasi]);
    }
    public function verifikasilengkapilokasi($tiket,$id)
    {
        $databarang = DB::table('sub_tbl_inventory')
        ->where('kd_lokasi',$id)
        ->where('kd_cabang',auth::user()->cabang)
        ->get();
        return view('divisi.menulengkapi.lengkapilokasi',['databarang'=>$databarang,'tiket'=>$tiket]);
    }
    public function verifikasilengkapiupdatebaranglokasi($id,$tiket,$id_inventaris,$ket)
    {
        $cekdata = DB::table('tbl_sub_verifdatainventaris')
        ->where('kode_verif',$tiket)
        ->where('id_inventaris',$id_inventaris)->count();

        if ($cekdata == 0) {
            DB::table('tbl_sub_verifdatainventaris')->insert(
                [
                    'kode_verif' => $tiket,
                    'id_inventaris' => $id_inventaris,
                    'status_data_inventaris' => $id,
                    'keterangan_data_inventaris' => $ket,
                    'created_at' => date('Y-m-d H:i:s'),
            ]);
        } else {
            DB::table('tbl_sub_verifdatainventaris')
            ->where('id_inventaris',$id_inventaris)
            ->where('kode_verif',$tiket)
            ->update([
                    'status_data_inventaris' => $id,
                    'keterangan_data_inventaris' => $ket,
                    ]);
        }


    }






    public function faq()
    {
        return view('faq');
    }
}
