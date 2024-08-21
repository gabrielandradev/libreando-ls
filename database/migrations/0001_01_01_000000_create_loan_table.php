<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('Prestamo', function (Blueprint $table) {
            $table->integer('id_libro');
            $table->integer('id_usuario');
            $table->date('fecha_inicio');
            $table->date('fecha_devolucion');
            $table->enum('estado', ['solicitado', 'cancelado', 'prestado', 'devuelto', 'atrasado']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('Prestamo');
    }
};
