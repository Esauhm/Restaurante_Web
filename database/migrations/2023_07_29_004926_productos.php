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
        Schema::create('productos', function (Blueprint $table) {
            $table->bigIncrements('id_producto');
            $table->string('nombre', 30);
            $table->double('precio');
            $table->string('image_url', 255);
            $table->string('descripcion_prod', 150);
            $table->unsignedBigInteger('categoria');
            $table->integer('estado');
        });

        Schema::table('productos', function (Blueprint $table) {
            $table->foreign('categoria')->references('id_categoria')->on('categorias')->onDelete('cascade')->onUpdate('cascade');
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
