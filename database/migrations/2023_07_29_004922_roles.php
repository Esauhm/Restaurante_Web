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
        Schema::create('roles', function (Blueprint $table) {
            $table->id('id_rol');
            $table->string('rol', 50);
            $table->timestamps(); // Agregar las columnas de tiempo
        });
    }

    public function down()
    {
        Schema::dropIfExists('roles');
        
    }
};
