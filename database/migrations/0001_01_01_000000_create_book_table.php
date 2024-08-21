<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('Libro', function (Blueprint $table) {
            $table->id()->unique();
            $table->integer('num_inventario')->unique();
            $table->string('ubicacion_fisica');
            $table->string('titulo');
            $table->string('isbn');
            $table->string('funcion');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('Administrador');
    }
};
