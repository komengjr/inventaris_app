<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubTblNomorRuanganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_nomor_ruangan_cabang', function (Blueprint $table) {
            $table->id('id_nomor_ruangan_cbaang');
            $table->string('nomor_ruangan')->index();
            $table->string('kd_lokasi')->nullable();
            $table->string('kd_cabang')->index();
            $table->string('status_nomor_ruangan')->nullable();
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
        Schema::dropIfExists('tbl_nomor_ruangan_cabang');
    }
}
