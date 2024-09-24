<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('Prestamo', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_libro');
            $table->foreignId('id_usuario');
            $table->date('fecha_solicitud');
            $table->date('fecha_prestamo')->nullable();
            $table->date('fecha_devolucion')->nullable();
            $table->foreignId('id_estado_prestamo');

            $table->unique(['id_libro', 'id_usuario']);

            $table->foreign('id_libro')
            ->references('id')->on('Libro')->onDelete('cascade');

            $table->foreign('id_usuario')
            ->references('id')->on('Usuario')->onDelete('cascade');

            $table->foreign('id_estado_prestamo')
            ->references('id')->on('Estado_Prestamo');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('Prestamo');
    }
};
