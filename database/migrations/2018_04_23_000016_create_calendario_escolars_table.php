<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalendarioEscolarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calendarios_escolares', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('fk_ciclo')->unsigned()->nullable();
            $table->foreign('fk_ciclo')->references('id')->on('ciclos_escolares');

            $table->string('actividad');

            $table->string('fk_planesc')->unique();
            $table->foreign('fk_planesc')->references('id')->on('planes_escolares');

            $table->date('fecha_inicial')->nullable();
            $table->date('fecha_final')->nullable();
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
        Schema::dropIfExists('calendario_escolars');
    }
}
