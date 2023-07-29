<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id('id_usuario');
            $table->string('nombre_usuario', 50);
            $table->string('apellido_usuario', 50);
            $table->string('correo', 50);
            $table->string('telefono', 11);
            $table->string('direccion', 150);
            $table->string('sexo', 10);
            $table->unsignedBigInteger('rol');
            $table->string('password', 60);
        });

        Schema::table('usuarios', function (Blueprint $table) {
            $table->foreign('rol')->references('id_rol')->on('roles')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
};
