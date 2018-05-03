<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('matricula');
            $table->string('nombres');
            $table->string('a_pat');
            $table->string('a_mat');
            $table->string('sexo');
            $table->string('celular');
            $table->string('foto');
            $table->string('tipo_ingreso');
            $table->string('inscripcion');

            $table->integer('fk_ciclo')->unsigned()->nullable();
            $table->foreign('fk_ciclo')->references('id')->on('ciclos_escolares');

            $table->integer('fk_grupo')->unsigned()->nullable();
            $table->foreign('fk_grupo')->references('id')->on('grupos');

            $table->tinyInteger('edo')->default(1);
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
        Schema::dropIfExists('alumnos');
    }
}
