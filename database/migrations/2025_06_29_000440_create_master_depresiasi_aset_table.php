<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterDepresiasiAsetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_depresiasi_aset', function (Blueprint $table) {
            $table->id('id_depresiasi_aset');
            $table->string('depresiasi_aset_code')->unique();
            $table->string('inventaris_data_code');
            $table->string('depresiasi_sub_code');
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
        Schema::dropIfExists('master_depresiasi_aset');
    }
}
