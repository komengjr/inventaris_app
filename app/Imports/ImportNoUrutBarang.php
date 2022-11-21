<?php

namespace App\Imports;

use App\no_urut_barang;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportNoUrutBarang implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new no_urut_barang([
            'no_urut_barang'     => $row[0],
            'kategori_barang'    => $row[1],
        ]);
    }
}
