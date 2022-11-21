<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubTblInventoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_tbl_inventory', function (Blueprint $table) {
            $table->id();
            $table->string('id_inventaris')->unique();
            $table->string('kd_inventaris')->index();
            $table->string('kd_lokasi')->index();
            $table->string('kd_jenis')->nullable();
            $table->string('nama_barang');
            $table->string('outlet')->nullable();
            $table->string('kd_cabang')->nullable();
            $table->string('th_pembuatan')->nullable();
            $table->string('th_perolehan')->nullable();
            $table->string('merk')->nullable();
            $table->string('type')->nullable();
            $table->string('no_seri')->nullable();
            $table->string('suplier')->nullable();
            $table->string('harga_perolehan')->nullable();
            $table->string('tgl_mutasi')->nullable();
            $table->string('tujuan_mutasi')->nullable();
            $table->string('nilai_buku')->nullable();
            $table->string('tgl_musnah')->nullable();
            $table->string('ket_musnah')->nullable();
            $table->string('kondisi_barang')->nullable();
            $table->string('jam_input')->nullable();
            $table->text('gambar')->nullable();
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
        Schema::dropIfExists('sub_tbl_inventory');
    }
}
