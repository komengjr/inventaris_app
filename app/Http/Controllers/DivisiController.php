<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Imports\LogInventarisImport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
// use Exception;
class DivisiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function updatedatainventori(Request $request)
    {
        if ($request->link != "") {
            $gambar = 'public/databrg/sdm/'.$request->input('urut').'/'.$request->input('link');
        } else {
            $gambar = "";
        }

        $entitas = DB::table('tbl_entitas_cabang')
        ->join('tbl_cabang','tbl_cabang.kd_entitas_cabang','=','tbl_entitas_cabang.kd_entitas_cabang')
        ->join('tbl_setting_cabang','tbl_setting_cabang.kd_cabang','=','tbl_cabang.kd_cabang')
        ->where('tbl_setting_cabang.kd_cabang',Auth::user()->cabang)->first();
        $cekdata = DB::table('sub_tbl_inventory')->where('id_inventaris',$request->input('kode_kode'))->first();
        if ($cekdata->kd_lokasi != $request->input('kd_lokasi')) {
            $no_ruangan = DB::table('tbl_nomor_ruangan_cabang')->where('kd_lokasi',$request->input('kd_lokasi'))->where('kd_cabang',Auth::user()->cabang)->first();
            $nilai = preg_replace("/[^0-9]/","",$request->harga_perolehan);
            DB::table('sub_tbl_inventory')
            ->where('id_inventaris',$request->input('kode_kode'))
            ->update([
                        'no_inventaris' => $cekdata->no.'/'.$cekdata->kd_inventaris.'/'.$request->input('kd_lokasi').'/'.$entitas->simbol_entitas.'.'.$entitas->no_cabang.'/'.$cekdata->th_perolehan,
                        'nama_barang' => $request->input('nama_barang'),
                        'kd_lokasi' => $request->input('kd_lokasi'),
                        'th_perolehan' => $request->input('th_perolehan'),
                        'merk' => $request->input('merk'),
                        'no_seri' => $request->input('no_seri'),
                        'suplier' => $request->input('suplier'),
                        'type' => $request->input('type'),
                        'harga_perolehan' => $nilai,
                        'id_nomor_ruangan_cbaang' => $no_ruangan->id_nomor_ruangan_cbaang ,
                        'gambar' => $gambar
                    ]);
        } else {
            $nilai = preg_replace("/[^0-9]/","",$request->harga_perolehan);
            DB::table('sub_tbl_inventory')
            ->where('id_inventaris',$request->input('kode_kode'))
            ->update([
                        'nama_barang' => $request->input('nama_barang'),
                        'th_perolehan' => $request->input('th_perolehan'),
                        'merk' => $request->input('merk'),
                        'no_seri' => $request->input('no_seri'),
                        'suplier' => $request->input('suplier'),
                        'type' => $request->input('type'),
                        'harga_perolehan' => $nilai,
                        'gambar' => $gambar
                    ]);
        }

        // $data = DB::table('sub_tbl_inventory')
        // ->select('sub_tbl_inventory.*')
        // ->where('kd_lokasi',$request->input('kd_lokasi'))
        // ->where('kd_cabang',$request->input('kd_cabang'))
        // ->get();
        // $id = $request->input('kd_lokasi');
        // return view('admin.sub_barang1',['data'=>$data,'id'=>$id ]);
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
    public function lihatdatabarang1($id)
    {
        // dd($id);
        $data = DB::table('sub_tbl_inventory')
        ->select('sub_tbl_inventory.*')
        ->where('id_nomor_ruangan_cbaang',$id)
        ->where('kd_cabang',auth::user()->cabang)
        ->orderBy('id', 'DESC')
        ->get();
        // dd($id);
        return view('divisi.dashboard.listbarang',['data'=>$data,'id'=>$id ]);
    }

    public function menupemusnahan()
    {
        $datakategori = DB::table('no_urut_barang')->get();
        $data = DB::table('tbl_pemusnahan')
        ->join('sub_tbl_inventory','sub_tbl_inventory.id_inventaris','=','tbl_pemusnahan.id_inventaris')
        ->where('tbl_pemusnahan.kd_cabang',Auth::user()->cabang)->get();
        return view('divisi.menupemusnahan',[ 'datakategori' => $datakategori,'data'=>$data]);
    }
    public function verifdatainventaris()
    {
        $dataverif = DB::table('tbl_verifdatainventaris')->where('kd_cabang',auth::user()->cabang)
        ->orderBy('id_verifdatainventaris', 'desc')
        ->get();
        return view('divisi.verifdatainventaris',[ 'dataverif' => $dataverif]);
    }
    public function cetakreportstockopname($id)
    {
        $databrg = DB::table('tbl_sub_verifdatainventaris')
        ->join('sub_tbl_inventory','sub_tbl_inventory.id_inventaris','=','tbl_sub_verifdatainventaris.id_inventaris')
        ->where('tbl_sub_verifdatainventaris.kode_verif',$id)
        ->get();
        $data = DB::table('sub_tbl_inventory')
        ->select('sub_tbl_inventory.id_inventaris','sub_tbl_inventory.no_inventaris','sub_tbl_inventory.nama_barang','sub_tbl_inventory.merk','sub_tbl_inventory.type')
        ->where('sub_tbl_inventory.kd_cabang',Auth::user()->cabang)->get();
        $data_arr = array();
        foreach ($data as $record) {
            $cekdata = DB::table('tbl_sub_verifdatainventaris')->where('kode_verif',$id)->where('id_inventaris',$record->id_inventaris)->first();
            if ($cekdata) {

            } else {
                $data_arr[] = array(
                    // "id_inventaris" =>$record->id_inventaris,
                    "no_inventaris" =>$record->no_inventaris,
                    "nama_barang" =>$record->nama_barang,
                    "merk" =>$record->merk,
                    "type" =>$record->type,
                );
            }
        }
        $ttd = DB::table('tbl_ttd')->where('kd_cabang',auth::user()->cabang)->get();
        $dataverif = DB::table('tbl_verifdatainventaris')->where('kode_verif',$id)->get();
        $image = base64_encode(file_get_contents(public_path('icon.png')));
        $pdf = PDF::loadview('divisi.report.laporanstokopname',['databrg'=>$databrg, 'dataverif'=>$dataverif,'data_arr'=>$data_arr, 'ttd'=>$ttd],compact('image'))->setPaper('A4','potrait')->setOptions(['defaultFont' => 'Calibri']);
        $pdf->output();

        $dompdf = $pdf->getDomPDF();
        $font = $dompdf->getFontMetrics()->get_font("helvetica", "bold");
        $dompdf->get_canvas()->page_text(300, 820, "{PAGE_NUM} / {PAGE_COUNT}", $font, 10, array(0, 0, 0));
        return base64_encode($pdf->stream());
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
    public function divisipostpenyelesaianstockopname($id)
    {
        DB::table('tbl_verifdatainventaris')
        ->where('kode_verif',$id)
        ->where('kd_cabang',Auth::user()->cabang)
        ->update([
                    'status_verif' => 1,
                ]);
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
        ->where('sub_tbl_inventory.kd_cabang',auth::user()->cabang)->get();
        $databarang = DB::table('tbl_sub_peminjaman')->where('id_pinjam',$id)->get();
        return view('divisi.menulengkapi.inputdatabarangpinjam',['databrg'=>$databrg,'id'=>$id]);
    }
    public function pengembaliandatabarang($id)
    {
        $databrg = DB::table('sub_tbl_inventory')
        ->join('tbl_lokasi','tbl_lokasi.kd_lokasi','=','sub_tbl_inventory.kd_lokasi')
        ->where('sub_tbl_inventory.kd_cabang',auth::user()->cabang)->get();
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
    public function balikdatapeminjaman($id)
    {
        $cekidpinjam = DB::table('tbl_sub_peminjaman')->where('id_sub_peminjaman',$id)->first();
        DB::table('tbl_sub_peminjaman')
        ->where('id_sub_peminjaman',$id)
        ->update([
                    'tgl_kembali_barang' => date('Y-m-d H:i:s'),
                    'kondisi_kembali' => 'BAIK',
                    'status_sub_peminjaman' => 1,
                ]);
        $notif = 4;
        $databarang = DB::table('tbl_sub_peminjaman')->where('id_pinjam',$cekidpinjam->id_pinjam)->get();
        return view('divisi.menulengkapi.tablepeminjaman',['notif'=>$notif, 'databarang'=>$databarang]);
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
    // Maintenance
    public function tambahdatamaintenance()
    {
        return view('divisi.maintenance.tambahdata');
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
        return view('divisi.pemusnahan.tambahdata',['tiket' => $jadi]);
    }
    public function posttambahdatapemusnahan(Request $request)
    {
        DB::table('tbl_pemusnahan')->insert([
            'kd_pemusnahan'=>1312123,
            'id_inventaris'=>$request->id_inventaris,
            'kd_cabang'=>Auth::user()->cabang,
            'dasar_pengajuan'=>$request->dasar_pengajuan,
            'verifikasi'=>$request->verifikasi,
            'persetujuan'=>$request->persetujuan,
            'eksekusi'=>$request->eksekusi,
            'status_pemusnahan'=>1,
            'tgl_pemusnahan'=>date('Y-m-d'),
        ]);
        DB::table('sub_tbl_inventory')->where('id_inventaris',$request->id_inventaris)->update([
            'status_barang'=>5,
        ]);
        Session::flash('sukses','Berhasil Menambahkan Barang Pemusnahan');
        return redirect()->back();
    }
    public function caridatabarangpemusnahan($id)
    {
        $data = DB::table('sub_tbl_inventory')->where('nama_barang', 'like', '%' . $id . '%')->where('kd_cabang',Auth::user()->cabang)->get();
        return view('divisi.pemusnahan.daftarlistinventaris',['data'=>$data]);
    }
    public function pilihdatabarangpemusnahan($id)
    {
        $data = DB::table('sub_tbl_inventory')->where('id_inventaris',$id)->first();
        return view('divisi.pemusnahan.formpemusnahan',['data'=>$data]);
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
                'tahun' => "-",
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
        ->first();
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
        $inventory_log = DB::table('sub_tbl_inventory_log')->where('kd_cabang',auth::user()->cabang)->count();
        $inventory = DB::table('sub_tbl_inventory')->where('kd_cabang',auth::user()->cabang)->count();

        return view('divisi.masterbarang',[ 'inventory_log'=>$inventory_log, 'inventory'=>$inventory]);
    }
    public function masterbarangloginventaris()
    {
        return view('divisi.modal.masterbarangloginventaris');
    }
    public function cekerorloginventaris()
    {
        return view('divisi.modal.tableerorloginventory');
    }
    public function cekerorklasifikasiloginventaris()
    {
        return view('divisi.modal.tableerorklasifikasiloginventory');
    }
    public function simpandetailbarang()
    {
        $ceknomor = DB::table('tbl_setting_cabang')->where('kd_cabang',auth::user()->cabang)->first();

            if ($ceknomor) {
                Excel::import(new LogInventarisImport, request()->file('file'));
                Session::flash('sukses','Upload Data Sukses');
                return redirect()->back();
            } else {
                Session::flash('gagal','Nomor Cabang Belum di Isi');
                return redirect()->back();
            }


    }
    public function masterbarangeditloginventaris($id)
    {
        $data = DB::table('sub_tbl_inventory_log')->where('id',$id)->first();
        $klasifikasi = DB::table('tbl_inventory')->get();
        $lokasi = DB::table('tbl_lokasi')->get();
        return view('divisi.modal.editdataloginventaris',['data'=>$data,'klasifikasi'=>$klasifikasi,'lokasi'=>$lokasi]);
    }
    public function masterbarangeditloginventarisklasifikasi($id)
    {
        $data = DB::table('sub_tbl_inventory_log')->where('id',$id)->first();
        $klasifikasi = DB::table('tbl_inventory')->get();
        $lokasi = DB::table('tbl_lokasi')->get();
        return view('divisi.modal.editdataloginventarisklasifikasi',['data'=>$data,'klasifikasi'=>$klasifikasi,'lokasi'=>$lokasi]);
    }
    public function posteditdataloginventory(Request $request , $id)
    {
        DB::table('sub_tbl_inventory_log')
        ->where('id',$id)
        ->update([
                    'nama_barang' => $request->nama_barang,
                    'kd_inventaris' => $request->kd_inventaris,
                    'kd_lokasi' => $request->kd_lokasi,
                    'th_perolehan' => $request->th_perolehan,
                    'merk' => $request->merk,
                    'type' => $request->type,
                    'no_seri' => $request->seri,
                    'suplier' => $request->suplier,
                    'harga_perolehan' => $request->harga,

                ]);
        $data = DB::table('sub_tbl_inventory_log')->where('kd_cabang',auth::user()->cabang)->get();
        Session::flash('sukses','Upload Data Sukses');
        return view('divisi.modal.tabledataloginventory',['data'=>$data]);
    }
    public function downloaddataloginventory()
    {
        $entitas = DB::table('tbl_entitas_cabang')
        ->join('tbl_cabang','tbl_cabang.kd_entitas_cabang','=','tbl_entitas_cabang.kd_entitas_cabang')
        ->where('tbl_cabang.kd_cabang',Auth::user()->cabang)->first();
        if($entitas){
            $no = 0;
            $nomorcabang = DB::table('tbl_setting_cabang')->where('kd_cabang',Auth::user()->cabang)->first();

            $total = DB::table('sub_tbl_inventory')->where('kd_cabang',Auth::user()->cabang)->count();
            $datalog = DB::table('sub_tbl_inventory_log')
            ->orderBy('tgl_beli', 'ASC')
            ->where('kd_cabang',Auth::user()->cabang)
            ->get();
            // dd($datalog);
            foreach ($datalog as $value) {
                DB::table('sub_tbl_inventory')->insert(
                    [
                        'id_inventaris' => auth::user()->cabang."".auth::user()->cabang."".(100000+($total + $no++)),
                        'no_inventaris' => ($total + $no)."/".$value->kd_inventaris."/".$value->kd_lokasi."/".$entitas->simbol_entitas.".".$nomorcabang->no_cabang."/".$value->th_perolehan,
                        'nama_barang' => $value->nama_barang,
                        'kd_inventaris' => $value->kd_inventaris,
                        'kd_lokasi' => $value->kd_lokasi,
                        'kd_jenis' => $value->kd_jenis,
                        'kd_cabang' => auth::user()->cabang,
                        'th_perolehan' => $value->th_perolehan,
                        'tgl_beli' => $value->tgl_beli,
                        'merk' => $value->merk,
                        'type' => $value->type,
                        'no_seri' => $value->no_seri,
                        'suplier' => $value->suplier,
                        'status_barang' => 0,
                        'harga_perolehan' => $value->harga_perolehan,
                ]);
                DB::table('sub_tbl_inventory_log')->where('id', $value->id)->delete();
            }
            Session::flash('sukses','Upload Data Sukses');
        }
        return redirect()->back();
    }
    public function resetdataloginventory()
    {
        DB::table('sub_tbl_inventory_log')->where('kd_cabang', auth::user()->cabang)->delete();
        Session::flash('sukses','Berhasil Reset Data');
        return redirect()->back();
    }
    public function fixtanggaldataloginventory()
    {
        $data = DB::table('sub_tbl_inventory_log')
        ->where('kd_cabang', Auth::user()->cabang)
        ->where('tgl_beli', NULL)
        ->get();
        foreach ($data as $value) {
            DB::table('sub_tbl_inventory_log')
            ->where('id',$value->id)
            ->update([
                    'tgl_beli' => $value->th_perolehan.'-01-02',
                    ]);
        }
        Session::flash('sukses','Berhasil Fix Tanggal');
        return redirect()->back();
    }
    public function fixdatamasterbarang()
    {
        $cekjumlah = DB::table('sub_tbl_inventory')
        ->where('sub_tbl_inventory.kd_cabang',auth::user()->cabang)->get();
            foreach ($cekjumlah as $value) {
                $nourut = explode('/', trim($value->no_inventaris ))[0];
                if ($value->kd_jenis == NULL) {
                    DB::table('sub_tbl_inventory')
                    ->where('id_inventaris',$value->id_inventaris)
                    ->where('kd_cabang',auth::user()->cabang)
                    ->update([
                                'kd_jenis' => '0',
                                'no' =>  $nourut

                            ]);
                } else {
                    DB::table('sub_tbl_inventory')
                    ->where('id_inventaris',$value->id_inventaris)
                    ->where('kd_cabang',auth::user()->cabang)
                    ->update([
                                'no' =>  $nourut

                            ]);
                }
            }
        Session::flash('sukses','Berhasil Fix Tanggal');
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
        Session::flash('sukses','Berhasil Setup System');
        return redirect()->back();
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
    public function datadtableepresiasi()
    {
        $data = DB::table('tbl_depresiasi')->get();
        return view('divisi.aset.tabledatadepresiasi',['data'=>$data]);
    }
    public function penambahandatadepresiasi()
    {
        $data = DB::table('tbl_depresiasi')->get();
        return view('divisi.aset.penambahandatadepresiasi',['data'=>$data]);
    }
    public function postpenambahandatadepresiasi(Request $request)
    {
        Session::flash('sukses','Berhasil Membuat Masa Depresiasi');
        return redirect()->back();
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
        $jumlahdata = DB::table('sub_tbl_inventory')->where('kd_jenis',1)->where('kd_cabang',auth::user()->cabang)->count();
        $datakategori = DB::table('no_urut_barang')->get();
        $jumlahmasadepresiasi = DB::table('tbl_depresiasi')->count();
        return view('divisi.menudepresiasi',['datakategori' => $datakategori,'data'=>$data ,'jumlahdatadepresiasi'=>$jumlahmasadepresiasi,
                                            'jumlahdata'=>$jumlahdata
                                            ]);
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
        return view('divisi.mutasi.ordertiketmutasi',['cabang'=>$cabang]);
    }
    public function showdataordermutasi()
    {
        $cabang = DB::table('tbl_cabang')->get();
        $dataorder = DB::table('tbl_mutasi')->where('target_mutasi',Auth::user()->cabang)->where('tgl_terima',NULl)->get();
        return view('divisi.mutasi.ordermutasi',['cabang'=>$cabang,'data'=>$dataorder]);
    }
    public function lengkapidataordermutasi($id)
    {
        $cabang = DB::table('tbl_cabang')->get();
        $dataorder = DB::table('tbl_mutasi')->where('kd_mutasi',$id)->first();
        return view('divisi.mutasi.lengkapiordermutasi',['cabang'=>$cabang,'data'=>$dataorder]);
    }
    public function caridatabarangmutasi($id,$ids)
    {
        $data = DB::table('sub_tbl_inventory')
        ->where('kd_cabang',auth::user()->cabang)
        ->where('nama_barang', 'like', '%' . $id . '%')->get();
        return view('divisi.mutasi.tablecarimutasi',['data'=>$data,'ids'=>$ids,'datax'=>$id ]);
    }
    public function postpenerimadatamutasi(Request $request)
    {
        DB::table('tbl_mutasi')
        ->where('kd_mutasi',$request->kd_mutasi)
        ->update([
                    'penerima' => $request->penerima,
                    'tgl_terima' => $request->tgl_terima,
                    'ket_penerima' => $request->deskripsi_penerima,
                ]);
        Session::flash('sukses','Berhasil Menerima Order Mutasi');
        return redirect()->back();
    }
    public function posttambahdatamutasi(Request $request)
    {
        DB::table('tbl_mutasi')->insert(
            [
                'kd_mutasi' => 'mutasi-'.mt_rand(1000000, 99999999),
                'jenis_mutasi' => 1,
                'kd_cabang' => auth::user()->cabang,
                'asal_mutasi' => auth::user()->cabang,
                'target_mutasi' => $request->tujuan_cabang,
                'departemen' => 0,
                'divisi' => 0,
                'penanggung_jawab' => $request->pj,
                'tanggal_buat' => $request->tgl_buat,
                'menyetujui' => $request->menyetujui,
                'yang_menyerahkan' => $request->menyerahkan,
                'ket' => $request->deskripsi,
                'status_mutasi' => 0,
                'created_at' => date('Y-m-d H:i:s'),
            ]);
        Session::flash('sukses','Berhasil Membuat Order Mutasi');
        return redirect()->back();
    }
    public function detaildatamutasi($id)
    {
        $data = DB::table('tbl_mutasi')->where('kd_mutasi',$id)->first();
        $datamutasi = DB::table('tbl_sub_mutasi')->where('kd_mutasi',$id)->get();
        return view('divisi.mutasi.detaildatamutasi',['data'=>$data,'datamutasi'=>$datamutasi]);
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
    public function penyelesaianpostdatamutasi(Request $request)
    {
        DB::table('tbl_mutasi')
        ->where('kd_mutasi',$request->kd_mutasi)
        ->update([
                    'status_mutasi' => 1,
                ]);
        Session::flash('sukses','Berhasil Menyelesaikan Order Mutasi');
        return redirect()->back();
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
    public function detaildatainvoice($id)
    {
        $data = DB::table('tbl_maintenance_aset')->where('kd_maintenance_aset',$id)->first();
        return view('divisi.aset.detaildatainvoice',['data'=>$data,'id'=>$id]);
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
        $staff = DB::table('tbl_staff')->where('kd_cabang',Auth::user()->cabang)->count();
        return view('divisi.menustaff',['data'=>$data, 'staff'=>$staff]);
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

    // Master Lokasi
    public function masterlokasi()
    {
        $ruangan = DB::table('tbl_nomor_ruangan_cabang')
        ->join('tbl_lokasi','tbl_lokasi.kd_lokasi','=','tbl_nomor_ruangan_cabang.kd_lokasi')
        ->where('tbl_nomor_ruangan_cabang.kd_cabang',auth::user()->cabang)->get();
        return view('divisi.menulokasi',['ruangan'=>$ruangan]);
    }
    public function formtambahnomoruangan()
    {
        $lokasi = DB::table('tbl_lokasi')->get();
        return view('divisi.lokasi.formtambah',['lokasi'=>$lokasi]);
    }
    public function masterlihatdatalokasi()
    {
        $lokasi = DB::table('tbl_lokasi')->get();
        return view('divisi.lokasi.mastertablelokasi',['lokasi'=>$lokasi]);
    }
    public function masterlihatdatalokasicabang()
    {
        $lokasi = DB::table('sub_tbl_inventory')
        ->select('tbl_lokasi.*')
        ->where('sub_tbl_inventory.kd_cabang',Auth::user()->cabang)
        ->join('tbl_lokasi','tbl_lokasi.kd_lokasi','=','sub_tbl_inventory.kd_lokasi')
        ->distinct()->get(['sub_tbl_inventory.kd_lokasi']);
        return view('divisi.lokasi.mastertablelokasicabang',['lokasi'=>$lokasi]);
    }
    public function datasetuplokasiruangan($id)
    {
        $cekruangan = DB::table('tbl_nomor_ruangan_cabang')->where('id_nomor_ruangan_cbaang',$id)->first();
        $datainventaris = DB::table('sub_tbl_inventory')
        ->where('kd_lokasi',$cekruangan->kd_lokasi)
        ->where('kd_cabang',auth::user()->cabang)
        ->where('id_nomor_ruangan_cbaang','=',NULL)
        ->get();
        $lokasi = DB::table('tbl_lokasi')->get();
        return view('divisi.lokasi.setupdataruangan',['lokasi'=>$lokasi,'datainventaris'=>$datainventaris,'id'=>$id,'no'=>$cekruangan]);
    }
    public function posttambahdatanomorruangan(Request $request)
    {
        $cekdata = DB::table('tbl_nomor_ruangan_cabang')
        ->where('nomor_ruangan',$request->nomor_ruangan)
        ->where('kd_cabang',auth::user()->cabang)->first();
        if ($cekdata) {
            Session::flash('gagal','Nomor Ruangan Sudah ada');
            return redirect()->back();
        } else {
            DB::table('tbl_nomor_ruangan_cabang')->insert(
                [
                    'nomor_ruangan' => $request->nomor_ruangan,
                    'kd_lokasi' => $request->kd_lokasi,
                    'kd_cabang' => auth::user()->cabang,
                    'status_nomor_ruangan' => 1,
                ]
            );
            Session::flash('sukses','Berhasil Membuat Nomor Ruangan');
            return redirect()->back();
        }


    }
    public function deletemasterlokasicabang($id)
    {
        DB::table('tbl_nomor_ruangan_cabang')->where('kd_cabang',Auth::user()->cabang)->where('id_nomor_ruangan_cbaang',$id)->delete();
        Session::flash('sukses','Berhasil Membuat Nomor Ruangan');
        return redirect()->back();
    }
    public function inputdatamasterlokasibarang($no,$id)
    {
        DB::table('sub_tbl_inventory')
        ->where('id_inventaris',$id)
        ->update([
                    'id_nomor_ruangan_cbaang' => $no,

                ]);
        $cekruangan = DB::table('tbl_nomor_ruangan_cabang')->where('id_nomor_ruangan_cbaang',$no)->first();
        $datainventaris = DB::table('sub_tbl_inventory')
        ->where('kd_lokasi',$cekruangan->kd_lokasi)
        ->where('kd_cabang',auth::user()->cabang)
        ->where('id_nomor_ruangan_cbaang','=',NULL)
        ->get();
        $lokasi = DB::table('tbl_lokasi')->get();
        return view('divisi.lokasi.tablelokasibarang',['lokasi'=>$lokasi,'datainventaris'=>$datainventaris,'id'=>$id,'no'=>$cekruangan,'nomor'=>$no]);
    }
    public function postdatasetuplokasiruangan(Request $request)
    {
        $data = DB::table('sub_tbl_inventory')->where('kd_lokasi',$request->kd_lokasi)->where('kd_cabang',Auth::user()->cabang)->get();
        foreach ($data as $data) {
            DB::table('sub_tbl_inventory')
            ->where('id_inventaris',$data->id_inventaris)
            ->update([
                    'id_nomor_ruangan_cbaang' => $request->no_ruangan,
                ]);
        }
        Session::flash('sukses','Berhasil Membuat Tiket Case');
        return redirect()->back();
    }
    public function resetdatamasterlokasibarang($no,$id)
    {
        DB::table('sub_tbl_inventory')
        ->where('id_inventaris',$id)
        ->update([
                    'id_nomor_ruangan_cbaang' => NULL,

                ]);
        $cekruangan = DB::table('tbl_nomor_ruangan_cabang')->where('id_nomor_ruangan_cbaang',$no)->first();
        $datainventaris = DB::table('sub_tbl_inventory')
        ->where('kd_cabang',auth::user()->cabang)
        ->where('id_nomor_ruangan_cbaang',$no)
        ->get();
        $lokasi = DB::table('tbl_lokasi')->get();
        return view('divisi.lokasi.tablemastersublokasibarang',['lokasi'=>$lokasi,'datainventaris'=>$datainventaris,'id'=>$id,'no'=>$cekruangan]);
    }
    public function tabledatamasterlokasibarang($id)
    {

        $cekruangan = DB::table('tbl_nomor_ruangan_cabang')->where('id_nomor_ruangan_cbaang',$id)->first();
        $datainventaris = DB::table('sub_tbl_inventory')
        ->where('kd_cabang',auth::user()->cabang)
        ->where('id_nomor_ruangan_cbaang',$id)
        ->get();
        return view('divisi.lokasi.tablemasterlokasibarang',['datainventaris'=>$datainventaris,'no'=>$cekruangan]);
    }



    // CASE
    public function faq()
    {
        $data = DB::table('tbl_case')->where('kd_cabang',Auth::user()->cabang)->get();
        return view('faq',['data'=>$data]);
    }
    public function tambahdatacase()
    {
        return view('faq.formtambah');
    }
    public function casedatalokasi()
    {
        $data = DB::table('tbl_lokasi')->orderBy('kd_lokasi', 'ASC')->get();
        return view('faq.datalokasi',['data'=>$data]);
    }
    public function casedataklasifikasi()
    {
        $data=DB::table('no_urut_barang')->get();
        return view('faq.dataklasifikasi',['data'=>$data]);
    }
    public function posttambahdatacase(Request $request)
    {
        DB::table('tbl_case')->insert([
            'tiket_case'=> 'case-'.date('Y-m-d').'-'.Str::random(4),
            'judul_case'=> $request->input('judul'),
            'keterangan_case'=> $request->input('ket'),
            'deskripsi_case'=> $request->input('desk'),
            'kd_cabang'=> Auth::user()->cabang,
            'status_case'=> 0,
            'created_at'=> date('Y-m-d H:i:s'),
        ]);
        Session::flash('sukses','Berhasil Membuat Tiket Case');
            return redirect()->back();
    }
    public function detaildatacaseid($id)
    {
        $data = DB::table('tbl_case')->where('tiket_case',$id)->first();
        return view('faq.detailcase',['data'=>$data]);
    }
}
