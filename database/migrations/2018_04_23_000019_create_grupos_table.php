<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGruposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('grado');

            $table->string('fk_panesc')->unique();
            $table->foreign('fk_panesc')->references('id')->on('planes_escolares');

            $table->integer('salon');

            $table->integer('fk_horario')->unsigned();
            $table->foreign('fk_horario')->references('id')->on('horarios');


            $table->integer('fk_carrera')->unsigned();
            $table->foreign('fk_carrera')->references('id')->on('carreras');

            $table->string('grupo');
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
        Schema::dropIfExists('grupos');
    }
}
