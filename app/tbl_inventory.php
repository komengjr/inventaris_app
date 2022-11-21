<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_inventory extends Model
{
    protected $table = 'tbl_inventory';
    protected $fillable = [
        'kd_inventaris','no_urut_barang', 'kd_cabang', 'nama_barang', 'gambar',
    ];
}
