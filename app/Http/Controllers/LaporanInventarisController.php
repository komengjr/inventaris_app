<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventaris; // Sesuaikan dengan Model Inventaris Anda
use App\Models\Lokasi;     // Sesuaikan dengan Model Lokasi Anda
use Maatwebsite\Excel\Facades\Excel; // Jika menggunakan Laravel-Excel
use App\Exports\InventarisExport;     // Jika menggunakan Export Class
use Barryvdh\DomPDF\Facade\Pdf;       // Jika menggunakan DomPDF
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LaporanInventarisController extends Controller
{
    // 1. Method untuk memuat UI Modal Rekap Ruangan via AJAX
    public function cetakRekapRuangan(Request $request)
    {
        $lokasi = Lokasi::all();
        return view('laporan.modal_rekap_ruangan', compact('lokasi'));
    }

    // 2. Method Preview PDF per Ruangan (Return Base64)
    public function printDataRuanganCetak(Request $request)
    {
        $code = $request->input('code');
        $tgl_cetak = $request->input('tgl_cetak');
        $pj = $request->input('pj');

        $data = Inventaris::where('lokasi_id', $code)->get();

        $pdf = Pdf::loadView('laporan.pdf_ruangan', compact('data', 'tgl_cetak', 'pj'))
            ->setPaper('a4', 'portrait');

        // Mengembalikan format Base64 untuk ditampilkan di iFrame Blade
        return base64_encode($pdf->output());
    }

    // 3. Method Export Excel per Ruangan (AJAX / Direct)
    public function printDataRuanganExport(Request $request)
    {
        $code = $request->input('code');
        $fileName = 'inventaris_ruangan_' . $code . '_' . date('Ymd_His') . '.xlsx';

        // Mengunduh file Excel berdasarkan lokasi yang dipilih
        return Excel::download(new InventarisExport($code), $fileName);
    }

    // 4. METHOD BARU: Export Seluruh Data Inventaris ke Excel Direct Download
    public function exportExcelAll(Request $request)
    {
        $fileName = 'Rekap_Seluruh_Inventaris_' . date('Y-m-d_H-i-s') . '.xlsx';

        // Memanggil Class Export (atau download data langsung)
        return Excel::download(new InventarisExport('ALL'), $fileName);
    }

    // 5. METHOD BARU: Export Seluruh Data Inventaris ke PDF Direct Stream/Download
    public function exportPdfAll(Request $request)
    {
        ini_set('memory_limit', '512M');
        set_time_limit(300); // Naikkan timeout menjadi 5 menit

        $userCabang = Auth::user()->cabang;

        // Query select langsung menggunakan DB Facade
        $inventaris = DB::table('inventaris_data')
            ->where('inventaris_data_cabang', $userCabang)
            ->where('inventaris_data_status', '<', 3)
            ->orderBy('id_inventaris_data', 'DESC')
            ->get();

        $tgl_cetak = date('d-m-Y');
        $cabang = $userCabang;

        // Render PDF menggunakan view pdf_inventaris_all
        $pdf = Pdf::loadView('pdf.pdf-inventaris-all', compact('inventaris', 'tgl_cetak', 'cabang'))
            ->setPaper('a4', 'landscape');

        // Stream langsung ke browser (Tab Baru)
        return $pdf->stream('Rekap_Seluruh_Inventaris_' . date('Y-m-d') . '.pdf');
    }
}
