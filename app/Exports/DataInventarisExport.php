<?php

namespace App\Exports;

use App\tbl_barang;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
class DataInventarisExport implements FromQuery
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct(string $keyword)
    {
        $this->nama = $keyword;
    }
    public function query()
    {
        return tbl_barang::query()->where('kd_cabang', 'like', '%' . $this->nama . '%');
    }
}
