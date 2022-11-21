<?php

namespace App\Imports;

use App\tbl_peserta;
use Maatwebsite\Excel\Concerns\ToModel;

class Peserta implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new tbl_peserta([
            'status'     => $row[0],
            'nama_peserta'    => $row[1],
        ]);
    }
}
