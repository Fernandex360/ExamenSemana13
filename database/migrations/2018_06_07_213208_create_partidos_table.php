<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partidos', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->time('hora');
            $table->unsignedInteger('id_lugares');
            $table->foreign('id_lugares')->references('id')->on('lugares');
            $table->unsignedInteger('equipo1');
            $table->foreign('equipo1')->references('id')->on('paises');
            $table->unsignedInteger('equipo2');
            $table->foreign('equipo2')->references('id')->on('paises');
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
        Schema::dropIfExists('partidos');
    }
}
