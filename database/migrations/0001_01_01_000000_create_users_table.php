<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('Usuario', function (Blueprint $table) {
            $table->id()->unique()->primary();
            $table->string('email')->unique();
            $table->string('contraseña');
            $table->foreignId('id_rol');
            $table->foreignId('id_estado_cuenta');
            $table->timestamp('fecha_verificacion_mail')->nullable();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('id_rol')
            ->references('id')->on('Rol');

            $table->foreign('id_estado_cuenta')
            ->references('id')->on('Estado_Cuenta');
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('Usuario');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
