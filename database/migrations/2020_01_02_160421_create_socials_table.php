<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('socials', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('url');
            $table->string('act'); 
            $table->string('facebook');
            $table->string('twitter');
            $table->string('instagram');
            $table->string('youtube');
            $table->string('pagina_web'); 
            $table->string('id_google'); 
            $table->string('id_token'); 
            $table->string('url_imagen'); 
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
        Schema::dropIfExists('socials');
    }
}
