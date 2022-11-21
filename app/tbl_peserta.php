<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_peserta extends Model
{
    protected $table = 'tbl_peserta';
    protected $fillable = [
        'nama_peserta', 'status',
    ];
}
