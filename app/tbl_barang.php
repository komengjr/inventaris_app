<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_barang extends Model
{
    protected $table = 'sub_tbl_inventory';
    protected $fillable = [
        'id_inventaris',
        'kd_inventaris',
        'no_inventaris',
        'kd_lokasi',
        'nama_barang',
        'outlet',
        'kd_cabang',
        'th_pembuatan',
        'th_perolehan',
        'merk',
        'type',
        'no_seri',
        'suplier',
        'harga_perolehan',
        'tgl_mutasi',
        'tujuan_mutasi',
        'nilai_buku',
        'tgl_beli',
        'ket_musnah',
        'kondisi_barang',
        'jam_input',
        'gambar',
        'id_nomor_ruangan_cbaang'
    ];
}
