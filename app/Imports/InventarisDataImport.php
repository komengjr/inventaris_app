<?php

namespace App\Imports;

use App\InventarisDataLog;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use DateTime;
class InventarisDataImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $total = DB::table('inventaris_data_log')->where('inventaris_data_cabang', Auth::user()->cabang)->count();
        $urut = str_pad($total + 1, 7, '0', STR_PAD_LEFT);
        $UNIX_DATE = ($row['tgl_beli'] - 25569) * 86400;
        $no_lokasi = DB::table('tbl_nomor_ruangan_cabang')->where('kd_lokasi',$row['kode_lokasi'])->where('kd_cabang',Auth::user()->cabang)->first();
        if ($no_lokasi) {
            $no_loc = $no_lokasi->id_nomor_ruangan_cbaang;
        } else {
            $no_loc = 'null';
        }

        $no = $total + 1;
        return new InventarisDataLog([
            'inventaris_data_code'  => Auth::user()->cabang . '' . $urut,
            'inventaris_klasifikasi_code' => $row['kode_klasifikasi'],
            'inventaris_data_number' => 'Not Created',
            'inventaris_data_name' => $row['nama_barang'],
            'inventaris_data_location' => $row['kode_lokasi'],
            'inventaris_data_jenis' => $row['jenis'],
            'inventaris_data_harga' => $row['harga'],
            'inventaris_data_merk' => $row['merek'],
            'inventaris_data_type' => $row['type'],
            'inventaris_data_no_seri' => $row['no_seri'],
            'inventaris_data_suplier' => $row['supplier'],
            'inventaris_data_kondisi' => 'BAIK',
            'inventaris_data_status' => 0,
            'inventaris_data_tgl_beli' => date('Y-m-d',$UNIX_DATE),
            'inventaris_data_cabang' => Auth::user()->cabang,
            'inventaris_data_urut' => $no++,
            'inventaris_data_file' => 'null',
            'id_nomor_ruangan_cbaang' => $no_loc,
            'created_at' => now(),
        ]);
    }
}
