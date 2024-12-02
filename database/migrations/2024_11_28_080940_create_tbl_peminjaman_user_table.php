<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblPeminjamanUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_peminjaman_user', function (Blueprint $table) {
            $table->id('id_peminjaman_user');
            $table->string('tiket_peminjaman_user')->unique();
            $table->string('cabang');
            $table->string('user');
            $table->string('tgl_req');
            $table->string('kategori_req');
            $table->longText('deskripsi_req');
            $table->string('status_req');
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
        Schema::dropIfExists('tbl_peminjaman_user');
    }
}
