<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('profesores', function (Blueprint $table) {
            $table->string('dni')->unique();
            $table->tinyInteger('id_usuario')->unique();
            $table->string('apellido');
            $table->string('nombre');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profesores');
    }
};
