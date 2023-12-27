<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZLogActifityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('z_log_actifity', function (Blueprint $table) {
            $table->id('id_log');
            $table->string('ip_addres');
            $table->string('user');
            $table->string('cabang');
            $table->string('device');
            $table->string('os');
            $table->string('menu');
            $table->text('browser');
            $table->text('ket_log');
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
        Schema::dropIfExists('z_log_actifity');
    }
}
