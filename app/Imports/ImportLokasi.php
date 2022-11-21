<?php

namespace App\Imports;

use App\tbl_lokasi;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportLokasi implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new tbl_lokasi([
            'kd_lokasi'     => $row[0],
            'nama_lokasi'    => $row[1],
            
        ]);
    }
}
