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
