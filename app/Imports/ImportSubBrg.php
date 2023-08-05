<?php

namespace App\Imports;
use Illuminate\Http\Request;
use App\sub_tbl_inventory;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
class ImportSubBrg implements ToModel , WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        $request = request()->all();
        return new sub_tbl_inventory([
            'id_inventaris'     => $request['kdcabang']."".mt_rand(1000, 9999),
            'kd_inventaris'     => $row['kd_inventaris'],
            'kd_lokasi'     => $row['kd_lokasi'],
            'kd_jenis'     => $row['kd_jenis'],
            'nama_barang'    => $row['nama_barang'],
            'outlet'     => $row['outlet'],
            'kd_cabang'    => $request['kdcabang'],
            'th_pembuatan'     => $row['th_pembuatan'],
            'th_perolehan'    => $row['th_perolehan'],
            'merk'     => $row['merk'],
            'type'    => $row['type'],
            'no_seri'     => $row['no_seri'],
            'suplier'    => $row['suplier'],
            'harga_perolehan'     => $row['harga_perolehan'],
            'tgl_mutasi'    => '',
            'tujuan_mutasi'     => '',
            'nilai_buku'    => '',
            'tgl_beli'     => '',
            'ket_musnah'    => '',
            'kondisi_barang'     => $row['kondisi_barang'],
            'jam_input'    => '',
        ]);
    }
}
