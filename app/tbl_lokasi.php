<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_lokasi extends Model
{
    protected $table = 'tbl_lokasi';
    protected $fillable = [
        'kd_lokasi', 'nama_lokasi', 'gambar',
    ];
}
