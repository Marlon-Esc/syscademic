<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanEstudiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_estudios', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('fk_carrera')->unsigned()->nullable();
            $table->foreign('fk_carrera')->references('id')->on('carreras');

            $table->string('vigencia_plan');
            $table->string('revoe');

            $table->string('fk_planesc')->unique();
            $table->foreign('fk_planesc')->references('id')->on('planes_escolares');

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
        Schema::dropIfExists('plan_estudios');
    }
}
