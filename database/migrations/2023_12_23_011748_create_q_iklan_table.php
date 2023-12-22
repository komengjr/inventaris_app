<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQIklanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('q_iklan', function (Blueprint $table) {
            $table->id('id_iklan');
            $table->string('kd_iklan')->unique();
            $table->string('judul_iklan');
            $table->string('status_iklan');
            $table->text('ket_iklan');
            $table->text('link');
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
        Schema::dropIfExists('q_iklan');
    }
}
