<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCicloEscolarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ciclos_escolares', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mes_inicio');
			$table->string('mes_fin');
			$table->string('anio');
			$table->string('fecha_curso');
			$table->string('fk_plnesc')->unique();
			$table->integer('sem_program');
			$table->integer('sem_efec');
			$table->foreign('fk_plnesc')->references('id')->on('planes_escolares');
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
        Schema::dropIfExists('ciclo_escolars');
    }
}
