<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;

Route::middleware(['auth', 'role:administrador'])->group(function () {
    Route::get('/admin/crear/libro', [BookController::class, 'create'])->name('libro_crear');

    Route::post('/admin/crear/libro', [BookController::class, 'store'])->name('libro_crear');

    Route::get('/libros/{book}/editar', [BookController::class, 'edit'])->name('libro_editar');

    Route::post('/libros/{book}/editar', [BookController::class, 'update'])->name('libro_editar');

    Route::post('/libros/{book}/borrar', [BookController::class, 'edit'])->name('libro_borrar');

    Route::get('/admin/usuarios/pendientes', [UserController::class, 'showPendingAccounts'])->name('solicitudes_activacion_cuenta');
});