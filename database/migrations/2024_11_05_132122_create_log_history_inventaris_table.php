<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogHistoryInventarisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_history_inventaris', function (Blueprint $table) {
            $table->id('id_log_hisstory');
            $table->string('no_log');
            $table->string('id_inventaris');
            $table->string('kategori_inventaris');
            $table->string('type_history');
            $table->text('before_history');
            $table->text('after_history');
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
        Schema::dropIfExists('log_history_inventaris');
    }
}
