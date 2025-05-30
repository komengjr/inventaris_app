<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\sub_tbl_inventory;
use App\sub_tbl_inventory_log;
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
        $totalRecords = sub_tbl_inventory::select('count(*) as allcount')->where('kd_cabang', Auth::user()->cabang)->count();
        $totalRecordswithFilter = sub_tbl_inventory::select('count(*) as allcount')->where('nama_barang', 'like', '%' . $searchValue . '%')->where('kd_cabang', Auth::user()->cabang)->count();

        // Fetch records
        $records = sub_tbl_inventory::orderBy($columnName, $columnSortOrder)
            // ->join('tbl_pemeriksaan','tbl_pemeriksaan.kd_pemeriksaan','=','tbl_perusahaan_paket_log.kd_pemeriksaan')
            ->where('sub_tbl_inventory.nama_barang', 'like', '%' . $searchValue . '%')
            ->where('kd_cabang', Auth::user()->cabang)
            ->select('sub_tbl_inventory.*')
            ->skip($start)
            ->take($rowperpage)
            ->get();

        $data_arr = array();
        $no = 1;
        foreach ($records as $record) {
            $id = $record->no;
            $nama_barang = $record->nama_barang;
            $id_inventaris = $record->id_inventaris;
            $no_inventaris = $record->no_inventaris;
            $harga_perolehan = $record->harga_perolehan;
            $kd_inventaris = $record->kd_inventaris;
            $merk = $record->merk.' / '.$record->type.' / '.$record->no_seri;
            $tglbeli = $record->tgl_beli;
            $thperolehan = $record->th_perolehan;
            $ruangan = DB::table('tbl_nomor_ruangan_cabang')->where('id_nomor_ruangan_cbaang', $record->id_nomor_ruangan_cbaang)->first();
            if ($ruangan) {
                $dataruangan = $ruangan->nomor_ruangan;
                if ($record->status_barang == 5) {
                    $status_barang = '<span class="badge bg-danger p-2" style="font-size: 11px;">Musnah</span>';
                    $button = "";
                } else if($record->status_barang == 4){
                    $status_barang = '<span class="badge bg-warning p-2" style="font-size: 11px;">Mutasi</span>';
                    $button = "";
                } else {
                    $status_barang = '<span class="badge bg-success p-2" style="font-size: 11px;">Baik</span>';
                    $button =  "<button class='btn-warning m-1' data-toggle='modal' data-target='#editmasterbarang' id='editbarangmaster' data-url=" . url('divisi/masterbarang/showedit', ['id' => $id_inventaris]) . "><i class='bx bx-pencil'></i> edit</button>
                    <button class='btn-dark m-1' data-toggle='modal' data-target='#editmasterbarang' id='print-barcode-master-barang' data-url=" . url('printbarcodebyidinventaris', ['id' => $record->id]) . "><i class='bx bx-print'></i> Cetak Barcode</button>";
                };

            } else {
                $dataruangan = '<span class="badge bg-danger p-2" style="font-size: 11px;">Tidak di temukan</span>';
                if ($record->status_barang == 5) {
                    $status_barang = '<span class="badge bg-danger p-2" style="font-size: 11px;">Musnah</span>';
                    $button = "";
                } else if($record->status_barang == 4){
                    $status_barang = '<span class="badge bg-warning p-2" style="font-size: 11px;">Mutasi</span>';
                    $button = "";
                } else {
                    $status_barang = '<span class="badge bg-success p-2" style="font-size: 11px;">Baik</span>';
                    $button = "<button class='btn-warning m-1' data-toggle='modal' data-target='#editmasterbarang' id='editbarangmaster' data-url=" . url('divisi/masterbarang/showedit', ['id' => $id_inventaris]) . "><i class='bx bx-pencil'></i> edit</button>";
                };

            };




            $data_arr[] = array(
                "id" => $id,
                "nama_barang" => $nama_barang,
                "no_inventaris" => $no_inventaris,
                "harga_perolehan" => number_format($harga_perolehan, 0, ",", "."),
                "kd_inventaris" => $kd_inventaris,
                "dataruangan" => $dataruangan,
                "merk" => $merk,
                "tglbeli" => $tglbeli,
                "thperolehan" => $thperolehan,
                "status_barang" => $status_barang,
                "btn" => $button
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

    }
    public function masterbaranglog(Request $request)
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
        $totalRecords = sub_tbl_inventory_log::select('count(*) as allcount')->where('kd_cabang', Auth::user()->cabang)->count();
        $totalRecordswithFilter = sub_tbl_inventory_log::select('count(*) as allcount')->where('kd_lokasi', 'like', '%' . $searchValue . '%')->where('kd_cabang', Auth::user()->cabang)->count();

        // Fetch records
        $records = sub_tbl_inventory_log::orderBy($columnName, $columnSortOrder)
            ->where('sub_tbl_inventory_log.nama_barang', 'like', '%' . $searchValue . '%')
            ->where('kd_cabang', Auth::user()->cabang)
            ->select('sub_tbl_inventory_log.*')
            ->skip($start)
            ->take($rowperpage)
            ->get();

        $data_arr = array();
        $no = 1;
        // dd($records);
        foreach ($records as $record) {
            $id = $no++;
            $idx = $record->id;
            $nama_barang = $record->nama_barang;
            $kd_inventaris = $record->kd_inventaris;

            $merk = $record->merk;
            $type = $record->type;
            $tgl_beli = $record->tgl_beli;
            $th_perolehan = $record->th_perolehan;
            $harga_perolehan = $record->harga_perolehan;
            $ceklokasi = DB::table('tbl_lokasi')->where('kd_lokasi',$record->kd_lokasi)->first();
            if ($ceklokasi) {
                $kd_lokasi = $ceklokasi->kd_lokasi.' : '.$ceklokasi->nama_lokasi;
            } else {
                $kd_lokasi = '<button class="btn-danger" disabled>undefinded</button>';
            }
            $cekklasifikasi = DB::table('tbl_inventory')->where('kd_inventaris',$record->kd_inventaris)->first();
            if ($cekklasifikasi) {
                $kd_inventaris = $cekklasifikasi->kd_inventaris.' : '.$cekklasifikasi->nama_klasifikasi_barang;
            } else {
                $kd_inventaris = '<button class="btn-danger" disabled>undefinded</button>';
            }
            $data_arr[] = array(
                "id" => $id,
                "nama_barang" => $nama_barang,
                // "th_perolehan " => $th_perolehan,
                "harga_perolehan" => number_format($harga_perolehan, 0, ",", "."),
                "kd_inventaris" => $kd_inventaris,
                "kd_lokasi" => $kd_lokasi,
                "merk" => $merk,
                "type" => $type,
                "tgl_beli" => $tgl_beli,
                "th_perolehan" => $th_perolehan,
                "btn" => "
                <button class='btn-warning' id='buttoneditloginventaris'  data-id=".$idx."><i class='zmdi zmdi-edit'></i> edit</button>
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
    }
    public function erorbaranglog(Request $request)
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
        $totalRecords = sub_tbl_inventory_log::select('count(*) as allcount')
        ->whereNotExists( function ($query) {
            $query->select(DB::raw(1))
            ->from('tbl_lokasi')
            ->whereRaw('sub_tbl_inventory_log.kd_lokasi = tbl_lokasi.kd_lokasi');
        })
        ->where('sub_tbl_inventory_log.kd_cabang', Auth::user()->cabang)->count();
        $totalRecordswithFilter = sub_tbl_inventory_log::select('count(*) as allcount')
        ->whereNotExists( function ($query) {
            $query->select(DB::raw(1))
            ->from('tbl_lokasi')
            ->whereRaw('sub_tbl_inventory_log.kd_lokasi = tbl_lokasi.kd_lokasi');
        })
        ->where('kd_lokasi', 'like', '%' . $searchValue . '%')->where('kd_cabang', Auth::user()->cabang)->count();

        // Fetch records
        $records = sub_tbl_inventory_log::orderBy($columnName, $columnSortOrder)
            ->whereNotExists( function ($query) {
                $query->select(DB::raw(1))
                ->from('tbl_lokasi')
                ->whereRaw('sub_tbl_inventory_log.kd_lokasi = tbl_lokasi.kd_lokasi');
            })
            ->where('sub_tbl_inventory_log.nama_barang', 'like', '%' . $searchValue . '%')
            ->where('sub_tbl_inventory_log.kd_cabang', Auth::user()->cabang)
            ->select('sub_tbl_inventory_log.*')
            ->skip($start)
            ->take($rowperpage)
            ->get();

        $data_arr = array();
        $no = 1;
        // dd($records);
        foreach ($records as $record) {

            $idx = $record->id;
            $nama_barang = $record->nama_barang;
            $kd_inventaris = $record->kd_inventaris;

            $merk = $record->merk;
            $type = $record->type;
            $tgl_beli = $record->tgl_beli;
            $th_perolehan = $record->th_perolehan;
            $harga_perolehan = $record->harga_perolehan;
            $ceklokasi = DB::table('tbl_lokasi')->where('kd_lokasi',$record->kd_lokasi)->first();
            if ($ceklokasi) {
                // $kd_lokasi = $ceklokasi->nama_lokasi;
            } else {
                $id = $no++;
                $kd_lokasi = $record->kd_lokasi.' : <button class="btn-danger" disabled>undefinded</button>';
                $data_arr[] = array(
                    "id" => $id,
                    "nama_barang" => $nama_barang,
                    // "th_perolehan " => $th_perolehan,
                    "harga_perolehan" => number_format($harga_perolehan, 0, ",", "."),
                    "kd_inventaris" => $kd_inventaris,
                    "kd_lokasi" => $kd_lokasi,
                    "merk" => $merk,
                    "type" => $type,
                    "tgl_beli" => $tgl_beli,
                    "th_perolehan" => $th_perolehan,
                    "btn" => "
                    <button class='btn-warning' id='buttoneditloginventaris'  data-id=".$idx."><i class='zmdi zmdi-edit'></i> edit</button>
                    "
                );

            }


        }

        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
            "aaData" => $data_arr
        );

        echo json_encode($response);
        exit;
    }
    public function erorklasifikasi(Request $request)
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
        $totalRecords = sub_tbl_inventory_log::select('count(*) as allcount')
        ->whereNotExists( function ($query) {
            $query->select(DB::raw(1))
            ->from('tbl_inventory')
            ->whereRaw('sub_tbl_inventory_log.kd_inventaris = tbl_inventory.kd_inventaris');
        })
        ->where('sub_tbl_inventory_log.kd_cabang', Auth::user()->cabang)->count();
        $totalRecordswithFilter = sub_tbl_inventory_log::select('count(*) as allcount')
        ->whereNotExists( function ($query) {
            $query->select(DB::raw(1))
            ->from('tbl_inventory')
            ->whereRaw('sub_tbl_inventory_log.kd_inventaris = tbl_inventory.kd_inventaris');
        })
        ->where('sub_tbl_inventory_log.nama_barang', 'like', '%' . $searchValue . '%')->where('kd_cabang', Auth::user()->cabang)->count();

        // Fetch records
        $records = sub_tbl_inventory_log::orderBy($columnName, $columnSortOrder)
            ->whereNotExists( function ($query) {
                $query->select(DB::raw(1))
                ->from('tbl_inventory')
                ->whereRaw('sub_tbl_inventory_log.kd_inventaris = tbl_inventory.kd_inventaris');
            })
            ->where('sub_tbl_inventory_log.nama_barang', 'like', '%' . $searchValue . '%')
            ->where('sub_tbl_inventory_log.kd_cabang', Auth::user()->cabang)
            ->select('sub_tbl_inventory_log.*')
            ->skip($start)
            ->take($rowperpage)
            ->get();

        $data_arr = array();
        $no = 1;
        // dd($records);
        foreach ($records as $record) {

            $idx = $record->id;
            $nama_barang = $record->nama_barang;
            $merk = $record->merk;
            $type = $record->type;
            $tgl_beli = $record->tgl_beli;
            $th_perolehan = $record->th_perolehan;
            $harga_perolehan = $record->harga_perolehan;
            $cekklasifikasi = DB::table('tbl_inventory')->where('kd_inventaris',$record->kd_inventaris)->first();
            if ($cekklasifikasi) {
                // $kd_lokasi = $ceklokasi->nama_lokasi;
            } else {
                $id = $no++;
                $kd_inventaris = $record->kd_inventaris.' : <button class="btn-danger" disabled>undefinded</button>';
                $kd_lokasi = $record->kd_lokasi;
                $data_arr[] = array(
                    "id" => $id,
                    "nama_barang" => $nama_barang,
                    // "th_perolehan " => $th_perolehan,
                    "harga_perolehan" => number_format($harga_perolehan, 0, ",", "."),
                    "kd_inventaris" => $kd_inventaris,
                    "kd_lokasi" => $kd_lokasi,
                    "merk" => $merk,
                    "type" => $type,
                    "tgl_beli" => $tgl_beli,
                    "th_perolehan" => $th_perolehan,
                    "btn" => "
                    <button class='btn-warning' id='buttoneditloginventarisklasifikasi'  data-id=".$idx."><i class='zmdi zmdi-edit'></i> edit</button>
                    "
                );
            }


        }

        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
            "aaData" => $data_arr
        );

        echo json_encode($response);
        exit;
    }
}
