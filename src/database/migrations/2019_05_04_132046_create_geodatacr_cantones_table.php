<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeodatacrCantonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('geodatacr_cantones', function (Blueprint $table) {
            $table->bigIncrements('canton_id');
            $table->bigInteger('provincia_id')->unsigned();
            $table->integer('tax_id');
            $table->string('name');

            $table->foreign('provincia_id')->references('provincia_id')->on('geodatacr_provincias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('geodatacr_cantones');
    }
}
