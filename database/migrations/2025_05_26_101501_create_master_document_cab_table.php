<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterDocumentCabTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_doocument_cab', function (Blueprint $table) {
            $table->id('id_document_cabang');
            $table->string('master_document_code');
            $table->string('master_document_no');
            $table->string('kd_cabang');
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
        Schema::dropIfExists('master_doocument_cab');
    }
}
