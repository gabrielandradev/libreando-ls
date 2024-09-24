<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('Estudiante', function (Blueprint $table) {
            $table->string('dni')->unique()->primary();
            $table->foreignId('id_usuario')->unique();
            $table->string('apellido');
            $table->string('nombre');
            $table->tinyInteger('año');
            $table->string('division');
            $table->string('domicilio');
            $table->string('telefono');
            $table->foreignId('id_turno');
            $table->foreignId('id_especialidad');

            $table->foreign('id_usuario')
            ->references('id')->on('Usuario')->onDelete('cascade');

            $table->foreign('id_turno')
            ->references('id')->on('Turno');

            $table->foreign('id_especialidad')
            ->references('id')->on('Especialidad');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('Estudiante');
    }
};
