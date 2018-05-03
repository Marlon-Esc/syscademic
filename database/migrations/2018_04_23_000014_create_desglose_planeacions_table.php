<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDesglosePlaneacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('desglose_planeaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('semana');
            $table->date('fecha');
            $table->integer('horas');

            $table->integer('fk_tema')->unsigned()->nullable();
            $table->foreign('fk_tema')->references('id')->on('temas');

            $table->string('aprendisaje_esperado');
            $table->string('actividad_aprendisaje');
            $table->string('evidencias_aprendido');
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
        Schema::dropIfExists('desglose_planeacions');
    }
}
