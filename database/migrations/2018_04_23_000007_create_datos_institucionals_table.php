<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatosInstitucionalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datos_institucionales', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mision');
			$table->string('vision');
			$table->string('filosofia');
			$table->string('direccion');
			$table->string('campus');
			$table->string('telefono');
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
        Schema::dropIfExists('datos_institucionals');
    }
}
