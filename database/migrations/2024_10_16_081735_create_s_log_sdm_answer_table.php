<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSLogSdmAnswerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_log_sdm_answer', function (Blueprint $table) {
            $table->id('id_log_sdm_answer');
            $table->string('kd_log_sdm_answer')->unique();
            $table->string('kd_log_sdm');
            $table->string('user_answer');
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
        Schema::dropIfExists('s_log_sdm_answer');
    }
}
