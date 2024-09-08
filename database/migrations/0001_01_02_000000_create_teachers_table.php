<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('Profesor', function (Blueprint $table) {
            $table->string('dni')->unique()->primary();
            $table->foreignId('id_usuario')->unique();
            $table->string('apellido');
            $table->string('nombre');
            $table->string('domicilio');
            $table->string('especialidad');
            $table->string('telefono');

            $table->foreign('id_usuario')
            ->references('id')->on('Usuario')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('Profesor');
    }
};
