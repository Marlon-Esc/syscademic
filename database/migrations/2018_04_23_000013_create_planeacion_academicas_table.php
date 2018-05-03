<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlaneacionAcademicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planeacion_academicas', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha_creacion')->nullable();
			$table->integer('fk_materia')->unsigned()->nullable();
			$table->integer('fk_docente')->unsigned()->nullable();
			$table->string('linea_investigacion');
			$table->string('vinculos_asignatura');
			$table->foreign('fk_materia')->references('id')->on('materias');
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
        Schema::dropIfExists('planeacion_academicas');
    }
}
