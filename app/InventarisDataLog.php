<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InventarisDataLog extends Model
{
    protected $table = 'inventaris_data_log';
    protected $fillable = [
        'id_inventaris_data',
        'inventaris_data_code',
        'inventaris_klasifikasi_code',
        'inventaris_data_number',
        'inventaris_data_location',
        'inventaris_data_name',
        'inventaris_data_jenis',
        'inventaris_data_cabang',
        'inventaris_data_merk',
        'inventaris_data_type',
        'inventaris_data_no_seri',
        'inventaris_data_suplier',
        'inventaris_data_harga',
        'inventaris_data_tgl_beli',
        'inventaris_data_kondisi',
        'inventaris_data_status',
        'inventaris_data_urut',
        'id_nomor_ruangan_cbaang',
    ];
}
