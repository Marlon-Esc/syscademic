<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlantillaDocentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plantilla_docentes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fk_carrera')->unsigned()->nullable();
            $table->foreign('fk_carrera')->references('id')->on('carreras');

			$table->integer('grado');
			$table->string('fk_plnesc')->unique();
            $table->foreign('fk_plnesc')->references('id')->on('planes_escolares');

			$table->integer('fk_materia')->unsigned()->nullable();
            $table->foreign('fk_materia')->references('id')->on('materias');
			
            $table->integer('fk_administrativo')->unsigned()->nullable();
            $table->foreign('fk_administrativo')->references('id')->on('administrativos');
			

			$table->integer('fk_docente')->unsigned()->nullable();
			$table->foreign('fk_docente')->references('id')->on('docentes');
			
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
        Schema::dropIfExists('plantilla_docentes');
    }
}
