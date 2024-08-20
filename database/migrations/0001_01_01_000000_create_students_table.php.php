<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('Estudiante', function (Blueprint $table) {
            $table->string('dni')->unique();
            $table->integer('id_usuario')->unique();
            $table->string('apellido');
            $table->string('nombre');
            $table->tinyInteger('año');
            $table->tinyInteger('division');
            $table->enum('especialidad', ['electrica', 'mecanica', 'computacion', 'electronica', 'quimica', 'construcciones']);
            $table->enum('turno', ['mañana', 'tarde']);
            $table->string('domicilio');
            $table->string('telefono');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('Estudiante');
    }
};
