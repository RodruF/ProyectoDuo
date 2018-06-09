<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animals', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('idJaula');
            $table->unsignedInteger('idEspecie');
            $table->string('nombre');
            $table->string('descripcion');
            $table->binary('año');
            $table->binary('image'); // for blob
            $table->foreign('idEspecie')->references('id')->on('especies');
            $table->foreign('idJaula')->references('id')->on('jaulas');
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
        Schema::dropIfExists('animals');
    }
}
