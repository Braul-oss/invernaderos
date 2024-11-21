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
        Schema::create('tb_planta', function (Blueprint $table) {
            $table->bigIncrements('id_planta');
            $table->string('nombre', 50);
            $table->string('tipo', 50);
            $table->string('descripcion');
            $table->integer('precio');
            $table->integer('stock');
            $table->string('imagen'); 
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
