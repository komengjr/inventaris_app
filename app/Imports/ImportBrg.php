<?php

namespace App\Imports;

use App\tbl_inventory;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportBrg implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new tbl_inventory([
            'kd_inventaris'     => $row[0],
            'no_urut_barang'     => $row[1],
            'nama_barang'    => $row[2],
            'kd_cabang'    => $row[3],
        ]);
    }
}
