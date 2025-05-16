<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventarisCatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventaris_cat', function (Blueprint $table) {
            $table->id('id_inventaris_cat');
            $table->string('inventaris_cat_code')->unique();
            $table->string('inventaris_cat_name');
            $table->text('inventaris_cat_file')->nullable();
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
        Schema::dropIfExists('inventaris_cat');
    }
}
