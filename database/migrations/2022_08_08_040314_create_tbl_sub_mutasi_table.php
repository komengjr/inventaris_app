<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSubMutasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_sub_mutasi', function (Blueprint $table) {
            $table->id('id_sub_mutasi');
            $table->string('kd_mutasi')->index();
            $table->string('id_inventaris')->index();
            $table->string('tgl_verif_mutasi')->nullable();
            $table->string('tgl_verif_mutasi')->nullable();
            $table->string('kd_lokasi_awal')->nullable();
            $table->string('kd_lokasi_tujuan')->nullable();
            $table->string('kd_cabang_awal')->nullable();
            $table->string('kd_cabang_tujuan')->nullable();
            $table->string('ket')->nullable();
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
        Schema::dropIfExists('tbl_sub_mutasi');
    }
}
