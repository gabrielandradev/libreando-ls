<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('Autor', function (Blueprint $table) {
            $table->id()->unique()->primary();
            $table->string('nombre');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('Autor');
    }
};
