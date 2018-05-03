<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObservacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('observaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('observ_institu');
			$table->integer('fk_administrativo')->unsigned()->nullable();
			$table->integer('fk_docente')->unsigned()->nullable();
			$table->string('observ_visit');
			$table->foreign('fk_administrativo')->references('id')->on('administrativos');
			$table->foreign('fk_docente')->references('id')->on('docentes');
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
        Schema::dropIfExists('observacions');
    }
}
