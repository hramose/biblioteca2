<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CambiarPerfilesUsuarioBiblioteca extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('perfiles_usuario_biblioteca', function (Blueprint $table) {

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
        Schema::table('perfiles_usuario_biblioteca', function (Blueprint $table) {
            $table->dropColumn(['updated_at', 'created_at']);
        });
    }
}
