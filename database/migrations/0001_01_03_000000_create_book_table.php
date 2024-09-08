<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('Libro', function (Blueprint $table) {
            $table->id()->unique()->primary();
            $table->string('ubicacion_fisica');
            $table->string('titulo');
            $table->string('isbn');
            $table->string('editorial');
            $table->smallInteger('año_edicion');
            $table->smallInteger('num_edicion');
            $table->string('lugar_edicion');
            $table->string('desc_primario');
            $table->string('idioma');
            $table->string('notas')->nullable();
            $table->string('num_paginas');
            $table->foreignId('id_disponibilidad');
            $table->date('fecha_creacion');
            $table->date('fecha_edicion');

            $table->foreign('id_disponibilidad')
            ->references('id')->on('Disponibilidad_Libro');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('Libro');
    }
};
