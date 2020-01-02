<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id'); // ID autoincrementable 
            $table->string('type'); // tipo de usuario
            $table->string('birthdate'); // cumpleanos
            $table->string('genero'); // masculino o femenino
            $table->string('cedula'); // DNI o identificacion
            $table->string('name'); // Nombre del Usuario
            $table->string('apellido'); // Nombre del Usuario         
            $table->string('email')->unique(); // Correo y Metodo de Acceso
            $table->timestamp('email_verified_at')->nullable(); // Verificacion de Correo
            $table->string('password'); // Clave para el acceso
            $table->rememberToken(); // Token para quedarse logueado. 
            $table->timestamps(); // Modificaciones de Archivo 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
