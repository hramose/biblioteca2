<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ArchivosPerfilesBiblioteca extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('archivos_perfiles_biblioteca', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('archivos_biblioteca_id')->unsigned();
            $table->foreign('archivos_biblioteca_id')->references('id')->on('archivos_biblioteca');

            $table->integer('perfiles_biblioteca_id')->unsigned();
            $table->foreign('perfiles_biblioteca_id')->references('id')->on('perfiles_biblioteca');


            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('archivos_perfiles_biblioteca');
    }
}
