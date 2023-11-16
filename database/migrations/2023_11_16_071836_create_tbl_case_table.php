<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblCaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_case', function (Blueprint $table) {
            $table->id('id_case');
            $table->string('tiket_case');
            $table->string('judul_case');
            $table->string('keterangan_case');
            $table->longText('deskripsi_case');
            $table->string('kd_cabang');
            $table->string('status_case');
            $table->longText('jawaban_case')->nullable();
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
        Schema::dropIfExists('tbl_case');
    }
}
