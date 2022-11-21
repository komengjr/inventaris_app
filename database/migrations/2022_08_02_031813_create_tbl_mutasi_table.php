<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblMutasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_mutasi', function (Blueprint $table) {
            $table->id('id_mutasi');
            $table->string('kd_mutasi')->unique();
            $table->string('kd_cabang');
            $table->string('jenis_mutasi');
            $table->string('asal_mutasi');
            $table->string('target_mutasi');
            $table->string('departemen')->nullable();
            $table->string('divisi')->nullable();
            $table->string('penanggung_jawab');
            $table->string('tanggal_buat');
            $table->string('penerima');
            $table->string('menyetujui');
            $table->string('yang_menyerahkan');
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
        Schema::dropIfExists('tbl_mutasi');
    }
}
