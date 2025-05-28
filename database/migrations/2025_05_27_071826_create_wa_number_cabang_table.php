<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWaNumberCabangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wa_number_cabang', function (Blueprint $table) {
            $table->id('id_wa_number');
            $table->string('wa_number_code')->unique();
            $table->string('wa_number_name');
            $table->string('wa_number_no');
            $table->string('kd_cabang');
            $table->string('wa_number_akses');
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
        Schema::dropIfExists('wa_number_cabang');
    }
}
