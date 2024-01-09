<?php

namespace App\Http\Controllers;
use App\Exports\DataInventarisExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;
use DB;
class ExcelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data = DB::table('tbl_cabang')->where('kd_cabang',Auth::user()->cabang)->first();
        return Excel::download(new DataInventarisExport(Auth::user()->cabang), 'inventaris_'.$data->nama_cabang.'.xlsx');
    }
}
