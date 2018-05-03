<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDesgloseHorariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('desglose_horarios', function (Blueprint $table) {
            $table->increments('id');
            $table->date('dia')->nullable();
            $table->time('inicio')->nullable();
            $table->time('fin')->nullable();
            $table->integer('hrs_totales');
            $table->timestamps();

            $table->integer('fk_horario')->unsigned()->nullable();
            $table->foreign('fk_horario')->references('id')->on('horarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('desglose_horarios');
    }
}
