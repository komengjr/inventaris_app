<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSubPeminjamanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_sub_peminjaman', function (Blueprint $table) {
            $table->id('id_sub_peminjaman');
            $table->string('id_pinjam')->index();
            $table->string('id_inventaris')->index();
            $table->string('tgl_pinjam_barang')->nullable();
            $table->string('tgl_kembali_barang')->nullable();
            $table->string('status_sub_peminjaman');
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
        Schema::dropIfExists('tbl_sub_peminjaman');
    }
}
