<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblVerifdatainventarisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_verifdatainventaris', function (Blueprint $table) {
            $table->id('id_verifdatainventaris');
            $table->string('kode_verif')->unique();
            $table->string('tgl_verif');
            $table->string('tahun');
            $table->string('kd_cabang');
            $table->string('status_verif');
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
        Schema::dropIfExists('tbl_verifdatainventaris');
    }
}
