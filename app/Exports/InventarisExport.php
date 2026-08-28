<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class InventarisExport implements FromQuery, WithHeadings, WithMapping, WithStyles, ShouldAutoSize
{
    protected $lokasiId;
    protected $rowNumber = 0;

    public function __construct($lokasiId = 'ALL')
    {
        $this->lokasiId = $lokasiId;
    }

    /**
     * Query data sesuai skema database dan filter Auth cabang
     */
    public function query()
    {
        $userCabang = Auth::user()->cabang;

        $query = DB::table('inventaris_data')
            ->where('inventaris_data_cabang', $userCabang)
            ->where('inventaris_data_status', '<', 3);

        // Filter lokasi jika spesifik (bukan 'ALL')
        if ($this->lokasiId !== 'ALL' && !empty($this->lokasiId)) {
            $query->where('id_nomor_ruangan_cbaang', $this->lokasiId);
        }

        return $query->orderBy('id_inventaris_data', 'DESC');
    }

    /**
     * Header Kolom Excel
     */
    public function headings(): array
    {
        return [
            'NO',
            'KODE INVENTARIS',
            'NOMOR INVENTARIS',
            'NAMA BARANG',
            'JENIS ASET',
            'MERK / TYPE',
            'NO. SERI',
            'LOKASI / RUANGAN',
            'SUPLIER',
            'HARGA',
            'KONDISI',
            'TANGGAL BELI',
        ];
    }

    /**
     * Mapping Kolom Tabel ke Excel
     */
    public function map($row): array
    {
        $this->rowNumber++;

        // Konversi jenis aset (0: Non Aset, 1: Aset)
        $jenisAset = ($row->inventaris_data_jenis == 1) ? 'Aset' : 'Non Aset';

        // Gabung Merk dan Type jika ada
        $merkType = trim(($row->inventaris_data_merk ?? '') . ' ' . ($row->inventaris_data_type ?? ''));
        // Format harga ke Rupiah
        $hargaFormatted = 'Rp ' . number_format($row->inventaris_data_harga ?? 0, 0, ',', '.');

        return [
            $this->rowNumber,
            $row->inventaris_data_code ?? '-',
            $row->inventaris_data_number ?? '-',
            $row->inventaris_data_name ?? '-',
            $jenisAset,
            $merkType ?: '-',
            $row->inventaris_data_no_seri ?? '-',
            $row->inventaris_data_location ?? '-',
            $row->inventaris_data_suplier ?? '-',
            $hargaFormatted ?? 0,
            ucfirst($row->inventaris_data_kondisi ?? '-'),
            $row->inventaris_data_tgl_beli ? date('d-m-Y', strtotime($row->inventaris_data_tgl_beli)) : '-',
        ];
    }

    /**
     * Styling Header, Border, dan Format Angka
     */
    public function styles(Worksheet $sheet)
    {
        $highestRow = $sheet->getHighestRow();

        // Styling Header (Baris 1)
        $sheet->getStyle('A1:K1')->applyFromArray([
            'font' => [
                'bold' => true,
                'color' => ['rgb' => 'FFFFFF'],
                'size' => 11,
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['rgb' => '28A745'],
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
        ]);

        // Border Tabel
        $sheet->getStyle("A1:K{$highestRow}")->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['rgb' => 'D3D3D3'],
                ],
            ],
        ]);

        // Formating Kolom Harga Rupiah (#,##0)
        $sheet->getStyle("I2:I{$highestRow}")
            ->getNumberFormat()
            ->setFormatCode('#,##0');

        // Center Alignment untuk kolom tertentu
        $sheet->getStyle("A2:A{$highestRow}")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle("B2:B{$highestRow}")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle("D2:D{$highestRow}")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle("J2:J{$highestRow}")
            ->getAlignment()
            ->setHorizontal(Alignment::HORIZONTAL_RIGHT);

        return [];
    }
}
