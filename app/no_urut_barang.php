<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class no_urut_barang extends Model
{
    protected $table = 'no_urut_barang';
    protected $fillable = [
        'no_urut_barang', 'kategori_barang', 'Keterangan',
    ];
}
