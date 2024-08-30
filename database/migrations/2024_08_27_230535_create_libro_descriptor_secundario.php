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
            $table->integer('id_libro');
            $table->integer('id_descriptor_secundario');
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
