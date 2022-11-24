<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sub_tbl_inventory extends Model
{
    protected $table = 'sub_tbl_inventory';
    protected $fillable = [
        'id_inventaris','kd_inventaris','kd_lokasi', 'nama_barang', 'outlet','kd_cabang', 'th_pembuatan', 'th_perolehan','merk','type','no_seri','suplier','harga_perolehan',
        'tgl_mutasi','tujuan_mutasi','nilai_buku','tgl_musnah','ket_musnah','kondisi_barang','jam_input','gambar',
    ];
}
