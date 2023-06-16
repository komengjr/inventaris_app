<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSubVerifdatainventarisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_sub_verifdatainventaris', function (Blueprint $table) {
            $table->id('id_sub_verifdatainventaris');
            $table->string('kode_verif')->index();
            $table->string('id_inventaris')->index();
            $table->string('status_data_inventaris');
            $table->string('keterangan_data_inventaris');
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
        Schema::dropIfExists('tbl_sub_verifdatainventaris');
    }
}
