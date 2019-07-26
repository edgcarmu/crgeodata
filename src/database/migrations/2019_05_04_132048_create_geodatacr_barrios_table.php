<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeodatacrBarriosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('geodatacr_barrios', function (Blueprint $table) {
            $table->bigIncrements('barrio_id');
            $table->bigInteger('distrito_id')->unsigned();
            $table->integer('tax_id');
            $table->string('name');

            $table->foreign('distrito_id')->references('distrito_id')->on('geodatacr_distritos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('geodatacr_barrios');
    }
}
