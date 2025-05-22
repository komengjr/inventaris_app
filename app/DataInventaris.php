<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataInventaris extends Model
{
    protected $table = 'inventaris_data';
    protected $fillable = [
        'id_inventaris_data',
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
    ];
}
