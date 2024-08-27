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
        Schema::create('Estado_Prestamo', function (Blueprint $table) {
            $table->integer('id');
            $table->string('estado')->unique();
        });

        Artisan::call('db:seed', ['--class' => 'EstadoPrestamoSeeder']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Estado_Prestamo');
    }
};
