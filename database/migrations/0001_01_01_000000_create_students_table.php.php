<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->string('dni')->unique();
            $table->integer('id_usuario')->unique();
            $table->string('apellido');
            $table->string('nombre');
            $table->tinyInteger('año');
            $table->tinyInteger('division');
            $table->enum('turno', ['electrica', 'mecanica', 'computacion', 'electronica', 'quimica', 'construcciones']);
            $table->string('domicilio');
            $table->string('telefono');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('estudiantes');
    }
};
