<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterDocumentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_doocument', function (Blueprint $table) {
            $table->id('id_master_document');
            $table->string('master_document_code')->unique();
            $table->string('nama_document');
            $table->string('no_document');
            $table->string('tgl_document');
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
        Schema::dropIfExists('master_doocument');
    }
}
