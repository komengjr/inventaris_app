<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class InventoryKsoController extends Controller
{
    /**
     * Simpan Data Barang KSO ke tabel `sub_tbl_inventory_kso`
     */
    public function dashboard_add_kso_save(Request $request)
    {
        try {
            // Ambil data entitas cabang
            $entitas = DB::table('tbl_entitas_cabang')
                ->join('tbl_cabang', 'tbl_cabang.kd_entitas_cabang', '=', 'tbl_entitas_cabang.kd_entitas_cabang')
                ->join('tbl_setting_cabang', 'tbl_setting_cabang.kd_cabang', '=', 'tbl_cabang.kd_cabang')
                ->where('tbl_setting_cabang.kd_cabang', Auth::user()->cabang)
                ->first();

            // Hitung nomor urut barang berdasarkan cabang
            $totalAwal = DB::table('sub_tbl_inventory_kso')
                ->where('kd_cabang', Auth::user()->cabang)
                ->count();

            // Ambil data ruangan/lokasi
            $lokasi = DB::table('tbl_nomor_ruangan_cabang')
                ->where('id_nomor_ruangan_cbaang', $request->no_ruangan)
                ->first();

            // Format Path Gambar
            $linkGambar = $request->link ? 'public/databrg/kso/' . Auth::user()->cabang . '/' . $request->link : null;

            // Generate Kode Unik Inventaris & Nomor Inventaris
            $nomorUrut    = $totalAwal + 1;
            $idInventaris = Auth::user()->cabang . date('YmdHis');
            $simbolEnt    = $entitas ? $entitas->simbol_entitas . '.' . $entitas->no_cabang : 'ENT';
            $kdLokasi     = $lokasi ? $lokasi->kd_lokasi : 'LOC';
            $tahunKso     = $request->tgl_kso ? date('Y', strtotime($request->tgl_kso)) : date('Y');

            $noInventaris = $nomorUrut . '/' . $request->kd_inventaris . '/' . $kdLokasi . '/' . $simbolEnt . '/' . $tahunKso;

            // Insert ke tabel sub_tbl_inventory_kso
            DB::table('sub_tbl_inventory_kso')->insert([
                'id_inventaris'           => $idInventaris,
                'no_inventaris'           => $noInventaris,
                'no_mou_id'               => $request->no_mou,
                'no_kso_alat'             => $request->no_kso,
                'kd_inventaris'           => $request->kd_inventaris,
                'kd_lokasi'               => $kdLokasi,
                'nama_barang'             => $request->nama_barang,
                'kd_cabang'               => Auth::user()->cabang,
                'tgl_kso'                 => $request->tgl_kso,
                'merk'                    => $request->merk,
                'type'                    => $request->type ?? null,
                'no_seri'                 => $request->seri,
                'suplier'                 => $request->suplier ?? null,
                'harga_perolehan'         => $request->harga_perolehan ?? null,
                'kondisi_barang'          => $request->kondisi_barang ?? null,
                'no'                      => $nomorUrut,
                'id_nomor_ruangan_cbaang' => $request->no_ruangan,
                'gambar'                  => $linkGambar,
                'file'                    => $request->file ?? null,
                'status_barang'           => 1,
                'created_at'              => now(),
                'updated_at'              => now(),
            ]);

            return response()->html('Mohon Menunggu..');
        } catch (\Throwable $th) {
            return response()->json(0);
        }
    }

    public function storeDocument(Request $request)
    {
        $request->validate([
            'id_inventaris' => 'required',
            'periode_kso'   => 'required|string',
            'file_kso'      => 'required|file|mimes:pdf,doc,docx|max:5120',
        ]);

        try {
            $fileName = null;
            if ($request->hasFile('file_kso')) {
                $file     = $request->file('file_kso');
                $fileName = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());

                // Cukup tulis 'doc_kso' (menggunakan disk 'public')
                $file->storeAs('doc_kso', $fileName, 'public');
            }

            DB::table('document_kso')->insert([
                'id_inventaris' => $request->id_inventaris,
                'periode_kso'   => $request->periode_kso,
                'file_kso'      => $fileName,
                'created_at'    => now(),
                'updated_at'    => now(),
            ]);

            return response()->json([
                'status'  => 'success',
                'message' => 'Dokumen KSO berhasil disimpan!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Gagal menyimpan dokumen: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update Dokumen KSO
     */
    public function updateDocument(Request $request)
    {
        $request->validate([
            'id_document_kso' => 'required',
            'periode_kso'     => 'required|string',
            'file_kso'        => 'nullable|file|mimes:pdf,doc,docx|max:5120',
        ]);

        try {
            $doc = DB::table('document_kso')->where('id_document_kso', $request->id_document_kso)->first();

            if (!$doc) {
                return response()->json([
                    'status'  => 'error',
                    'message' => 'Data dokumen tidak ditemukan!'
                ], 404);
            }

            $fileName = $doc->file_kso;

            if ($request->hasFile('file_kso')) {
                // Hapus berkas lama jika ada
                if ($doc->file_kso && Storage::disk('public')->exists('doc_kso/' . $doc->file_kso)) {
                    Storage::disk('public')->delete('doc_kso/' . $doc->file_kso);
                }

                $file     = $request->file('file_kso');
                $fileName = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());
                $file->storeAs('doc_kso', $fileName, 'public');
            }

            DB::table('document_kso')->where('id_document_kso', $request->id_document_kso)->update([
                'periode_kso' => $request->periode_kso,
                'file_kso'    => $fileName,
                'updated_at'  => now(),
            ]);

            return response()->json([
                'status'  => 'success',
                'message' => 'Dokumen KSO berhasil diperbarui!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Gagal memperbarui dokumen: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Hapus Dokumen KSO
     */
    public function destroyDocument(Request $request)
    {
        try {
            $doc = DB::table('document_kso')->where('id_document_kso', $request->id_document_kso)->first();

            if ($doc) {
                if ($doc->file_kso && Storage::disk('public')->exists('doc_kso/' . $doc->file_kso)) {
                    Storage::disk('public')->delete('doc_kso/' . $doc->file_kso);
                }

                DB::table('document_kso')->where('id_document_kso', $request->id_document_kso)->delete();

                return response()->json([
                    'status'  => 'success',
                    'message' => 'Dokumen KSO berhasil dihapus!'
                ]);
            }

            return response()->json([
                'status'  => 'error',
                'message' => 'Data tidak ditemukan!'
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Gagal menghapus dokumen: ' . $e->getMessage()
            ], 500);
        }
    }
}
