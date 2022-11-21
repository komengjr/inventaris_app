<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_mutasi extends Model
{
    protected $table = 'tbl_mutasi';
    protected $fillable = [
        'kd_mutasi','kd_cabang', 'jenis_mutasi', 'asal_mutasi', 'target_mutasi',
        'departemen','divisi', 'penanggung_jawab', 'tanggal_buat', 'penerima', 'menyetujui', 'yang_menyerahkan', 'ket',
    ];
}
