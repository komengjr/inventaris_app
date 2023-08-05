<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblDepresiasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_depresiasi', function (Blueprint $table) {
            $table->id('id_depresisasi');
            $table->string('kd_depresiasi')->unique();
            $table->string('klasifikasi_aset');
            $table->string('harga_perolhean');
            $table->string('masa_depresiasi');
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
        Schema::dropIfExists('tbl_depresiasi');
    }
}
