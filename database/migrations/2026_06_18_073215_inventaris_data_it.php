<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InventarisDataIt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventaris_data_it', function (Blueprint $table) {
            $table->id('id_inventaris_data_it');
            $table->string('inventaris_data_it_code')->unique();
            $table->string('inventaris_data_code');
            $table->string('inventaris_data_it_cabang');
            $table->string('inventaris_data_it_status');
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
        Schema::dropIfExists('inventaris_data_it');
    }
}
