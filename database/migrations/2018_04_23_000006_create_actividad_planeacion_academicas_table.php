<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActividadPlaneacionAcademicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividad_planeacion_academicas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('estapa_organi');
            $table->string('metodo_didactico');
            $table->string('elementos_evaluar');
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
        Schema::dropIfExists('actividad_planeacion_academicas');
    }
}
