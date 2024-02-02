<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblVerifdatainventarisLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_verifdatainventaris_log', function (Blueprint $table) {
            $table->id();
            $table->string('id_sub_verifdatainventaris')->index();
            $table->string('id_inventaris');
            $table->string('tgl_stockopnemae');
            $table->string('status_stockopname');
            $table->string('ket_stockopname');
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
        Schema::dropIfExists('tbl_verifdatainventaris_log');
    }
}
