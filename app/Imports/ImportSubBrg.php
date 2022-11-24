<?php

namespace App\Imports;
use Illuminate\Http\Request;
use App\sub_tbl_inventory;
use Maatwebsite\Excel\Concerns\ToModel;
// use Maatwebsite\Excel\Concerns\WithHeadingRow;/
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
            'id_inventaris'     => $row[0],
            'kd_inventaris'     => $row[1],
            'kd_lokasi'     => $row[2],
            'nama_barang'    => $row[3],
            'outlet'     => $row[4],
            'kd_cabang'    => $request['kdcabang'],
            'th_pembuatan'     => $row[6],
            'th_perolehan'    => $row[7],
            'merk'     => $row[8],
            'type'    => $row[9],
            'no_seri'     => $row[10],
            'suplier'    => $row[11],
            'harga_perolehan'     => $row[12],
            'tgl_mutasi'    => $row[13],
            'tujuan_mutasi'     => $row[14],
            'nilai_buku'    => $row[15],
            'tgl_musnah'     => $row[16],
            'ket_musnah'    => $row[17],
            'kondisi_barang'     => $row[18],
            'jam_input'    => $row[19],
        ]);
    }
}
