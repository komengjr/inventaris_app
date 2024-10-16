<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSLogSdmFormTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_log_sdm_form', function (Blueprint $table) {
            $table->id('id_s_log_sdm_form');
            $table->string('kd_s_log_sdm_form')->unique();
            $table->string('kd_log_sdm');
            $table->string('nama_s_log_sdm_form');
            $table->string('type_s_log_sdm_form');
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
        Schema::dropIfExists('s_log_sdm_form');
    }
}
