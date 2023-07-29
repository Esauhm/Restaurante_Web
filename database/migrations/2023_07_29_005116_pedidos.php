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
            $table->id('id_pedido');
            $table->double('total_pagar');
            $table->date('fecha_pedido');
            $table->unsignedBigInteger('id_estado_pedido');
            $table->unsignedBigInteger('id_usuario');
            $table->string('ubicacion', 150);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
