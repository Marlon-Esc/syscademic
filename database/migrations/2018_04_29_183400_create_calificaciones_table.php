<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalificacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calificaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('valor');
            $table->integer('fk_ciclo')->unsigned()->nullable();
            $table->integer('fk_alumno')->unsigned()->nullable();
            $table->integer('fk_materia')->unsigned()->nullable();
            $table->foreign('fk_ciclo')->references('id')->on('ciclos_escolares');
            $table->foreign('fk_alumno')->references('id')->on('alumnos');
            $table->foreign('fk_materia')->references('id')->on('materias');
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
        Schema::dropIfExists('calificacions');
    }
}
