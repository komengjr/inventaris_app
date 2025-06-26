<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterDepresiasiSubTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_depresiasi_sub', function (Blueprint $table) {
            $table->id('id_depresiasi_sub');
            $table->string('depresiasi_sub_code')->unique();
            $table->string('master_depresiasi_code');
            $table->string('depresiasi_sub_name');
            $table->string('depresiasi_sub_harga');
            $table->string('depresiasi_sub_masa');
            $table->string('depresiasi_sub_hitung');
            $table->bigInteger('depresiasi_sub_start');
            $table->bigInteger('depresiasi_sub_end');
            $table->string('depresiasi_sub_status');
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
        Schema::dropIfExists('master_depresiasi_sub');
    }
}
