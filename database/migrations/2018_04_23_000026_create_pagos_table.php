<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('folio');
            $table->float('monto',9,2);
            $table->tinyInteger('beca');

            $table->integer('fk_alumno')->unsigned()->nullable();
            $table->foreign('fk_alumno')->references('id')->on('alumnos');

            $table->integer('fk_concepto')->unsigned()->nullable();
            $table->foreign('fk_concepto')->references('id')->on('conceptos');

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
        Schema::dropIfExists('pagos');
    }
}
