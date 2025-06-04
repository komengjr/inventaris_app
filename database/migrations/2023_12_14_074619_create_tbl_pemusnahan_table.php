<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblPemusnahanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_pemusnahan', function (Blueprint $table) {
            $table->id('id_pemusnahan');
            $table->string('kd_pemusnahan')->unique();
            $table->string('id_inventaris');
            $table->string('kd_cabang');
            $table->string('penggagas');
            $table->string('dasar_pengajuan');
            $table->string('user_verifikasi');
            $table->string('verifikasi')->nullable();
            $table->string('user_persetujuan');
            $table->string('persetujuan')->nullable();
            $table->string('eksekusi')->nullable();
            $table->string('user_1')->nullable();
            $table->string('user_2')->nullable();
            $table->string('user_3')->nullable();
            $table->string('status_pemusnahan')->nullable();
            $table->string('tgl_pemusnahan')->nullable();
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
        Schema::dropIfExists('tbl_pemusnahan');
    }
}
