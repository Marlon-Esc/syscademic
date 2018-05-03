<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarrerasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carreras', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre') ;
            $table->integer('fk_administrativo')->unsigned()->nullable();
            $table->foreign('fk_administrativo')->references('id')->on('administrativos');
            $table->string('mision');
            $table->string('vision');
            $table->string('telefono');
            $table->string('correo');
            $table->string('perfil_egre');
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
        Schema::dropIfExists('carreras');
    }
}
