<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Storage;
use Pion\Laravel\ChunkUpload\Handler\HandlerFactory;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;
use DB;
use File;
use App\Imports\ImportSubBrg;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use Session;
class MasterController extends Controller
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
            $data = DB::table('tbl_cabang')
            ->select('tbl_cabang.*')
            ->get();
            return view('masteradmin.index',['data'=>$data]);
        } else {
            # code...
        }


    }
    public function masteradmindetail()
    {
        if (auth::user()->akses == 'admin') {
            $data = DB::table('tbl_cabang')
            ->select('tbl_cabang.*')
            ->get();
            return view('masteradmin.datacabang',['data'=>$data]);
        } else {
            # code...
        }


    }
    public function masterlogactifity()
    {
        if (auth::user()->akses == 'admin') {
            $data = DB::table('z_log_kunjungan')
            ->select('z_log_kunjungan.*','tbl_cabang.nama_cabang')
            ->join('tbl_cabang','tbl_cabang.kd_cabang','=','z_log_kunjungan.cabang')
            ->orderBy('id_ip_public','DESC')
            ->get();
            return view('masteradmin.viewlogaktifitas',['data'=>$data]);
        } else {
            # code...
        }
    }
    public function findmymasterlogactifity($id)
    {
            $userIp = $id;
            $locationData = \Location::get($userIp);
            return view('masteradmin.log.ipscan',['data'=>$locationData]);
            // dd($locationData);
    }
    public function datacabang()
    {
        return view('masteradmin.form.modal.cabang');
    }
    public function simpandatacabang(Request $request)
    {

        DB::table('tbl_cabang')->insert(
            [
                'kd_cabang' => $request->input('kd_cabang'),
                'nama_cabang' => $request->input('nama_cabang'),
                'city' => $request->input('city'),
                'alamat' => $request->input('alamat'),
                'phone' => $request->input('phone'),
                'created_at' => date('Y-m-d H:i:s'),
            ]);

        return redirect()->back();
    }
    public function deletedatacabang(Request $request)
    {

        DB::table('tbl_cabang')->where('kd_cabang', $request->input('kd_cabang3'))->delete();
        return redirect()->back();
    }
    public function masterdatalokasi()
    {
        $data =  DB::table('tbl_lokasi')
        ->select('tbl_lokasi.*')
        ->get();
        return view('masteradmin.form.modal.lokasi',['data'=>$data]);
    }
    public function mastertambahdatalokasi()
    {
        $data =  DB::table('tbl_lokasi')
        ->select('tbl_lokasi.*')
        ->get();
        return view('masteradmin.form.modal.tambahlokasi');
    }
    public function mastereditdatalokasi($id)
    {
        $data =  DB::table('tbl_lokasi')
        ->select('tbl_lokasi.*')
        ->where('kd_lokasi',$id)
        ->get();
        return view('masteradmin.form.modal.editlokasi',['data'=>$data]);
    }
    public function tambahlokasibaru(Request $request)
    {
        DB::table('tbl_lokasi')->insert(
            [
                'kd_lokasi' => $request->input('kd_lokasi'),
                'nama_lokasi' => $request->input('nama_lokasi'),
                'created_at' => date('Y-m-d H:i:s'),
            ]);
        $data =  DB::table('tbl_lokasi')
        ->select('tbl_lokasi.*')
        ->get();
        return view('masteradmin.form.modal.tbl_lokasi',['data'=>$data]);
    }
    public function updatelokasibaru(Request $request)
    {
        DB::table('tbl_lokasi')
            ->where('kd_lokasi',$request->input('kd_lokasi'))
            ->update([
                        'nama_lokasi' => $request->input('nama_lokasi'),
                    ]);
        $data =  DB::table('tbl_lokasi')
        ->select('tbl_lokasi.*')
        ->get();
        return view('masteradmin.form.modal.tbl_lokasi',['data'=>$data]);
    }
    public function deletelokasibaru(Request $request)
    {
        DB::table('tbl_lokasi')->where('kd_lokasi', $request->input('kd_lokasi'))->delete();
        $data =  DB::table('tbl_lokasi')
        ->select('tbl_lokasi.*')
        ->get();
        return view('masteradmin.form.modal.tbl_lokasi',['data'=>$data]);
    }

    public function dataklasifikasi()
    {
        $data =  DB::table('tbl_inventory')
        ->select('tbl_inventory.*')
        ->get();
        return view('masteradmin.form.modal.klasifikasi',['data'=>$data]);
    }
    public function tambahdataklasifikasi()
    {
        return view('masteradmin.form.modal.tambahklasifikasi');
    }
    public function editdataklasifikasi($id)
    {
        return view('masteradmin.form.modal.editklasifikasi');
    }

    public function datauser($id)
    {
        $data =  DB::table('users')
        ->select('users.*')
        ->where('cabang',$id)
        ->get();
        return view('masteradmin.form.datauser',['data'=>$data,'id'=>$id]);
    }
    public function tambahdatauser(Request $request)
    {

        DB::table('users')->insert(
            [
                'name' => $request->input('name'),
                'email' => $request->input('username'),
                'email_' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'akses' => $request->input('akses'),
                'cabang' => $request->input('id'),
                'created_at' => date('Y-m-d H:i:s'),
            ]);
        $data =  DB::table('users')
        ->select('users.*')
        ->where('cabang',$request->input('id'))
        ->get();
        $id = $request->input('id');
        return view('masteradmin.form.datauser',['data'=>$data,'id'=>$id])->with(['success' => 'Pesan Berhasil']);
        // return redirect('/pesan')->with(['success' => 'Pesan Berhasil']);
    }
    public function editdatauser(Request $request)
    {
        DB::table('users')
            ->where('id',$request->input('id_user'))
            ->update([
                        'name' => $request->input('name'),
                        'email' => $request->input('username'),
                        'email_' => $request->input('email'),
                        'akses' => $request->input('akses'),

                    ]);

        $data =  DB::table('users')
        ->select('users.*')
        ->where('cabang',$request->input('kd_cabang'))
        ->get();
        $id = $request->input('kd_cabang');
        return view('masteradmin.form.datauser',['data'=>$data,'id'=>$id]);
    }
    public function hapusdatauser(Request $request)
    {

        DB::table('users')->where('id', $request->input('id_user2'))->delete();
        $data =  DB::table('users')
        ->select('users.*')
        ->where('cabang',$request->input('kd_cabang2'))
        ->get();
        $id = $request->input('kd_cabang2');
        return view('masteradmin.form.datauser',['data'=>$data,'id'=>$id]);
    }
    public function resetdatauser(Request $request)
    {
        // DB::table('users')
        //     ->where('id',$request->input('id_user'))
        //     ->update([
        //                 'name' => $request->input('name'),
        //                 'email' => $request->input('username'),
        //                 'akses' => $request->input('akses'),

        //             ]);

        $data =  DB::table('users')
        ->select('users.*')
        ->where('cabang',$request->input('kd_cabang1'))
        ->get();
        $id = $request->input('kd_cabang1');
        return view('masteradmin.form.datauser',['data'=>$data,'id'=>$id]);
    }
    public function datalokasi($id)
    {
        $data = DB::table('tbl_lokasi')
        ->select('tbl_lokasi.*')
        ->get();
        return view('masteradmin.form.datalokasi',['data'=>$data,'id'=>$id]);
    }

    // Inventaris Controller
    public function datainventaris($id)
    {
        // $data = DB::table('tbl_inventory')
        // ->select('tbl_inventory.*','no_urut_barang.*')
        // ->join('no_urut_barang','no_urut_barang.no_urut_barang','=', 'tbl_inventory.no_urut_barang')
        // ->orderBy('tbl_inventory.id', 'asc')
        // ->get();
        $data = DB::table('sub_tbl_inventory')
        ->where('kd_cabang',$id)
        ->orderBy('id', 'asc')
        ->get();
        $totalinventarsi = DB::table('sub_tbl_inventory')
        ->where('kd_cabang',$id)
        ->count();
        $lokasi = DB::table('tbl_cabang')
        ->select('tbl_cabang.*')
        ->where('kd_cabang',$id)
        ->get();
        return view('masteradmin.form.datainventaris',['data'=>$data,'id'=>$id,'lokasi'=>$lokasi,'totalinventaris'=>$totalinventarsi]);
    }
    public function lihatdatabarang($id,$kd)
    {
        $data = DB::table('sub_tbl_inventory')
        ->select('sub_tbl_inventory.*')
        ->where('id_inventaris',$kd)
        ->where('kd_cabang',$id)
        ->first();
        // dd($id);
        return view('masteradmin.form.datainventaris-sub',['data'=>$data,'id'=>$id,'kd'=>$kd ]);
    }
    public function tambahdatabarang($id,$kd)
    {
        $datalokasi = DB::table('tbl_lokasi')
        ->select('tbl_lokasi.*')
        ->get();
        $kode = DB::table('tbl_inventory')
        ->select('tbl_inventory.*')
        ->get();
        // dd($id);
        return view('masteradmin.form.inventaris.formtambah',['id'=>$id,'datalokasi'=>$datalokasi,'kode'=>$kode ,'kd'=>$kd]);
    }
    public function simpandetailbarang()
    {
        Excel::import(new ImportSubBrg, request()->file('file'));
        Session::flash('sukses','Upload Data Sukses');
        return redirect()->back();
    }
    // Data Peminjaman Controller
    public function datapeminjaman($id)
    {
        $data = DB::table('tbl_peminjaman')
        ->where('kd_cabang',$id)
        ->get();
        return view('masteradmin.form.datapeminjaman',['data'=>$data]);
    }
    // Data Mutasi Controller
    public function datamutasi($id)
    {
        $lokasi = DB::table('tbl_cabang')
        ->select('tbl_cabang.*')
        ->where('kd_cabang',$id)
        ->get();
        $data = DB::table('tbl_mutasi')
        ->select('tbl_mutasi.*')
        ->get();
        return view('masteradmin.form.datamutasi',['lokasi'=>$lokasi,'data'=>$data]);
    }
    public function tampilformmuitasi($id)
    {
        $data = DB::table('tbl_mutasi')
        ->select('tbl_mutasi.*')
        ->where('kd_mutasi',$id)
        ->get();

        $databrg = DB::table('tbl_sub_mutasi')
        ->select('tbl_sub_mutasi.*','sub_tbl_inventory.kd_inventaris','sub_tbl_inventory.nama_barang','sub_tbl_inventory.merk','sub_tbl_inventory.type','sub_tbl_inventory.no_seri','sub_tbl_inventory.th_pembuatan','sub_tbl_inventory.harga_perolehan','sub_tbl_inventory.th_perolehan','sub_tbl_inventory.gambar')
        ->join('sub_tbl_inventory','sub_tbl_inventory.id','=','tbl_sub_mutasi.id_inventaris')
        ->where('tbl_sub_mutasi.kd_mutasi',$data[0]->kd_mutasi)
        ->get();
        // dd($databrg);
        return view('masteradmin.form.mutasi.formmutasi',['data'=>$data,'databrg'=>$databrg]);
    }
    // Data Pemusnahan Controller
    public function datapemusnahan($id)
    {
        $lokasi = DB::table('tbl_cabang')
        ->select('tbl_cabang.*')
        ->where('kd_cabang',$id)
        ->get();
        $data = DB::table('tbl_musnah')
        ->select('tbl_musnah.*')
        ->get();
        return view('masteradmin.form.datamusnah',['data'=>$data,'lokasi'=>$lokasi]);
    }
    public function updatedatainevntaris($id)
    {
        $data = DB::table('sub_tbl_inventory_temp')->where('kd_cabang',$id)->get();
        return view('masteradmin.form.updatedatainventaris',['id'=>$id, 'data'=>$data]);
    }
    public function masterinjekupdate($id)
    {
        if (auth::user()->akses == 'admin') {
        $data = DB::table('sub_tbl_inventory_temp')->where('kd_cabang',$id)->get();
        return view('masteradmin.form.updatedatainventaris',['id'=>$id, 'data'=>$data]);
        }
    }
    public function getupdatedatainevntaris($id)
    {

        return redirect()->back();
    }
    public function simpanupdateinventaris(Request $request)
    {
        DB::table('sub_tbl_inventory')
        ->where('no_inventaris',$request->input('id'))
        ->update([
                    'harga_perolehan' => $request->input('harga'),
                    'ket_musnah' => $request->input('ket'),
                ]);
        DB::table('sub_tbl_inventory_temp')->where('no_inventaris', $request->input('id'))->delete();
        return redirect()->back();
    }
    public function simpanupdateinventariscabang($id)
    {
        $data = DB::table('sub_tbl_inventory_temp')->where('kd_cabang',$id)->get();
        foreach ($data as  $value) {
            $cekdata = DB::table('sub_tbl_inventory')->where('no_inventaris',$value->no_inventaris)->first();
            if ($cekdata) {
                DB::table('sub_tbl_inventory')
                ->where('no_inventaris',$value->no_inventaris)
                ->update([
                                'harga_perolehan' => $value->harga,
                                'ket_musnah' => $value->ket,
                            ]);
                DB::table('sub_tbl_inventory_temp')->where('no_inventaris', $value->no_inventaris)->delete();
            }
        }
        // DB::table('sub_tbl_inventory')
        // ->where('no_inventaris',$request->input('id'))
        // ->update([
        //             'harga_perolehan' => $request->input('harga'),
        //             'ket_musnah' => $request->input('ket'),
        //         ]);
        // DB::table('sub_tbl_inventory_temp')->where('no_inventaris', $request->input('id'))->delete();
        return redirect()->back();
    }

    //

    public function dataexcelcabang($id)
    {
        if (Auth::user()->akses == 'admin') {
            $data = DB::table('sub_tbl_inventory_log')->where('kd_cabang',$id)->get();
            return view('masteradmin.dataexcel.excelcabang',['data'=>$data]);
        }
    }
    public function editdataexcelcabang($id)
    {
        if (Auth::user()->akses == 'admin') {
            $data = DB::table('sub_tbl_inventory_log')->where('id',$id)->first();
            return view('masteradmin.dataexcel.detailexcelcabang',['data'=>$data]);
        }
    }
    public function editpostdataexcelcabang(Request $request)
    {
        if (Auth::user()->akses == 'admin') {
            DB::table('sub_tbl_inventory_log')->where('id',$request->id)->update([
                'nama_barang'=>$request->nama_barang,
                'harga_perolehan'=>$request->harga,
            ]);
            Session::flash('sukses','Berhasil update data');
            return redirect()->back();
        }
    }
    public function masterdatainventaris($id)
    {
        if (Auth::user()->akses == 'admin') {
            $data = DB::table('sub_tbl_inventory')->where('kd_cabang',$id)->get();
            return view('masteradmin.datainventaris.datainventaris',['data'=>$data,'id'=>$id]);
        }
    }
    public function createnomorinventariscabang(Request $request)
    {
        $no = 1;
        $entitas = DB::table('tbl_entitas_cabang')
        ->join('tbl_cabang','tbl_cabang.kd_entitas_cabang','=','tbl_entitas_cabang.kd_entitas_cabang')
        ->join('tbl_setting_cabang','tbl_setting_cabang.kd_cabang','=','tbl_cabang.kd_cabang')
        ->where('tbl_setting_cabang.kd_cabang',$request->kd_cabang)->first();
        $data = DB::table('sub_tbl_inventory')
            ->orderBy('id', 'ASC')
            ->where('kd_cabang',$request->kd_cabang)
            ->get();
        foreach ($data as $data) {
            DB::table('sub_tbl_inventory')
            ->where('id_inventaris',$data->id_inventaris)
            ->update([
                        'no_inventaris' => $no++.'/'.$data->kd_inventaris.'/'.$data->kd_lokasi.'/'.$entitas->simbol_entitas.'.'.$entitas->no_cabang.'/'.$data->th_perolehan,

                    ]);
        }

        return redirect()->back();
    }
    public function masterdatalokasicabang($id)
    {
        if (Auth::user()->akses == 'admin') {
            $lokasi = DB::table('sub_tbl_inventory')
            ->select('tbl_lokasi.*')
            ->where('sub_tbl_inventory.kd_cabang',$id)
            ->join('tbl_lokasi','tbl_lokasi.kd_lokasi','=','sub_tbl_inventory.kd_lokasi')
            ->distinct()->get(['sub_tbl_inventory.kd_lokasi']);
            return view('masteradmin.datalokasi.lokasicabang',['lokasi'=>$lokasi,'id'=>$id]);
        }

    }
    public function detaildatainventaris($id)
    {
        if (Auth::user()->akses == 'admin') {
            $data = DB::table('sub_tbl_inventory')
            ->where('id',$id)->first();
            return view('masteradmin.datainventaris.detaildata',['data'=>$data]);
        }

    }
    public function postdetaildatainventaris(Request $request)
    {
        if (Auth::user()->akses == 'admin') {
            DB::table('sub_tbl_inventory')
            ->where('id',$request->id)
            ->update([
                        'nama_barang' => $request->nama_barang,
                        'no_inventaris' => $request->no_inventaris,
                        'kd_lokasi' => $request->kd_lokasi,
                        'kd_jenis' => $request->kd_jenis,
                    ]);
            Session::flash('sukses','Berhasil update data');
            return redirect()->back();
        }

    }

    public function masteradmintelegram()
    {
        if (auth::user()->akses == 'admin') {
            $data = DB::table('t_no_telegram')
            ->join('tbl_cabang','tbl_cabang.kd_cabang','=','t_no_telegram.kd_cabang')
            ->get();
            return view('masteradmin.data-telegram',['data'=>$data]);
        }
    }
}
