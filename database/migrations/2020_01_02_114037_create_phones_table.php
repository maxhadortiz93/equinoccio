<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phones', function (Blueprint $table) {
            $table->bigIncrements('id'); // ID autoincrementable 
            $table->string('phone_movil'); // Telefono Movil
            $table->string('phone_local'); // Telefono Local
            $table->unsignedBigInteger('user_id')->index(); // Clave Foranea para vincularlo a la tabla 
            $table->timestamps();// Modificaciones de Archivo 
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
        Schema::dropIfExists('phones');
    }
}
