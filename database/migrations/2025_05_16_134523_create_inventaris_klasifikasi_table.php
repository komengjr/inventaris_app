<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventarisKlasifikasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventaris_klasifikasi', function (Blueprint $table) {
            $table->id('id_inventaris_klasifikasi');
            $table->string('inventaris_klasifikasi_code')->unique();
            $table->string('inventaris_cat_code');
            $table->string('inventaris_klasifikasi_name');
            $table->text('inventaris_klasifikasi_file')->nullable();
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
        Schema::dropIfExists('inventaris_klasifikasi');
    }
}
