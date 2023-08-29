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
        $nilai = $string = preg_replace("/[^0-9]/","",$request->harga_perolehan);
        DB::table('sub_tbl_inventory')
        ->where('id_inventaris',$request->input('kode_kode'))
        ->update([
                    'nama_barang' => $request->input('nama_barang'),
                    'kd_lokasi' => $request->input('kd_lokasi'),
                    'th_perolehan' => $request->input('th_perolehan'),
                    'merk' => $request->input('merk'),
                    'no_seri' => $request->input('no_seri'),
                    'suplier' => $request->input('suplier'),
                    'type' => $request->input('type'),
                    'harga_perolehan' => $nilai,

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
        if (auth::user()->akses == 'sdm') {
        $jumlahdata = DB::table('tbl_peminjaman')->where('kd_cabang',auth::user()->cabang)->count();
        $jumlahdataselesai = DB::table('tbl_peminjaman')->where('kd_cabang',auth::user()->cabang)->where('status_pinjam',1)->count();
        if ($jumlahdata == 0 && $jumlahdataselesai == 0) {
            $jumlahdata = 1;
            $jumlahdataselesai = 1;
        }
        $datapinjam = DB::table('tbl_peminjaman')
        ->join('tbl_staff','tbl_staff.nip','=','tbl_peminjaman.pj_pinjam')
        ->where('tbl_peminjaman.kd_cabang',auth::user()->cabang)->orderBy('id_pinjam', 'DESC')->get();
        return view('divisi.menupeminjaman',[ 'datapinjam' => $datapinjam, 'jumlahdata'=>$jumlahdata,'jumlahdataselesai'=>$jumlahdataselesai]);

        }
    }
    public function menumaintenance()
    {
        $dataperiode = DB::table('tbl_periode')->where('status_periode',1)->get();
        $datamaintenance = DB::table('tbl_maintenance')->join('sub_tbl_inventory','sub_tbl_inventory.id_inventaris','=','tbl_maintenance.id_inventaris')->get();
        return view('divisi.menumaintenance',[ 'dataperiode' => $dataperiode, 'datamaintenance'=>$datamaintenance]);
    }
    public function tindakanmaintenance($id)
    {
        return view('divisi.modal.tindakanmaintenance',['id'=>$id]);
    }
    public function menupemusnahan()
    {
        $datakategori = DB::table('no_urut_barang')->get();
        return view('divisi.menupemusnahan',[ 'datakategori' => $datakategori]);
    }
    public function verifdatainventaris()
    {
        $dataverif = DB::table('tbl_verifdatainventaris')->where('kd_cabang',auth::user()->cabang)->get();
        return view('divisi.verifdatainventaris',[ 'dataverif' => $dataverif]);
    }
    public function tambahdatapeminjaman()
    {
        $randomString = mt_rand(1, 10);
        $tgl = date('d-m-Y');
        $jadi = 'PJ-SDM-'.auth::user()->cabang.'-'.$tgl.'-'.$randomString;
        $cabang = DB::table('tbl_cabang')->get();
        $staff = DB::table('tbl_staff')->where('kd_cabang',auth::user()->cabang)->get();
        return view('divisi.formpeminjaman',['tiket' => $jadi ,'cabang'=>$cabang,'staff'=>$staff]);
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
                            'kd_cabang' => auth::user()->cabang,
                            'kondisi_pinjam' => $cekdata[0]->kondisi_barang,
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
    public function refreshtablepeminjaman($id)
    {
        $notif = 4;
        $databarang = DB::table('tbl_sub_peminjaman')->where('id_pinjam',$id)->get();
        return view('divisi.menulengkapi.tablepeminjaman',['notif'=>$notif, 'databarang'=>$databarang]);
    }
    public function editdatatablepeminjaman($id)
    {
        $cekdata = DB::table('tbl_peminjaman')
        ->where('id_pinjam',$id)->get();
        $cabang =  DB::table('tbl_cabang')->get();
        return view('divisi.menulengkapi.editdatapeminjaman',['cekdata'=>$cekdata,'cabang'=>$cabang]);
    }
    public function editdatapeminjaman($id)
    {
        $data = DB::table('tbl_sub_peminjaman')
        ->join('sub_tbl_inventory','sub_tbl_inventory.id_inventaris','=','tbl_sub_peminjaman.id_inventaris')
        ->where('id_sub_peminjaman',$id)->first();
        return view('divisi.menulengkapi.editdatabarang',['data'=>$data]);
    }
    public function posteditdatapeminjaman(Request $request)
    {
        if ($request->tgl_kembali_barang == "") {
            DB::table('tbl_sub_peminjaman')
            ->where('id_sub_peminjaman',$request->id_sub_peminjaman)
            ->update([
                        'tgl_pinjam_barang' => $request->tgl_pinjam_barang,
                        'tgl_kembali_barang' => $request->tgl_kembali_barang,
                        'kondisi_pinjam' => $request->kondisi_pinjam,
                        'kondisi_kembali' => $request->kondisi_kembali,
                    ]);
        } else {
            DB::table('tbl_sub_peminjaman')
            ->where('id_sub_peminjaman',$request->id_sub_peminjaman)
            ->update([
                        'tgl_pinjam_barang' => $request->tgl_pinjam_barang,
                        'tgl_kembali_barang' => $request->tgl_kembali_barang,
                        'kondisi_pinjam' => $request->kondisi_pinjam,
                        'kondisi_kembali' => $request->kondisi_kembali,
                        'status_sub_peminjaman' => 1,
                    ]);
        }


        $notif = 4;
        $databarang = DB::table('tbl_sub_peminjaman')->where('id_pinjam',$request->id_pinjam)->get();
        return view('divisi.menulengkapi.tablepeminjaman',['notif'=>$notif, 'databarang'=>$databarang]);
    }
    public function hapusdetaildatapeminjaman($id,$ids)
    {
        DB::table('tbl_sub_peminjaman')->where('id_sub_peminjaman', $id)->delete();
        $notif = 4;
        $databarang = DB::table('tbl_sub_peminjaman')->where('id_pinjam',$ids)->get();
        return view('divisi.menulengkapi.tablepeminjaman',['notif'=>$notif, 'databarang'=>$databarang]);
    }

    public function tablecaripeminjaman($id,$datax)
    {
        $data = DB::table('sub_tbl_inventory')
        ->where('kd_cabang',auth::user()->cabang)
        ->where('nama_barang', 'like', '%' . $datax . '%')->get();
        return view('divisi.menulengkapi.tablecaridata',['id'=>$id,'data'=>$data , 'datax'=>$datax]);
    }
    public function inserttablepeminjaman($id,$ids,$datax)
    {
        DB::table('tbl_sub_peminjaman')->insert(
            [
                'id_pinjam' => $id,
                'id_inventaris' => $ids,
                'tgl_pinjam_barang' => date('Y-m-d H:i:s'),
                'kd_cabang' => auth::user()->cabang,
                'kondisi_pinjam' => 'BAIK',
                'status_sub_peminjaman' => 0,
                'created_at' => date('Y-m-d H:i:s'),
            ]);
        $notif = 1;
        $data = DB::table('sub_tbl_inventory')
        ->where('kd_cabang',auth::user()->cabang)
        ->where('nama_barang', 'like', '%' . $datax . '%')->get();
        return view('divisi.menulengkapi.tablecaridata',['id'=>$id,'data'=>$data, 'datax'=>$datax]);
    }
    public function caridatabarang($id)
    {
        return view('divisi.menulengkapi.caridatabarang',['id'=>$id]);
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
                'tujuan_cabang' => $request->input('cabang'),
                'tgl_pinjam' => $request->input('tgl_pinjam'),
                'pj_pinjam' => $request->input('pj_pinjam'),
                'status_pinjam' => 0,
                'kd_cabang' => auth::user()->cabang,
                'deskripsi' => $request->input('deskripsi'),
                'created_at' => date('Y-m-d H:i:s'),
            ]);
            Session::flash('sukses','Berhasil Membuat Tiket Peminjaman : '.$request->input('tiket_peminjaman'));
            return redirect()->back();
    }
    public function editdatapeminjamanpost(Request $request)
    {
        DB::table('tbl_peminjaman')->where('tiket_peminjaman',$request->input('tiket_peminjaman'))->update(
            [
                'nama_kegiatan' => $request->input('nama_kegiatan'),
                'tujuan_cabang' => $request->input('cabang'),
                'tgl_pinjam' => $request->input('tgl_pinjam'),
                'pj_pinjam' => $request->input('pj_pinjam'),
                'status_pinjam' => 0,
                'kd_cabang' => auth::user()->cabang,
                'deskripsi' => $request->input('deskripsi'),
                'created_at' => date('Y-m-d H:i:s'),
            ]);
            Session::flash('sukses','Berhasil Membuat Tiket Peminjaman : '.$request->input('tiket_peminjaman'));
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






    public function masterbarang()
    {
        $datakategori = DB::table('no_urut_barang')->get();
        $data = DB::table('sub_tbl_inventory')
        ->join('tbl_lokasi','tbl_lokasi.kd_lokasi','=','sub_tbl_inventory.kd_lokasi')
        ->orderBy('sub_tbl_inventory.no', 'asc')
        ->where('kd_cabang',auth::user()->cabang)->get();
        // dd($data);
        return view('divisi.masterbarang',[ 'datakategori' => $datakategori, 'data'=>$data]);
    }
    public function tokenmasterbarang()
    {
        $no = 0 ;
        $datakategori = DB::table('sub_tbl_inventory')->get();
        $data = DB::table('sub_tbl_inventory')->distinct()->select('sub_tbl_inventory.th_perolehan')
        ->join('tbl_lokasi','tbl_lokasi.kd_lokasi','=','sub_tbl_inventory.kd_lokasi')
        ->orderBy('sub_tbl_inventory.th_perolehan', 'asc')
        ->where('kd_cabang',auth::user()->cabang)->get();
        foreach ($data as $data) {

        $cekjumlah = DB::table('sub_tbl_inventory')
        ->join('tbl_setting_cabang','tbl_setting_cabang.kd_cabang','=','sub_tbl_inventory.kd_cabang')
        ->orderBy('sub_tbl_inventory.th_perolehan', 'asc')
        ->where('sub_tbl_inventory.th_perolehan',$data->th_perolehan)
        ->where('sub_tbl_inventory.kd_cabang',auth::user()->cabang)->get();

            foreach ($cekjumlah as $value) {
                $no = $no + 1;
                DB::table('sub_tbl_inventory')
                ->where('id_inventaris',$value->id_inventaris)
                ->where('kd_cabang',auth::user()->cabang)
                ->update([
                            'no_inventaris' => $no.'/'.$value->kd_inventaris.'/'.$value->kd_lokasi.'/P.'.$value->no_cabang.'/'.$value->th_perolehan,
                            'no' =>  $no
                            // 'no_inventaris' => $item->id.'/'.$item->kd_inventaris.'/'.$item->kd_lokasi.'/P.'.$item->no_cabang.'/'.$item->th_perolehan,
                        ]);
            }


        }
        return redirect()->back();
    }
    public function settingsystem(Request $request)
    {
        $ceksetting = DB::table('tbl_setting_cabang')->where('kd_cabang',auth::user()->cabang)->get();
        if ($ceksetting->isEmpty()) {
            DB::table('tbl_setting_cabang')->insert(
                [
                    'kd_cabang' => auth::user()->cabang,
                    'no_cabang' => $request->no_cabang,
            ]);
            DB::table('tbl_ttd')->insert(
                [
                    'kd_cabang' => auth::user()->cabang,
                    'ttd_1' => $request->nama_1,
                    'ttd_2' => $request->nama_2,
                    'ttd_3' => $request->nama_3,
            ]);
        } else {

        }
        return redirect()->back();
    }
    public function faq()
    {
        return view('faq');
    }
    public function masterbarangshowedit($id)
    {
        $data = DB::table('sub_tbl_inventory')
        ->where('id_inventaris',$id)->first();
        return view('divisi.modal.editbarang',['data'=>$data]);
    }
    public function posteditbarang(Request $request)
    {
        DB::table('sub_tbl_inventory')
        ->where('id_inventaris',$request->id_inventaris)
        ->update([
                    'nama_barang' => $request->nama_barang,
                    'merk' => $request->merk,
                    'type' => $request->type,
                    'harga_perolehan' => $request->harga,
                ]);
        return redirect()->back();
    }

    public function tabledataaset()
    {
        $dataaset = DB::table('sub_tbl_inventory')->where('kd_jenis',1)->where('kd_cabang',auth::user()->cabang)->get();
        $datadepresiasi = DB::table('tbl_depresiasi')->get();
        return view('divisi.modal.tableaset',[
            'dataaset'=>$dataaset,
            'datadepresiasi'=> $datadepresiasi,
        ]);
    }
    public function tambahdataaset()
    {
        $kode = DB::table('tbl_inventory')->get();
        $datadepresiasi = DB::table('tbl_depresiasi')->get();
        return view('divisi.modal.tambahaset',[
            'kode'=>$kode,
            'datadepresiasi'=> $datadepresiasi,
        ]);
    }
    public function pilihdata()
    {
        $dataaset = DB::table('sub_tbl_inventory')->where('kd_cabang',auth::user()->cabang)->get();
        $datadepresiasi = DB::table('tbl_depresiasi')->get();
        return view('divisi.modal.pilihaset',[
            'dataaset'=>$dataaset,
            'datadepresiasi'=> $datadepresiasi,
        ]);
    }
    public function getdatadepresiasiaset($id,$tgl,$harga)
    {

        $fixharga = $harga;

        $datadepresiasi = DB::table('tbl_depresiasi')

        ->where('kd_depresiasi',$id)->first();
        $pengurangan = $harga / ($datadepresiasi->masa*12);
        for ($i=0; $i < $datadepresiasi->masa*12; $i++) {
            $data[$i] = date('d - M - Y', strtotime('+'.$i.' month', strtotime($tgl)));
        }
        for ($i=0; $i < $datadepresiasi->masa*12; $i++) {
            $hargaperolehan[$i] = $fixharga;
            $fixharga = $fixharga - $pengurangan;
        }
        $persen = ($pengurangan/$harga)*100;
        // dd($hargaperolehan);
        return view('divisi.modal.hitungdepresiasi',[
            'data'=>$data ,
            'hargaperolehan'=>$hargaperolehan ,
            'harga'=>$harga,
            'persen'=>$persen,
            'pengurangan'=>$pengurangan,
            'datadepresiasi'=>$datadepresiasi
        ]);
    }
    public function datadepresiasi()
    {
        $data = DB::table('tbl_depresiasi')->get();
        return view('divisi.modal.datadepresiasi',['data'=>$data]);
    }
    public function detaildataaset($id)
    {
        $kode = DB::table('tbl_inventory')
        ->where('kd_cabang', auth::user()->cabang)
        ->get();
        $data = DB::table('tbl_depresiasi')->get();
        $datainventaris = DB::table('sub_tbl_inventory')->where('id_inventaris',$id)->first();
        return view('divisi.modal.detaildataaset',[
            'datadepresiasi'=>$data,
            'kode'=>$kode,
            'datainventaris'=>$datainventaris
        ]);
    }
    public function editdetaildataaset($id)
    {
        $kode = DB::table('tbl_inventory')->get();
        $data = DB::table('tbl_depresiasi')->get();
        $datainventaris = DB::table('sub_tbl_inventory')->where('id_inventaris',$id)->first();
        // dd($datainventaris);
        return view('divisi.modal.updatedetailaset',[
            'datadepresiasi'=>$data,
            'kode'=>$kode,
            'datainventaris'=>$datainventaris
        ]);
    }

    public function depresiasisemuaaset()
    {
        $data = DB::table('sub_tbl_inventory')->where('kd_jenis',1)->where('kd_cabang',auth::user()->cabang)->get();
        $datakategori = DB::table('no_urut_barang')->get();
        return view('divisi.menudepresiasi',['datakategori' => $datakategori,'data'=>$data]);
    }

    public function datadetailasetcabang($id)
    {

        $data = DB::table('tbl_depresiasi')->get();
        $datainventaris = DB::table('sub_tbl_inventory')->where('id_inventaris',$id)->first();
        return view('divisi.form.detailaset',[
            'datadepresiasi'=>$data,
            'datainventaris'=>$datainventaris
        ]);
    }
    public function mutasidatainventaris()
    {
        $data = DB::table('tbl_mutasi')->where('kd_cabang',auth::user()->cabang)->get();
        $datakategori = DB::table('no_urut_barang')->get();
        return view('divisi.menumutasi',['datakategori' => $datakategori, 'data'=>$data]);
    }
    public function ordertiketmutasi()
    {
        $cabang = DB::table('tbl_cabang')->get();
        return view('divisi.modal.ordertiketmutasi',['cabang'=>$cabang]);
    }
    public function caridatabarangmutasi($id,$ids)
    {
        $data = DB::table('sub_tbl_inventory')
        ->where('kd_cabang',auth::user()->cabang)
        ->where('nama_barang', 'like', '%' . $id . '%')->get();
        return view('divisi.mutasi.tablecarimutasi',['data'=>$data,'ids'=>$ids,'datax'=>$id ]);
    }
    public function posttambahdatamutasi(Request $request)
    {
        DB::table('tbl_mutasi')->insert(
            [
                'kd_mutasi' => 'mutasi-'.mt_rand(1000000, 99999999),
                'jenis_mutasi' => $request->jenis_mutasi,
                'kd_cabang' => auth::user()->cabang,
                'asal_mutasi' => $request->asal_cabang,
                'target_mutasi' => $request->tujuan_cabang,
                'departemen' => 0,
                'divisi' => 0,
                'penanggung_jawab' => $request->pj,
                'tanggal_buat' => $request->tgl_buat,
                'penerima' => $request->penerima,
                'menyetujui' => $request->menyetujui,
                'yang_menyerahkan' => $request->menyerahkan,
                'ket' => $request->deskripsi,
                'created_at' => date('Y-m-d H:i:s'),
            ]);
        return redirect()->back();
    }
    public function detaildatamutasi($id)
    {
        $data = DB::table('tbl_mutasi')->where('kd_mutasi',$id)->first();
        $datamutasi = DB::table('tbl_sub_mutasi')->where('kd_mutasi',$id)->get();
        return view('divisi.modal.detaildatamutasi',['data'=>$data,'datamutasi'=>$datamutasi]);
    }
    public function inserttablepencarian($ids,$id,$datax)
    {
        DB::table('tbl_sub_mutasi')->insert(
            [
                'kd_mutasi' => $ids,
                'id_inventaris' => $id,
                'kd_lokasi_awal' => '',
                'kd_lokasi_awal' => '',
                'kd_cabang_awal' => '',
                'kd_cabang_tujuan' => 0,
                'created_at' => date('Y-m-d H:i:s'),
            ]);
        $data = DB::table('sub_tbl_inventory')
        ->where('kd_cabang',auth::user()->cabang)
        ->where('nama_barang', 'like', '%' . $datax . '%')->get();
        return view('divisi.mutasi.tablecarimutasi',['data'=>$data,'ids'=>$ids,'datax'=>$datax ]);
    }
    public function datatablemutasi($id)
    {
        $data = DB::table('tbl_mutasi')->where('kd_mutasi',$id)->first();
        $datamutasi = DB::table('tbl_sub_mutasi')->where('kd_mutasi',$id)->get();
        return view('divisi.mutasi.tabledatamutasi',['data'=>$data,'datamutasi'=>$datamutasi]);
    }
    public function hapusdetaildatamutasi($id,$kode)
    {
        DB::table('tbl_sub_mutasi')->where('id_sub_mutasi', $id)->delete();
        $datamutasi = DB::table('tbl_sub_mutasi')->where('kd_mutasi',$kode)->get();
        return view('divisi.mutasi.tabledatamutasi',['datamutasi'=>$datamutasi]);
    }
    public function editdetailbarangmutasi($id)
    {
        $datamutasi = DB::table('tbl_sub_mutasi')
        ->join('sub_tbl_inventory','sub_tbl_inventory.id_inventaris','=','tbl_sub_mutasi.id_inventaris')
        ->where('id_sub_mutasi', $id)->first();
        return view('divisi.mutasi.formeditmutasi',['datamutasi'=>$datamutasi]);
    }
    // ASET

    public function formtambahdatamaintenance($id)
    {
        return view('divisi.aset.formmaintenance',['id'=>$id]);
    }
    public function tambahdatamaintance(Request $request)
    {
        // if ($request->input('link') == "") {
        //     $datagambar = "";
        // }else{
        //     $datagambar = 'public/databrg/new/'.$request->input('link');
        // }
        $nilai = $string = preg_replace("/[^0-9]/","",$request->hargamaintenance);
        DB::table('tbl_maintenance_aset')->insert(
            [
                        'kd_maintenance_aset' => 'M'. mt_rand(1000000000, 9999999999999),
                        'id_inventaris' => $request->id_inventaris,
                        'tgl_maintenance' => date('d-m-Y', strtotime($request->input('tgl_maintenance'))),
                        'suplier_maintenance' => $request->input('suplier'),
                        'harga_maintenance' => $nilai,
                        'file' => 'public/aset/maintenance/'.auth::user()->cabang.'/'.$request->input('id_inventaris').'/'.$request->input('link'),
                        'ket_maintenance' => $request->input('deskripsi'),


            ]
        );
        Session::flash('sukses','Berhasil Menambah data Maintenance');
        return redirect()->back();
    }
    public function updatedatamaintance(Request $request)
    {
        $nilai = $string = preg_replace("/[^0-9]/","",$request->hargamaintenance);
        if ($request->input('link') == "") {
            DB::table('tbl_maintenance_aset')
            ->where('kd_maintenance_aset',$request->input('kode'))
            ->update([
                    'tgl_maintenance' => date('d-m-Y', strtotime($request->input('tgl_maintenance'))),
                    'suplier_maintenance' => $request->input('suplier'),
                    'harga_maintenance' => $nilai,
                    'ket_maintenance' => $request->input('deskripsi'),
                    ]);
        } else {
            DB::table('tbl_maintenance_aset')
            ->where('kd_maintenance_aset',$request->input('kode'))
            ->update([
                    'tgl_maintenance' => date('d-m-Y', strtotime($request->input('tgl_maintenance'))),
                    'suplier_maintenance' => $request->input('suplier'),
                    'harga_maintenance' => $nilai,
                    'file' => 'public/aset/maintenance/'.auth::user()->cabang.'/'.$request->input('id_inventaris').'/'.$request->input('link'),
                    'ket_maintenance' => $request->input('deskripsi'),
                    ]);

        }
        Session::flash('sukses','Berhasil update data Maintenance');
        return redirect()->back();
    }
    public function detaildatamaintenance($id)
    {
        $data = DB::table('tbl_maintenance_aset')->where('kd_maintenance_aset',$id)->first();
        return view('divisi.aset.detaildatamaintenance',['data'=>$data,'id'=>$id]);
    }
    public function formtambahdatainvoiceaset($id)
    {
        return view('divisi.aset.forminvoiceaset',['id'=>$id]);
    }
    public function tambahdatainvoice(Request $request)
    {
        DB::table('tbl_invoice')->insert(
            [
                'kd_invoice' => 'INVOICE'. mt_rand(1000000000, 9999999999999),
                'id_inventaris' => $request->id_inventaris,
                'tgl_invoice' => date('d-m-Y', strtotime($request->input('tgl_maintenance'))),
                'status_invoice' => 1,
                'file_invoice' => 'public/aset/maintenance/'.auth::user()->cabang.'/'.$request->input('id_inventaris').'/'.$request->input('link'),
            ]
        );
        Session::flash('sukses','Berhasil update data Maintenance');
        return redirect()->back();
    }

    public function pilihdatadepresiasi($id)
    {
        $data = DB::table('tbl_depresiasi')->get();
        return view('divisi.aset.pilihoptiondepresiasi',['data'=>$data,'id'=>$id]);
    }
    public function tambahdatadepresiasiaset(Request $request)
    {
        DB::table('tbl_depresiasi_aset')->insert(
            [
                'kd_depresiasi' => $request->kd_depresiasi,
                'id_inventaris' => $request->id_inventaris,
            ]
        );
        Session::flash('sukses','Berhasil update data Maintenance');
        return redirect()->back();
    }



    public function masterstaff()
    {
        $data = DB::table('tbl_staff')->where('kd_cabang',auth::user()->cabang)->get();
        return view('divisi.menustaff',['data'=>$data]);
    }
    public function tambahdatastaffkaryawan()
    {
        return view('divisi.menustaff.tambahstaff');
    }
    public function posttambahdatastaff(Request $request)
    {
        DB::table('tbl_staff')->insert(
            [
                'nip' => $request->nip,
                'nama_staff' => $request->nama,
                'kd_cabang' => auth::user()->cabang,
                'status_staff' => 1,
            ]
        );
    Session::flash('sukses','Berhasil Membuat Staff : '.$request->nama);
    return redirect()->back();
    }
}
