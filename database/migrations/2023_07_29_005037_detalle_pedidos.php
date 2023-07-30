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
        Schema::create('detalle_pedidos', function (Blueprint $table) {
            $table->id('id_detalle');
            $table->unsignedBigInteger('id_producto');
            $table->unsignedBigInteger('id_pedido');
            $table->integer('cantidad')->nullable();

            $table->foreign('id_producto')->references('id_producto')->on('productos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_pedido')->references('id_pedido')->on('pedidos')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('detalle_pedidos');
    }
};
