<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblInvoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_invoice', function (Blueprint $table) {
            $table->id('id_invoice');
            $table->string('kd_invoice')->unique();
            $table->string('id_inventaris')->index();
            $table->string('status_invoice');
            $table->string('tgl_invoice');
            $table->text('file_invoice');
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
        Schema::dropIfExists('tbl_invoice');
    }
}
