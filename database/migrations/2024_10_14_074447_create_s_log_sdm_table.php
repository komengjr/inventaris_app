<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSLogSdmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_log_sdm', function (Blueprint $table) {
            $table->id('s_id_log');
            $table->string('kd_log_sdm')->unique();
            $table->string('nama_log_sdm');
            $table->string('kd_cabang');
            $table->string('ket_log_sdm');
            $table->string('status_log_sdm');
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
        Schema::dropIfExists('s_log_sdm');
    }
}
