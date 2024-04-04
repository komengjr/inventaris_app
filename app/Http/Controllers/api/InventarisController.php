<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Response;
use Illuminate\Support\Facades\Response;
use DB;
class InventarisController extends Controller
{
    public function index($id)
    {
        try {
            $category = DB::table('sub_tbl_inventory')->where('kd_cabang',$id)->where('kd_inventaris','05.04.03')->get();
            return response()->json($category);
        } catch (QueryException $e) {
            $error = [
                'error' => $e->getMessage()
            ];
            return response()->json($error, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
