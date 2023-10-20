<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\sub_tbl_inventory;
use Illuminate\Support\Facades\Auth;
use DB;
class BigDataController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function masterbarang(Request $request)
    {
        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowperpage = $request->get("length"); // Rows display per page

        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $order_arr = $request->get('order');
        $search_arr = $request->get('search');

        $columnIndex = $columnIndex_arr[0]['column']; // Column index
        $columnName = $columnName_arr[$columnIndex]['data']; // Column name
        $columnSortOrder = $order_arr[0]['dir']; // asc or desc
        $searchValue = $search_arr['value']; // Search value

        // Total records
        $totalRecords = sub_tbl_inventory::select('count(*) as allcount')->where('kd_cabang',Auth::user()->cabang)->count();
        $totalRecordswithFilter = sub_tbl_inventory::select('count(*) as allcount')->where('nama_barang', 'like', '%' . $searchValue . '%')->where('kd_cabang',Auth::user()->cabang)->count();

        // Fetch records
        $records = sub_tbl_inventory::orderBy($columnName, $columnSortOrder)
            // ->join('tbl_pemeriksaan','tbl_pemeriksaan.kd_pemeriksaan','=','tbl_perusahaan_paket_log.kd_pemeriksaan')
            ->where('sub_tbl_inventory.nama_barang', 'like', '%' . $searchValue . '%')
            ->where('kd_cabang',Auth::user()->cabang)
            ->select('sub_tbl_inventory.*')
            ->skip($start)
            ->take($rowperpage)
            ->get();

        $data_arr = array();
        $no=1;
        foreach ($records as $record) {
            $id = $no++;
            $nama_barang = $record->nama_barang;
            $id_inventaris = $record->id_inventaris;
            $no_inventaris = $record->no_inventaris;
            $harga_perolehan = $record->harga_perolehan;
            $kd_inventaris =  $record->kd_inventaris;
            $ruangan = DB::table('tbl_nomor_ruangan_cabang')->where('id_nomor_ruangan_cbaang',$record->id_nomor_ruangan_cbaang)->first();
            if ($ruangan) {
            $dataruangan = $ruangan->nomor_ruangan;
            } else {
            $dataruangan = '<button class="btn-danger" disabled>undefinded</button>';
            };


            $data_arr[] = array(
                "id" => $id,
                "nama_barang" => $nama_barang,
                "no_inventaris" => $no_inventaris,
                "harga_perolehan" => number_format($harga_perolehan, 0, ",", "."),
                "kd_inventaris" => $kd_inventaris,
                "dataruangan" => $dataruangan,
                "btn" => "
                <button class='btn-warning' data-toggle='modal' data-target='#editmasterbarang' id='editbarangmaster' data-url=". url('divisi/masterbarang/showedit', ['id' => $id_inventaris])."><i class='bx bx-pencil'></i> edit</button>
                "
            );
        }

        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
            "aaData" => $data_arr
        );

        echo json_encode($response);
        exit;
        // $datakategori = DB::table('no_urut_barang')->get();
        // $inventory_log = DB::table('sub_tbl_inventory_log')->where('kd_cabang',auth::user()->cabang)->count();
        // $inventory = DB::table('sub_tbl_inventory')->where('kd_cabang',auth::user()->cabang)->count();
        // $data = DB::table('sub_tbl_inventory')
        // ->join('tbl_lokasi','tbl_lokasi.kd_lokasi','=','sub_tbl_inventory.kd_lokasi')
        // ->orderBy('sub_tbl_inventory.no', 'asc')
        // ->where('sub_tbl_inventory.kd_cabang',auth::user()->cabang)->get();
        // // dd($data);
        // return view('divisi.masterbarang',[ 'datakategori' => $datakategori, 'data'=>$data, 'inventory_log'=>$inventory_log, 'inventory'=>$inventory]);
    }
}
