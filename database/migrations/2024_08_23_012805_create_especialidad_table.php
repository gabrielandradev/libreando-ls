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
        Schema::create('Especialidad', function (Blueprint $table) {
            $table->integer('id');
            $table->string('nombre')->unique();
        });

        Artisan::call('db:seed', ['--class' => 'EspecialidadSeeder']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Especialidad');
    }
};