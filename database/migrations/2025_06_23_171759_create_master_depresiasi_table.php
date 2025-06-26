<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterDepresiasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_depresiasi', function (Blueprint $table) {
            $table->id('id_master_depresiasi');
            $table->string('master_depresiasi_code')->unique();
            $table->string('master_depresiasi_periode');
            $table->string('master_depresiasi_status');
            $table->date('master_depresiasi_tanggal');
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
        Schema::dropIfExists('master_depresiasi');
    }
}
