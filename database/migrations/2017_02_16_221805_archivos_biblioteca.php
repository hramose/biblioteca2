<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ArchivosBiblioteca extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('archivos_biblioteca', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('filesize');
            $table->string('filemtime');
            $table->string('filedate');
            $table->string('filetype');
            $table->string('filename');
            $table->string('filename_url');
            $table->string('file_deleteURL');
            $table->string('email');
            $table->string('log_forma');
            $table->integer('nuevo');
            $table->string('revicion');
            $table->string('fecha_revicion');
            $table->string('mensaje');
            $table->timestamps();
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
        Schema::drop('archivos_biblioteca');
    }
}
