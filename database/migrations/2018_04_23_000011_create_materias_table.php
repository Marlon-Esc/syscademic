<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMateriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('objetivo_gnral');
            $table->integer('hrs_docente');
            $table->integer('hrs_independientes');
            $table->integer('creditos');
            $table->string('instalaciones');
            $table->integer('grado');

            $table->integer('fk_plan')->unsigned()->nullable();
            $table->foreign('fk_plan')->references('id')->on('plan_estudios');
            
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
        Schema::dropIfExists('materias');
    }
}
