<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblDepresiasiAsetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_depresiasi_aset', function (Blueprint $table) {
            $table->id('id_depresiasi_aset');
            $table->string('kd_depresiasi')->index();
            $table->string('id_inventaris')->unique();
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
        Schema::dropIfExists('tbl_depresiasi_aset');
    }
}
