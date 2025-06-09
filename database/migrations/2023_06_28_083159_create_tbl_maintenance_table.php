<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblMaintenanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_maintenance', function (Blueprint $table) {
            $table->id('id_maintenance');
            $table->string('kd_maintenance')->unique();
            $table->string('id_inventaris')->index();
            $table->string('pelapor');
            $table->text('dasar_pengajuan');
            $table->text('mengetahui');
            $table->string('kd_cabang');
            $table->string('tgl_mulai');
            $table->string('tgl_akhir')->nullable();
            $table->string('status_maintenance');
            $table->text('token_maintenance');
            $table->string('ket_maintenance');
            $table->text('file_maintenance');
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
        Schema::dropIfExists('tbl_maintenance');
    }
}
