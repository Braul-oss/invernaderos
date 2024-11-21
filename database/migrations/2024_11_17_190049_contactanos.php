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
        //Hacer cambios
        Schema::create('tb_contactanos', function (Blueprint $table) {
            $table->bigIncrements('id_contactanos');
            $table->string('nombre');
            $table->string('email', 20);
            $table->string('asunto');
            $table->text('mensaje');
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
