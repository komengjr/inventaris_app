<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepresiasiPenyusutanLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('depresiasi_penyusutan_log', function (Blueprint $table) {
            $table->id('id_penyusutan_log');
            $table->string('penyusutan_log_code')->unique();
            $table->string('penyusutan_aset_code');
            $table->string('inventaris_data_code');
            $table->string('penyusutan_log_nilai');
            $table->string('penyusutan_log_persen');
            $table->string('penyusutan_log_harga');
            $table->date('penyusutan_log_date');
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
        Schema::dropIfExists('depresiasi_penyusutan_log');
    }
}
