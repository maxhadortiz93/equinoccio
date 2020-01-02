<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('numero_unidad');
            $table->string('colaborador');
            $table->boolean('disponible');
            $table->boolean('act');
            $table->string('imagen_url');
            $table->timestamps();
            $table->unsignedBigInteger('user_id')->index(); // Clave Foranea para vincularlo a la tabla 
            $table->foreign('user_id')->references('id')->on('users');// Relacion de Tabla
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('drivers');
    }
}



