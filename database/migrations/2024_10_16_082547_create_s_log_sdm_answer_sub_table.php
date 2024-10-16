<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSLogSdmAnswerSubTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_log_sdm_answer_sub', function (Blueprint $table) {
            $table->id();
            $table->string('kd_log_sdm_answer');
            $table->string('kd_s_log_sdm_form');
            $table->text('log_sdm_answer');
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
        Schema::dropIfExists('s_log_sdm_answer_sub');
    }
}
