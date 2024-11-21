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
        Schema::create('tb_personal', function (Blueprint $table) {
            $table->bigIncrements('id_personal');
            $table->string('nombre');
            $table->string('app');//Apellido paterno
            $table->string('apm');//Apellido materno
            $table->string('telefono');
            $table->string('email');
            $table->string('curp'); 
            $table->string('rfc');
            $table->string('cargo');
            $table->text('foto')->nullable();
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
