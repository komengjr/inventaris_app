<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterLokasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_lokasi', function (Blueprint $table) {
            $table->id('id_master_lokasi');
            $table->string('master_lokasi_code')->unique();
            $table->string('master_lokasi_name');
            $table->string('master_lokasi_status')->nullable();
            $table->text('master_lokasi_file')->nullable();
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
        Schema::dropIfExists('master_lokasi');
    }
}
