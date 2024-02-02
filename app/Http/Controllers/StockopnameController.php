<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class StockopnameController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function unverifieddatastockopname($id)
    {
        $data = DB::table('sub_tbl_inventory')
        ->whereNotExists( function ($query) use($id) {
            $query->select(DB::raw(1))
            ->from('tbl_sub_verifdatainventaris')
            ->where('kode_verif',$id)
            ->whereRaw('tbl_sub_verifdatainventaris.id_inventaris = sub_tbl_inventory.id_inventaris');
        })->get();
        return view('divisi.stockopname.daftarlistunverified',['data'=>$data]);
    }
}
