<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->bigIncrements('id'); // ID autoincrementable 
            $table->string('country'); // Pais donde vive
            $table->string('city'); // Ciudad donde vive
            $table->string('location'); // Ubicacion mas precisa
            $table->string('code_postal'); // Codigo Postal
            $table->unsignedBigInteger('user_id')->index(); // Clave Foranea para vincularlo a la tabla 
            $table->timestamps(); // Modificaciones de Archivo 
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
        Schema::dropIfExists('locations');
    }
}
