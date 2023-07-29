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
        Schema::create('estado_pedidos', function (Blueprint $table) {
            $table->id('id_estado_pedido');
            $table->string('Estado', 50);
        });
    }

    public function down()
    {
        Schema::dropIfExists('estado_pedidos');
    }
};
