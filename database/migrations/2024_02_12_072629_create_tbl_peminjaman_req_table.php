<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblPeminjamanReqTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_pemnijaman_req', function (Blueprint $table) {
            $table->id('id_req');
            $table->string('tiket_req')->unique();
            $table->string('cabang_req');
            $table->string('cabang_tujuan');
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
        Schema::dropIfExists('tbl_pemnijaman_req');
    }
}
