<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('wishlist', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_libro');
            $table->foreignId('id_usuario');

            $table->unique(['id_libro', 'id_usuario']);

            $table->foreign('id_libro')
            ->references('id')->on('Libro')->onDelete('cascade');
            
            $table->foreign('id_usuario')
            ->references('id')->on('Usuario')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('wishlist');
    }
};
