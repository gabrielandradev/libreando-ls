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
        Schema::create('Disponibilidad_Libro', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('estado')->unique();
        });

        Artisan::call('db:seed', ['--class' => 'DisponibilidadLibroSeeder']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Disponibilidad_Libro');
    }
};
