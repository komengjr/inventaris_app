<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepresiasiPenyusutanAsetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('depresiasi_penyusutan_aset', function (Blueprint $table) {
            $table->id('id_penyusutan_aset');
            $table->string('penyusutan_aset_code')->unique();
            $table->string('penyusutan_aset_ke');
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
        Schema::dropIfExists('depresiasi_penyusutan_aset');
    }
}
