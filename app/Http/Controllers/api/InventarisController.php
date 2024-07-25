<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Response;
use Illuminate\Support\Facades\Response;
use DB;
class InventarisController extends Controller
{
    public function index($id,$kode)
    {
        try {
            $category = DB::table('sub_tbl_inventory')->where('kd_cabang',$id)->where('kd_inventaris',$kode)->get();
            return response()->json($category);
        } catch (QueryException $e) {
            $error = [
                'error' => $e->getMessage()
            ];
            return response()->json($error, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    public function datainventaris($id,$nama)
    {
        try {
            $category = DB::table('sub_tbl_inventory')->where('kd_cabang',$id)->where('nama_barang', 'like', '%' . $nama . '%')->get();
            return response()->json($category);
        } catch (QueryException $e) {
            $error = [
                'error' => $e->getMessage()
            ];
            return response()->json($error, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    public function dataidinventaris($id)
    {
        try {
            $category = DB::table('sub_tbl_inventory')->where('id_inventaris',$id)->first();
            return response()->json($category);
        } catch (QueryException $e) {
            $error = [
                'error' => $e->getMessage()
            ];
            return response()->json($error, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
