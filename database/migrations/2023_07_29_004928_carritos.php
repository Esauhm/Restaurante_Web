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
        $table->unsignedBigInteger('id_usuario');
        $table->unsignedBigInteger('id_producto');
        $table->integer('cantidad');
        $table->dateTime('fecha_agregado')->default(DB::raw('CURRENT_TIMESTAMP'));
    });
        //
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
