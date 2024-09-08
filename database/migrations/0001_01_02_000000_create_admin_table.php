<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('Administrador', function (Blueprint $table) {
            $table->string('dni')->unique()->primary();
            $table->foreignId('id_usuario')->unique();
            $table->string('apellido');
            $table->string('nombre');
            $table->string('telefono');
            $table->string('funcion');
            $table->foreign('id_usuario')
                ->references('id')->on('Usuario')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('Administrador');
    }
};
