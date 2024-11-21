<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tb_carrito', function (Blueprint $table) {
            $table->bigIncrements('id_carrito');
            $table->integer('id_producto');
            $table->string('nombre_producto');
            $table->double('precio');
            $table->integer('cantidad');
            $table->dateTime('fecha_agregado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
