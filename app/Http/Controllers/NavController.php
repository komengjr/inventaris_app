<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class NavController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function recentuserlogin()
    {
        $data = DB::table('z_log_kunjungan')->where('cabang',Auth::user()->cabang)->get();
        return view('navbar.user-login',['data'=>$data]);
    }
    public function recentuserorder()
    {
        $data = DB::table('tbl_pemnijaman_req')
        ->select('tbl_pemnijaman_req.*','tbl_cabang.nama_cabang')
        ->join('tbl_cabang','tbl_cabang.kd_cabang','=','tbl_pemnijaman_req.cabang_tujuan')
        ->where('cabang_req',Auth::user()->cabang)->get();
        return view('navbar.user-order',['data'=>$data]);
    }
    public function detailrecentuserorder($id)
    {
        $data = DB::table('tbl_pemnijaman_req')
        ->select('tbl_pemnijaman_req.*','tbl_cabang.nama_cabang')
        ->join('tbl_cabang','tbl_cabang.kd_cabang','=','tbl_pemnijaman_req.cabang_tujuan')
        ->where('tiket_req',$id)->first();
        $staff = DB::table('tbl_staff')->where('kd_cabang',Auth::user()->cabang)->get();
        return view('navbar.order-detail',['data'=>$data, 'staff'=>$staff]);
    }
    public function detailpindahcabangrecentuserorder($id)
    {
        $data = DB::table('tbl_cabang')->get();
        return view('navbar.pindah-order-cabang',['data'=>$data, 'id'=>$id]);
    }
    public function postpindahcabangrecentuserorder(Request $request)
    {

        DB::table('tbl_pemnijaman_req')->where('tiket_req',$request->tiket)->update([
            'cabang_req'=>$request->cabang
        ]);

        Session::flash('sukses', 'Berhasil Order Ke lain Cabang');
        return redirect()->back();
    }
    public function postterimaordercabangrecentuserorder(Request $request)
    {
        $cekdata = DB::table('tbl_pemnijaman_req')->where('tiket_req',$request->tiket_peminjaman)->first();
        if ($cekdata) {
            DB::table('tbl_peminjaman')->insert(
                [
                    'tiket_peminjaman' => $request->tiket_peminjaman,
                    'nama_kegiatan' => $cekdata->kategori_req,
                    'tujuan_cabang' => $cekdata->cabang_tujuan,
                    'tgl_pinjam' => $request->input('tgl_pinjam'),
                    'pj_pinjam' => $request->input('pj_pinjam'),
                    'batas_tgl_pinjam' => $request->input('batas_tgl_pinjam'),
                    'status_pinjam' => 0,
                    'kd_cabang' => auth::user()->cabang,
                    'deskripsi' => $request->input('deskripsi'),
                    'created_at' => date('Y-m-d H:i:s'),
                ]
            );
            DB::table('tbl_pemnijaman_req')->where('tiket_req',$request->tiket_peminjaman)->update([
                'status_req'=>1
            ]);
        } else {
            # code...
        }
        Session::flash('sukses', 'Berhasil Terima Order');
        return redirect()->back();
    }
}
