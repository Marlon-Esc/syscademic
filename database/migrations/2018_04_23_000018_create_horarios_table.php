<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHorariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horarios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fk_docente')->unsigned()->nullable();
			$table->integer('fk_materia')->unsigned()->nullable();
			$table->tinyInteger('edo')->default(1);
			$table->foreign('fk_docente')->references('id')->on('docentes');
			$table->foreign('fk_materia')->references('id')->on('materias');
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
        Schema::dropIfExists('horarios');
    }
}
