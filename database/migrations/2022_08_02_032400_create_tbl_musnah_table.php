<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblMusnahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_musnah', function (Blueprint $table) {
            $table->id('id_musnah');
            $table->string('no_surat')->unique();
            $table->string('kd_inventaris');
            $table->string('kd_cabang');
            $table->string('tgl_buat');
            $table->string('dasar_pengajuan');
            $table->string('penggagas');
            $table->string('Verifikasi_kondisi');
            $table->string('user_verifikasi');
            $table->string('persetujuan');
            $table->string('user_persetujuan');
            $table->string('eksekusi');
            $table->string('user_eksekusi');
            $table->string('ket')->nullable();
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
        Schema::dropIfExists('tbl_musnah');
    }
}
