<?php

namespace App\Imports;

use App\data_peserta;
use Maatwebsite\Excel\Concerns\ToModel;

class DataPeserta implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new data_peserta([
            'kode_peserta'     => $row[0],
            'nama_peserta'     => $row[1],
            'nir'    => $row[2],
            'email'    => $row[3],
            'no_hp'    => $row[4],
            'asal_pengda'    => $row[5],
        ]);
    }
}
