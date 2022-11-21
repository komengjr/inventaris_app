<?php

namespace App\Imports;
use Illuminate\Http\Request;
use App\sub_tbl_inventory;
use Maatwebsite\Excel\Concerns\ToModel;
// use Maatwebsite\Excel\Concerns\WithHeadingRow;
class ImportSubBrg implements ToModel 
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
            'kd_inventaris'     => $row[0],
            'kd_lokasi'     => $row[1],
            'nama_barang'    => $row[2],
            'outlet'     => $row[3],
            'kd_cabang'    => $request['kdcabang'],
            'th_pembuatan'     => $row[5],
            'th_perolehan'    => $row[6],
            'merk'     => $row[7],
            'type'    => $row[8],
            'no_seri'     => $row[9],
            'suplier'    => $row[10],
            'harga_perolehan'     => $row[11],
            'tgl_mutasi'    => $row[12],
            'tujuan_mutasi'     => $row[13],
            'nilai_buku'    => $row[14],
            'tgl_musnah'     => $row[15],
            'ket_musnah'    => $row[16],
            'kondisi_barang'     => $row[17],
            'jam_input'    => $row[18],
        ]);
    }
}
