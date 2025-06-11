<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblPemnijamanReqBrgTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_pemnijaman_req_brg', function (Blueprint $table) {
            $table->id('id_req_brg');
            $table->string('peminjaman_req_code')->unique();
            $table->string('tiket_req');
            $table->string('id_inventaris');
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
        Schema::dropIfExists('tbl_pemnijaman_req_brg');
    }
}
