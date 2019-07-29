<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeodatacrTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('geodatacr', function (Blueprint $table) {
            $table->integerIncrements('id');

            $table->integer('provincia_id');
            $table->string('provincia_name');

            $table->integer('canton_id');
            $table->string('canton_name');

            $table->integer('distrito_id');
            $table->string('distrito_name');

            $table->integer('barrio_id');
            $table->string('barrio_name');

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
        Schema::dropIfExists('geodatacr');
    }
}
