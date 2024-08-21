<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('Administrador', function (Blueprint $table) {
            $table->string('dni')->unique();
            $table->integer('id_usuario')->unique();
            $table->string('apellido');
            $table->string('nombre');
            $table->string('telefono');
            $table->string('funcion');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('Administrador');
    }
};
