<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Contracts\Foundation\Application;
// use Illuminate\Contracts\View\Factory;
// use Illuminate\Contracts\View\View;
// use Illuminate\Support\Facades\Storage;
// use Pion\Laravel\ChunkUpload\Handler\HandlerFactory;
// use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;
use DB;
// use File;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Jenssegers\Agent\Facades\Agent;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        if (auth::user()->akses == 'admin') {
            $datacabang = DB::table('tbl_cabang')->get();
            $seluruhbarang = DB::table('sub_tbl_inventory')->count();
            $totalhargainventaris = DB::table('sub_tbl_inventory')->where('kd_jenis',0)->sum('harga_perolehan');
            $totalhargaaset = DB::table('sub_tbl_inventory')->where('kd_jenis',1)->sum('harga_perolehan');
            $totalbrgkso = DB::table('sub_tbl_inventory_kso')->where('kd_cabang',Auth::user()->cabang)->count();
            return view('home',['datacabang'=>$datacabang, 'seluruhbarang'=>$seluruhbarang,'totalhargainventaris'=>$totalhargainventaris,'totalhargaaset'=>$totalhargaaset,'totalbrgkso'=>$totalbrgkso]);
        } else {

            $jumlah = 0;
            $totaljumlahaset = 0;
            $totaljumlahinventaris = 0;
            $totalbrgkso = DB::table('sub_tbl_inventory_kso')->where('kd_cabang',Auth::user()->cabang)->count();
            $totaldocument = DB::table('sub_tbl_inventory_kso')->join('document_kso','document_kso.id_inventaris','=','sub_tbl_inventory_kso.id_inventaris')->where('sub_tbl_inventory_kso.kd_cabang',Auth::user()->cabang)->count();
            $totalharga = DB::table('sub_tbl_inventory')
            ->select('sub_tbl_inventory.*')
            ->where('kd_cabang', auth::user()->cabang)
            ->where('kd_jenis',1)
            ->where('status_barang','<',4)
            ->get();
            foreach ($totalharga as $totalharga) {
                $totaljumlahaset = $totalharga->harga_perolehan + $totaljumlahaset;
            }
            $totalhargainventaris = DB::table('sub_tbl_inventory')
            ->select('sub_tbl_inventory.*')
            ->where('kd_cabang', auth::user()->cabang)
            ->where('kd_jenis',0)
            ->get();
            foreach ($totalhargainventaris as $totalhargainventaris) {
                $totaljumlahinventaris = $totalhargainventaris->harga_perolehan + $totaljumlahinventaris;
            }

            $datakategori = DB::table('no_urut_barang')
            ->select('no_urut_barang.*')
            ->get();

            if ($jumlah == 0) {
                $jumlah = 1 ;
            }

            $ruangan = DB::table('tbl_nomor_ruangan_cabang')
            ->join('tbl_lokasi','tbl_lokasi.kd_lokasi','=','tbl_nomor_ruangan_cabang.kd_lokasi')
            ->where('tbl_nomor_ruangan_cabang.kd_cabang',Auth::user()->cabang)->orderBy('tbl_nomor_ruangan_cabang.nomor_ruangan')->get();
            // dd($ruangan);
            $datainventariscabang = DB::table('sub_tbl_inventory')->where('kd_jenis',0)->where('kd_cabang',auth::user()->cabang)->count();
            if ($datainventariscabang == 0) {
                $datainventariscabang = 0;
            }
            $dataasetcabang = DB::table('sub_tbl_inventory')->where('kd_jenis',1)->where('status_barang','<',4)->where('kd_cabang',auth::user()->cabang)->count();

            return view('home',[
                'datakategori'=>$datakategori,'ruangan'=>$ruangan,
                'totalinventaris'=>$datainventariscabang,'totaljumlahaset'=>$totaljumlahaset,
                'dataasetcabang'=>$dataasetcabang, 'totaljumlahinventaris'=>$totaljumlahinventaris,'totalbrgkso'=>$totalbrgkso,'totaldocument'=> $totaldocument
            ]);
        }


    }
    public function lihatdatabarang($id)
    {
        $data = DB::table('sub_tbl_inventory')
        ->select('sub_tbl_inventory.*')
        ->where('kd_inventaris',$id)
        ->where('kd_cabang',auth::user()->cabang)
        ->get();
        // dd($id);
        return view('admin.sub_barang',['data'=>$data,'id'=>$id ]);
    }
    public function lihatdatabarang1($id)
    {
        // dd($id);
        $data = DB::table('sub_tbl_inventory')
        ->select('sub_tbl_inventory.*')
        ->where('kd_lokasi',$id)
        ->where('kd_cabang',auth::user()->cabang)
        ->orderBy('id', 'DESC')
        ->get();
        // dd($id);
        return view('admin.sub_barang1',['data'=>$data,'id'=>$id ]);
    }
    public function editdatabarang($id)
    {
        $data = DB::table('sub_tbl_inventory')
        ->select('sub_tbl_inventory.*')
        ->where('id',$id)
        ->get();
        $datalokasi = DB::table('tbl_lokasi')
        ->select('tbl_lokasi.*')
        ->get();
        $kode = DB::table('tbl_inventory')
        ->select('tbl_inventory.*')
        ->get();
        // dd($id);
        return view('admin.editbarang',[ 'data'=>$data, 'datalokasi'=>$datalokasi, 'kode'=>$kode, 'id'=>$id]);
    }
    public function editdatabarang1($id)
    {
        $data = DB::table('sub_tbl_inventory')
        ->select('sub_tbl_inventory.*')
        ->where('id',$id)
        ->first();
        $datalokasi = DB::table('tbl_lokasi')
        ->select('tbl_lokasi.*')
        ->get();
        $kode = DB::table('tbl_inventory')
        ->select('tbl_inventory.*')
        ->get();
        return view('divisi.editdatabarang',[ 'data'=>$data, 'datalokasi'=>$datalokasi, 'kode'=>$kode, 'id'=>$id]);
    }
    public function hapusdatabarang($kode , $id)
    {
        DB::table('sub_tbl_inventory')->where('id', $id)->delete();
        $data = DB::table('sub_tbl_inventory')
        ->select('sub_tbl_inventory.*')
        ->where('kd_inventaris',$kode)
        ->where('kd_cabang',auth::user()->cabang)
        ->get();
        // dd($id);
        return view('admin.sub_barang',['id'=>$kode,'data'=>$data]);
    }
    public function tambahdatabarang($id)
    {
        $datalokasi = DB::table('tbl_lokasi')
        ->select('tbl_lokasi.*')
        ->get();
        $kode = DB::table('tbl_inventory')
        ->select('tbl_inventory.*')
        ->get();
        // dd($id);
        return view('admin.tambahbarang',['id'=>$id,'datalokasi'=>$datalokasi,'kode'=>$kode]);
    }

    public function updatedatabarang(Request $request , $id)
    {
        // dd($request->all());

        if ($request->input('link') != "") {
            DB::table('sub_tbl_inventory')
            ->where('id',$request->input('kode_kode'))
            ->update([
                        'nama_barang' => $request->input('nama_barang'),
                        'gambar' => 'public/databrg/'.auth::user()->cabang.'/'.$request->input('kode_kode').'/'.$request->input('link'),
                        'kd_inventaris' => $request->input('kd_inventaris'),
                        'kd_lokasi' => $request->input('kd_lokasi'),
                        'kd_cabang' => $request->input('kd_cabang'),
                        'th_pembuatan' => $request->input('th_pembuatan'),
                        'outlet' => $request->input('outlet'),
                        'th_perolehan' => $request->input('th_perolehan'),
                        'merk' => $request->input('merk'),
                        'no_seri' => $request->input('no_seri'),
                        'suplier' => $request->input('suplier'),
                        'type' => $request->input('type'),
                        'harga_perolehan' => $request->input('harga_perolehan'),
                        'tgl_mutasi' => $request->input('tgl_mutasi'),
                        'tujuan_mutasi' => $request->input('tujuan_mutasi'),
                        'nilai_buku' => $request->input('nilai_buku'),
                        'tgl_musnah' => $request->input('tgl_musnah'),
                        'kondisi_barang' => $request->input('kondisi_barang'),
                        'jam_input' => $request->input('jam_input'),
                        'ket_musnah' => $request->input('ket_musnah'),
                    ]);
        } else {
            DB::table('sub_tbl_inventory')
            ->where('id',$request->input('kode_kode'))
            ->update([
                        'nama_barang' => $request->input('nama_barang'),
                        'kd_inventaris' => $request->input('kd_inventaris'),
                        'kd_lokasi' => $request->input('kd_lokasi'),
                        'kd_cabang' => $request->input('kd_cabang'),
                        'th_pembuatan' => $request->input('th_pembuatan'),
                        'outlet' => $request->input('outlet'),
                        'th_perolehan' => $request->input('th_perolehan'),
                        'merk' => $request->input('merk'),
                        'no_seri' => $request->input('no_seri'),
                        'suplier' => $request->input('suplier'),
                        'harga_perolehan' => $request->input('harga_perolehan'),
                        'tgl_mutasi' => $request->input('tgl_mutasi'),
                        'type' => $request->input('type'),
                        'tujuan_mutasi' => $request->input('tujuan_mutasi'),
                        'nilai_buku' => $request->input('nilai_buku'),
                        'tgl_musnah' => $request->input('tgl_musnah'),
                        'kondisi_barang' => $request->input('kondisi_barang'),
                        'jam_input' => $request->input('jam_input'),
                        'ket_musnah' => $request->input('ket_musnah'),


                    ]);
        }
        $data = DB::table('sub_tbl_inventory')
        ->select('sub_tbl_inventory.*')
        ->where('kd_inventaris',$request->input('kd_inventaris'))
        ->where('kd_cabang',auth::user()->cabang)
        ->get();

        // dd($id);
        return view('admin.sub_barang', ['data'=>$data ,'id'=>$id])->with('status', 'thank you');
        // return view('admin.sub_barang',['data'=>$data,'status' => 'Berhasil Mendaftar ' ])->with(['status' => 'Berhasil Mendaftar']);
        // return redirect('admin.sub_barang',['data'=>$data ])->back()->with(['status' => 'Berhasil Mendaftar , selanjut nya untuk konfirmasi pembayaran ke tahap selanjutnya']);
    }
    public function updatedatabarang1(Request $request , $id)
    {
        // dd($request->all());

        // if ($request->input('link') != "") {
        //     DB::table('sub_tbl_inventory')
        //     ->where('id',$request->input('kode_kode'))
        //     ->update([
        //                 'nama_barang' => $request->input('nama_barang'),
        //                 'gambar' => 'public/databrg/'.auth::user()->cabang.'/'.$request->input('kode_kode').'/'.$request->input('link'),
        //                 // 'kd_inventaris' => $request->input('kd_inventaris'),
        //                 // 'kd_lokasi' => $request->input('kd_lokasi'),
        //                 // 'kd_cabang' => $request->input('kd_cabang'),
        //                 'th_pembuatan' => $request->input('th_pembuatan'),
        //                 'outlet' => $request->input('outlet'),
        //                 'th_perolehan' => $request->input('th_perolehan'),
        //                 'merk' => $request->input('merk'),
        //                 'no_seri' => $request->input('no_seri'),
        //                 'suplier' => $request->input('suplier'),
        //                 'type' => $request->input('type'),
        //                 'harga_perolehan' => $request->input('harga_perolehan'),
        //                 // 'tgl_mutasi' => $request->input('tgl_mutasi'),
        //                 // 'tujuan_mutasi' => $request->input('tujuan_mutasi'),
        //                 // 'nilai_buku' => $request->input('nilai_buku'),
        //                 // 'tgl_musnah' => $request->input('tgl_musnah'),
        //                 // 'kondisi_barang' => $request->input('kondisi_barang'),
        //                 // 'jam_input' => $request->input('jam_input'),
        //                 'ket_musnah' => $request->input('ket_musnah'),
        //             ]);
        // } else {
        //     DB::table('sub_tbl_inventory')
        //     ->where('id',$request->input('kode_kode'))
        //     ->update([
        //                 'nama_barang' => $request->input('nama_barang'),
        //                 // 'kd_inventaris' => $request->input('kd_inventaris'),
        //                 // 'kd_lokasi' => $request->input('kd_lokasi'),
        //                 // 'kd_cabang' => $request->input('kd_cabang'),
        //                 'th_pembuatan' => $request->input('th_pembuatan'),
        //                 'outlet' => $request->input('outlet'),
        //                 'th_perolehan' => $request->input('th_perolehan'),
        //                 'merk' => $request->input('merk'),
        //                 'no_seri' => $request->input('no_seri'),
        //                 'suplier' => $request->input('suplier'),
        //                 'type' => $request->input('type'),
        //                 'harga_perolehan' => $request->input('harga_perolehan'),
        //                 // 'tgl_mutasi' => $request->input('tgl_mutasi'),
        //                 // 'tujuan_mutasi' => $request->input('tujuan_mutasi'),
        //                 // 'nilai_buku' => $request->input('nilai_buku'),
        //                 // 'tgl_musnah' => $request->input('tgl_musnah'),
        //                 // 'kondisi_barang' => $request->input('kondisi_barang'),
        //                 // 'jam_input' => $request->input('jam_input'),
        //                 'ket_musnah' => $request->input('ket_musnah'),

        //             ]);
        // }
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
        ->where('kd_cabang',auth::user()->cabang)
        ->get();

        // dd($id);
        return view('admin.sub_barang1', ['data'=>$data ,'id'=>$id])->with('status', 'thank you');
        // return view('admin.sub_barang',['data'=>$data,'status' => 'Berhasil Mendaftar ' ])->with(['status' => 'Berhasil Mendaftar']);
        // return redirect('admin.sub_barang',['data'=>$data ])->back()->with(['status' => 'Berhasil Mendaftar , selanjut nya untuk konfirmasi pembayaran ke tahap selanjutnya']);
    }

    public function simpandatasubbarang(Request $request , $id)
    {

        DB::table('sub_tbl_inventory')->insert(
            [
                        'nama_barang' => $request->input('nama_barang'),
                        'gambar' => 'public/databrg/new/'.$request->input('link'),
                        'kd_inventaris' => $request->input('kd_inventaris'),
                        'kd_lokasi' => $request->input('kd_lokasi'),
                        'kd_cabang' => $request->input('kd_cabang'),
                        'th_pembuatan' => $request->input('th_pembuatan'),
                        'outlet' => $request->input('outlet'),
                        'th_perolehan' => $request->input('th_perolehan'),
                        'merk' => $request->input('merk'),
                        'no_seri' => $request->input('no_seri'),
                        'suplier' => $request->input('suplier'),
                        'harga_perolehan' => $request->input('harga_perolehan'),
                        'tgl_mutasi' => $request->input('tgl_mutasi'),
                        'tujuan_mutasi' => $request->input('tujuan_mutasi'),
                        'nilai_buku' => $request->input('nilai_buku'),
                        'tgl_musnah' => $request->input('tgl_musnah'),
                        'kondisi_barang' => $request->input('kondisi_barang'),
                        'jam_input' => $request->input('jam_input'),
                        'ket_musnah' => $request->input('ket_musnah'),
            ]
        );
        $data = DB::table('sub_tbl_inventory')
        ->select('sub_tbl_inventory.*')
        ->where('kd_inventaris',$id)
        ->where('kd_cabang',auth::user()->cabang)
        ->get();
        // dd($data);
        return view('admin.sub_barang',['id'=>$id,'data'=>$data])->with('status', 'thank you');
    }
    public function simpandatasubbarang1(Request $request , $id)
    {
        if ($request->input('link') == "") {
            $datagambar = "";
        }else{
            $datagambar = 'public/databrg/new/'.$request->input('link');
        }
        DB::table('sub_tbl_inventory')->insert(
            [
                        'id_inventaris' => auth::user()->cabang.'-'. mt_rand(100, 9999),
                        'nama_barang' => $request->input('nama_barang'),
                        'gambar' => $datagambar,
                        'kd_jenis' => 0,
                        'kd_inventaris' => $request->input('kd_inventaris'),
                        'kd_lokasi' => $request->input('kd_lokasi'),
                        'kd_cabang' => auth::user()->cabang,
                        'th_perolehan' => $request->input('th_perolehan'),
                        'merk' => $request->input('merk'),
                        'no_seri' => $request->input('no_seri'),
                        'suplier' => $request->input('suplier'),
                        'harga_perolehan' => $request->input('harga_perolehan'),
                        'kondisi_barang' => $request->input('kondisi_barang'),
                        'jam_input' => $request->input('jam_input'),

            ]
        );
        $data = DB::table('sub_tbl_inventory')
        ->select('sub_tbl_inventory.*')
        ->where('kd_lokasi',$request->input('kd_lokasi'))
        ->where('kd_cabang',auth::user()->cabang)
        ->get();
        // dd($data);
        return view('admin.sub_barang1',['id'=>$id,'data'=>$data])->with('status', 'thank you');
    }


    public function mutasidatabarang($id)
    {

        $data = DB::table('sub_tbl_inventory')
        ->select('sub_tbl_inventory.*')
        ->where('id',$id)
        ->where('kd_cabang',auth::user()->cabang)
        ->get();
        return view('admin.formmutasi',['data'=>$data,'id'=>$id ]);
    }

    public function formdataaset()
    {
        $dataaset = DB::table('sub_tbl_inventory')
        ->where('kd_cabang',auth::user()->cabang)
        ->where('kd_jenis',1)
        ->where('status_barang','<',4)
        ->get();

        return view('admin.formdataaset',[
            'dataaset'=> $dataaset,

        ]);
    }


    public function tambahdatainventaris()
    {
        $kode = DB::table('tbl_inventory')->get();
        $lokasi = DB::table('tbl_lokasi')->get();
        $ruangan = DB::table('tbl_nomor_ruangan_cabang')
        ->join('tbl_lokasi','tbl_lokasi.kd_lokasi','=','tbl_nomor_ruangan_cabang.kd_lokasi')
        ->where('tbl_nomor_ruangan_cabang.kd_cabang',auth::user()->cabang)
        ->get();
        return view('divisi.tambahbaranginventaris',['kode'=>$kode,'lokasi'=>$lokasi,'ruangan'=>$ruangan]);
    }
    public function simpandatainventaris(Request $request)
    {
        $cekruangan = DB::table('tbl_nomor_ruangan_cabang')->where('id_nomor_ruangan_cbaang',$request->input('no_ruangan'))->first();
        if ($request->input('link') == "") {
            $gambar = '';
        } else {
            $gambar = 'public/databrg/new/'.auth::user()->cabang.'/'.$request->input('link');
        }
        $jumlahbarang = DB::table('sub_tbl_inventory')->where('kd_cabang',auth::user()->cabang)->count();
        $nomor = DB::table('tbl_setting_cabang')->where('kd_cabang',auth::user()->cabang)->first();
        $tahun = date('Y', strtotime($request->input('tgl_beli')));
        $nilai = preg_replace("/[^0-9]/","",$request->harga_perolehan);
        $entitas = DB::table('tbl_entitas_cabang')
        ->join('tbl_cabang','tbl_cabang.kd_entitas_cabang','=','tbl_entitas_cabang.kd_entitas_cabang')
        ->where('tbl_cabang.kd_cabang',Auth::user()->cabang)->first();
        if ($entitas) {
            DB::table('sub_tbl_inventory')->insert(
                [
                            'id_inventaris' => auth::user()->cabang.''.mt_rand(100000, 9999999),
                            'no_inventaris' => ($jumlahbarang+1).'/'.$request->input('kd_inventaris').'/'.$cekruangan->kd_lokasi.'/'.$entitas->simbol_entitas.".".$nomor->no_cabang.'/'.$tahun,
                            'nama_barang' => $request->input('nama_barang'),
                            'gambar' => $gambar,
                            'kd_inventaris' => $request->input('kd_inventaris'),
                            'kd_lokasi' => $cekruangan->kd_lokasi,
                            'id_nomor_ruangan_cbaang' => $request->input('no_ruangan'),
                            'kd_cabang' => auth::user()->cabang,
                            'th_perolehan' => $tahun,
                            'tgl_beli' => $request->input('tgl_beli'),
                            'merk' => $request->input('merk'),
                            'type' => $request->input('type'),
                            'no_seri' => $request->input('no_seri'),
                            'suplier' => $request->input('suplier'),
                            'kd_jenis' => $request->input('kategori'),
                            'harga_perolehan' => $nilai,
                            'kondisi_barang' => 'BAIK',
                            'status_barang' => 0,
                            'no' => ($jumlahbarang+1),
                            'jam_input' => date("h:i:sa"),
                ]
            );
            Session::flash('sukses','Berhasil Input Data Barang Baru');
            return redirect()->back();
        }else{
            Session::flash('gagal','Entitas Cabang Masih Kosong');
            return redirect()->back();
        }

    }

}
