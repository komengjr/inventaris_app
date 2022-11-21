<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class data_peserta extends Model
{
    protected $table = 'data_peserta';
    protected $fillable = [
        'kode_peserta', 'nama_peserta', 'nir','email', 'no_hp', 'asal_pengda',
    ];
}
