<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBibliografiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bibliografias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo');
            $table->string('titulo');
            $table->string('autor');
            $table->string('editorial');
            $table->string('año');

            $table->integer('fk_materia')->unsigned()->nullable();
            $table->foreign('fk_materia')->references('id')->on('materias');
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
        Schema::dropIfExists('bibliografias');
    }
}
