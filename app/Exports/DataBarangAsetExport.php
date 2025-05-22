<?php

namespace App\Exports;

use App\DataInventaris;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class DataBarangAsetExport implements FromQuery, WithHeadings, ShouldAutoSize
{
    public function __construct(string $keyword)
    {
        $this->nama = $keyword;
    }
    public function query()
    {
        return DataInventaris::query()->select(
            'inventaris_data_code',
            'inventaris_klasifikasi_code',
            'inventaris_data_number',
            'inventaris_data_location',
            'inventaris_data_name',
            'inventaris_data_cabang',
            'inventaris_data_merk',
            'inventaris_data_type',
            'inventaris_data_no_seri',
            'inventaris_data_suplier',
            'inventaris_data_harga',
            'inventaris_data_tgl_beli',
            'inventaris_data_kondisi',
        )->where('inventaris_data_cabang', Auth::user()->cabang)->where('inventaris_data_jenis', 1)->orderBy('id_inventaris_data', 'ASC');
    }
    public function headings(): array
    {
        return [
            'ID Inventaris',
            'Kode Inventaris',
            'No Inventaris',
            'Kode Lokasi',
            'Nama Barang',
            'Kode Cabang',
            'Merk',
            'Type',
            'No Serial',
            'Supplier',
            'Harga Perolehan',
            'Tanggal Pembelian',
            'Kondisi Barang',
        ];
    }
}
