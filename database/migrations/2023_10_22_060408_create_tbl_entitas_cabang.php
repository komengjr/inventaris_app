<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblEntitasCabang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_entitas_cabang', function (Blueprint $table) {
            $table->id('id_entitas_cabang');
            $table->string('kd_entitas_cabang');
            $table->string('nama_entitas_cabang');
            $table->string('simbol_entitas');
            $table->string('status_entitas_cabang');
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
        Schema::dropIfExists('tbl_entitas_cabang');
    }
}
