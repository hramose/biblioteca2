<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CambiarArchivosPerfilesBiblioteca extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('archivos_perfiles_biblioteca', function (Blueprint $table) {

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
        Schema::table('archivos_perfiles_biblioteca', function (Blueprint $table) {
            $table->dropColumn(['updated_at', 'created_at']);
        });
    }
}
