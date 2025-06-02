<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblPeminjamanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_peminjaman', function (Blueprint $table) {
            $table->id('id_pinjam');
            $table->string('tiket_peminjaman')->unique();
            $table->string('nama_kegiatan');
            $table->string('tujuan_cabang');
            $table->string('tgl_pinjam');
            $table->string('batas_tgl_pinjam')->nullable();
            $table->string('pj_pinjam');
            $table->string('pj_cabang')->nullable();
            $table->string('status_pinjam');
            $table->string('token_pinjam')->nullable();
            $table->string('kd_cabang');
            $table->string('pj_pinjam_cabang')->nullable();
            $table->string('tgl_selesai')->nullable();
            $table->text('deskripsi')->nullable();
            $table->text('deskripsi_tujuan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_peminjaman');
    }
}
