<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LogBiblioteca extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_biblioteca', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            $table->enum('tipo' ,['recupera','intento','logout','login','lectura','descarga','denegar','actividad','destacado'])->default('actividad');

            $table->integer('archivos_biblioteca_id')->unsigned();
            $table->foreign('archivos_biblioteca_id')->references('id')->on('archivos_biblioteca');

            $table->string('archivo');
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
        Schema::drop('users');
    }
}
