<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParticipacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('anio');
			
			$table->integer('fk_alumno')->unsigned()->nullable();
            $table->foreign('fk_alumno')->references('id')->on('alumnos');

			$table->integer('fk_disciplina')->unsigned()->nullable();
            $table->foreign('fk_disciplina')->references('id')->on('diciplinas');

			$table->integer('fk_ciclo')->unsigned()->nullable();
            $table->foreign('fk_ciclo')->references('id')->on('ciclos_escolares');
			
			

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
        Schema::dropIfExists('participacions');
    }
}
