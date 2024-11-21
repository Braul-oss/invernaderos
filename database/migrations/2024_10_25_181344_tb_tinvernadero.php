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
        Schema::create('tb_tinvernadero', function (Blueprint $table) {
            $table->bigIncrements('id_invernadero');
            $table->string('tipo', 50);
            $table->string('descripcion');
            $table->integer('precio');
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
