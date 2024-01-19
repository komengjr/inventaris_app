<?php

namespace App\Exports;

use App\tbl_barang;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
class DataInventarisExportRuangan implements FromQuery, WithHeadings, ShouldAutoSize
{
    public function __construct(string $keyword,$id)
    {
        $this->nama = $keyword;
        $this->id = $id;
    }
    public function query()
    {
        return tbl_barang::query()->select(
            'id_inventaris',
            'kd_inventaris',
            'no_inventaris',
            'kd_lokasi',
            'nama_barang',
            'outlet',
            'kd_cabang',
            'th_perolehan',
            'merk',
            'type',
            'no_seri',
            'suplier',
            'harga_perolehan',
            'tgl_beli',
            'kondisi_barang',
        )->where('kd_cabang', 'like', '%' . $this->nama . '%')->where('id_nomor_ruangan_cbaang',$this->id);
    }
    public function headings(): array
    {
        return [
            'id_inventaris',
            'kd_inventaris',
            'no_inventaris',
            'kd_lokasi',
            'nama_barang',
            'outlet',
            'kd_cabang',
            'th_perolehan',
            'merk',
            'type',
            'no_seri',
            'suplier',
            'harga_perolehan',
            'tgl_beli',
            'kondisi_barang',
        ];
    }
}
