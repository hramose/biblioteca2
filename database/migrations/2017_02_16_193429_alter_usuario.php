<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUsuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->enum('tipo_usuario', ['USUARIO', 'ADMIN','EDITOR','REGISTRADO'])->default('REGISTRADO');
            $table->enum('Empresa', ['Avianca', 'Externo']);
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
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['tipo_usuario', 'avatar', 'location']);
        });
    }
}
