<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParcialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parciales', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fk_materia')->unsigned();
            $table->foreign('fk_materia')->references('id')->on('materias');
            $table->date('p1');
            $table->date('p2');
            $table->date('pf');
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
        Schema::dropIfExists('parcials');
    }
}
