<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblTtdTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_ttd', function (Blueprint $table) {
            $table->id('id_ttd');
            $table->string('kd_cabang')->unique();
            $table->string('ttd_1')->nullable();
            $table->string('ttd_2')->nullable();
            $table->string('ttd_3')->nullable();
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
        Schema::dropIfExists('tbl_ttd');
    }
}
