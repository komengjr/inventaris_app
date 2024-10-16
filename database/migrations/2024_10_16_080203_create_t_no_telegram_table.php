<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTNoTelegramTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_no_telegram', function (Blueprint $table) {
            $table->id('id_telegram');
            $table->string('chat_id')->unique();
            $table->string('kd_cabang');
            $table->string('no_telegram');
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
        Schema::dropIfExists('t_no_telegram');
    }
}
