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
        Schema::create('Libro_Autor', function (Blueprint $table) {
            $table->foreignId('id_autor');
            $table->foreignId('id_libro');

            $table->unique(['id_autor', 'id_libro']);

            $table->foreign('id_autor')
            ->references('id')->on('Autor')->onDelete('cascade');

            $table->foreign('id_libro')
            ->references('id')->on('Libro')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Libro_Autor');
    }
};
