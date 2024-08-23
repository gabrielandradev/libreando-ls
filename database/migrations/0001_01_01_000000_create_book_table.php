<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('Libro', function (Blueprint $table) {
            $table->id()->unique();
            $table->integer('num_inventario')->unique();
            $table->string('ubicacion_fisica');
            $table->string('titulo');
            $table->string('isbn_10')->nullable();
            $table->string('isbn_13')->nullable();
            $table->smallInteger('año_edicion');
            $table->smallInteger('num_edicion');
            $table->string('lugar_edicion');
            $table->string('desc_primario');
            $table->string('desc_secundario');
            $table->string('idioma');
            $table->string('notas')->nullable();
            $table->integer('num_paginas');
            $table->integer('id_disponibilidad');
            $table->date('fecha_creacion');
            $table->date('fecha_edicion');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('Libro');
    }
};
