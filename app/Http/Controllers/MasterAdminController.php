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
    public function masteradmin_user(){
        if (Auth::user()->akses == 'admin') {
            return view('application.admin.masteruser');
        } else {
            return view('application.error.404');
        }
    }
    public function masteradmin_cabang(){
        if (Auth::user()->akses == 'admin') {
            $data = DB::table('tbl_cabang')
            ->join('tbl_setting_cabang','tbl_cabang.kd_cabang','=','tbl_setting_cabang.kd_cabang')
            ->join('tbl_entitas_cabang','tbl_entitas_cabang.kd_entitas_cabang','=','tbl_cabang.kd_entitas_cabang')
            ->get();
            return view('application.admin.mastercabang',['data'=>$data]);
        } else {
            return view('application.error.404');
        }
    }
    public function masteradmin_cabang_edit(Request $request){
        return view('application.admin.cabang.form-edit');
    }
    public function masteradmin_cabang_data_barang(Request $request){
        $data =  DB::table('sub_tbl_inventory')->where('kd_cabang',$request->code)->get();
        return view('application.admin.cabang.data-barang',['data'=>$data]);
    }
    public function masteradmin_menu(){
        if (Auth::user()->akses == 'admin') {
            $data = DB::table('z_menu_sub')->get();
            return view('application.admin.mastermenu',['data'=>$data]);
        } else {
            return view('application.error.404');
        }
    }
    public function masteradmin_menu_add(){
        if (Auth::user()->akses == 'admin') {
            $menu = DB::table('z_menu')->get();
            return view('application.admin.menu.form-add',['menu'=>$menu]);
        } else {
            return view('application.error.404');
        }
    }
    public function masteradmin_menu_save(Request $request){
        if (Auth::user()->akses == 'admin') {
            DB::table('z_menu_sub')->insert([
                'menu_sub_code'=> str::uuid(),
                'menu_code'=>$request->menu,
                'menu_sub_name'=>$request->sub_menu,
                'menu_sub_link'=>$request->link,
                'menu_sub_icon'=>$request->icon,
                'menu_sub_status'=>1,
                'created_at'=>now(),
            ]);
            return redirect()->back()->withSuccess('Great! Berhasil Menambahkan Data');
        } else {
            return view('application.error.404');
        }
    }
}
