<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubTblInventoryKsoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_tbl_inventory_kso', function (Blueprint $table) {
            $table->id();
            $table->string('id_inventaris')->unique();
            $table->string('no_inventaris')->nullable();
            $table->string('no_mou_id')->nullable();
            $table->string('no_kso_alat')->nullable();
            $table->string('kd_inventaris')->index();
            $table->string('kd_lokasi')->index();
            $table->string('nama_barang');
            $table->string('kd_cabang')->nullable();
            $table->string('tgl_kso')->nullable();
            $table->string('merk')->nullable();
            $table->string('type')->nullable();
            $table->string('no_seri')->nullable();
            $table->string('suplier')->nullable();
            $table->string('harga_perolehan')->nullable();
            $table->string('kondisi_barang')->nullable();
            $table->string('no')->nullable();
            $table->string('id_nomor_ruangan_cbaang')->nullable();
            $table->text('gambar')->nullable();
            $table->text('file')->nullable();
            $table->integer('status_barang')->nullable();
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
        Schema::dropIfExists('sub_tbl_inventory_kso');
    }
}
