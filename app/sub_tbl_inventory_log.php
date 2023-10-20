<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sub_tbl_inventory_log extends Model
{
    protected $table = 'sub_tbl_inventory_log';
    protected $fillable = [
        'kd_inventaris','kd_lokasi','kd_jenis', 'nama_barang','kd_cabang', 'th_perolehan','merk','type','no_seri','suplier','harga_perolehan','tgl_beli','kondisi_barang'
    ];
}
