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
        Schema::create('Libro_Descriptor_Secundario', function (Blueprint $table) {
            $table->foreignId('id_libro');
            $table->foreignId('id_descriptor_sec');

            $table->unique(['id_libro', 'id_descriptor_sec']);

            $table->foreign('id_libro')
            ->references('id')->on('Libro')->onDelete('cascade');

            $table->foreign('id_descriptor_sec')
            ->references('id')->on('Descriptor_Secundario')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Libro_Descriptor_Secundario');
    }
};
