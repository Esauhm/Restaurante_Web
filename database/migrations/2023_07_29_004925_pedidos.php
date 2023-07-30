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
        //
        Schema::create('pedidos', function (Blueprint $table) {
            $table->bigIncrements('id_pedido');
            $table->double('total_pagar');
            $table->date('fecha_pedido');
            $table->unsignedBigInteger('id_estado_pedido');
            $table->unsignedBigInteger('id_usuario');
            $table->string('ubicacion', 150);

         
        });
        Schema::table('pedidos', function (Blueprint $table) {
            $table->foreign('id_estado_pedido')->references('id_estado_pedido')->on('estado_pedidos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_usuario')->references('id_usuario')->on('usuarios')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
};
