<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblMaintenanceAset extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_maintenance_aset', function (Blueprint $table) {
            $table->id('id_maintenance_aset');
            $table->string('kd_maintenance_aset')->unique();
            $table->string('id_inventaris')->index();
            $table->string('tgl_maintenance');
            $table->string('suplier_maintenance');
            $table->bigInteger('harga_maintenance');
            $table->text('file')->nullable();
            $table->text('ket_maintenance')->nullable();
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
        Schema::dropIfExists('tbl_maintenance_aset');
    }
}
