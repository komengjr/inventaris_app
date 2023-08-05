<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubTblInventoryTemp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_tbl_inventory_temp', function (Blueprint $table) {
            $table->id('id_sub_tbl_iventory_temp');
            $table->string('no_inventaris');
            $table->string('nama_barang');
            $table->string('merk');
            $table->string('harga');
            $table->string('kd_cabang');
            $table->string('ket');
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
        Schema::dropIfExists('sub_tbl_inventory_temp');
    }
}
