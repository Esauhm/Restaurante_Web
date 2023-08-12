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
        Schema::create('carritos', function (Blueprint $table) {
            $table->id('id_carrito');
            $table->bigInteger('id_usuario')->unsigned();
            $table->double('total_pagar');
            $table->timestamps();

           
        });
        Schema::table('carritos', function (Blueprint $table) {
            // Agrega la restricción de clave foránea con la tabla users
            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carritos');
    }
};
