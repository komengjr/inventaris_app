<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventarisDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventaris_data', function (Blueprint $table) {
            $table->id('id_inventaris_data');
            $table->string('inventaris_data_code')->unique();
            $table->string('inventaris_klasifikasi_code');
            $table->string('inventaris_data_number');
            $table->string('inventaris_data_name');
            $table->string('inventaris_data_location');
            $table->string('inventaris_data_jenis');
            $table->bigInteger('inventaris_data_harga');
            $table->string('inventaris_data_merk');
            $table->string('inventaris_data_type');
            $table->string('inventaris_data_no_seri');
            $table->string('inventaris_data_suplier');
            $table->string('inventaris_data_kondisi');
            $table->integer('inventaris_data_status');
            $table->date('inventaris_data_tgl_beli');
            $table->string('inventaris_data_cabang');
            $table->integer('inventaris_data_urut');
            $table->text('inventaris_data_file');
            $table->string('id_nomor_ruangan_cbaang');
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
        Schema::dropIfExists('inventaris_data');
    }
}
