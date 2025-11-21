<?php

namespace App\Imports;

use App\sub_tbl_inventory_log;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use DB;
use Illuminate\Support\Facades\Auth;
class LogInventarisImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $data = DB::table('tbl_setting_cabang')->where('kd_cabang',auth::user()->cabang)->first();
        return new sub_tbl_inventory_log([
            'kd_inventaris'     => $row['kd_inventaris'],
            'kd_lokasi'     => $row['kd_lokasi'],
            'kd_jenis'     => $row['kd_jenis'],
            'nama_barang'    => $row['nama_barang'],
            'outlet'     => '',
            'kd_cabang'    => auth::user()->cabang,
            'th_perolehan'    => $row['th_perolehan'],
            'merk'     => $row['merk'],
            'type'    => $row['type'],
            'no_seri'     => $row['no_seri'],
            'suplier'    => $row['suplier'],
            'harga_perolehan'     => $row['harga_perolehan'],
            'tgl_mutasi'    => '',
            'tujuan_mutasi'     => '',
            'nilai_buku'    => '',
            'tgl_beli'     => $row['tgl_beli'],
            'ket_musnah'    => '',
            'kondisi_barang'     => $row['kondisi_barang'],
            'jam_input'    => '',
        ]);
    }
}
