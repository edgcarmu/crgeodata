<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeodatacrDistritosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('geodatacr_distritos', function (Blueprint $table) {
            $table->bigIncrements('distrito_id');
            $table->bigInteger('canton_id')->unsigned();
            $table->integer('tax_id');
            $table->string('name');

            $table->foreign('canton_id')->references('canton_id')->on('geodatacr_cantones');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('geodatacr_distritos');
    }
}
