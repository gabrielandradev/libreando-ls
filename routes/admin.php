<?php

use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get(
        '/admin/crear/libro',
        [BookController::class, 'create']
    )->name('libro_crear');

    Route::post(
        '/admin/crear/libro',
        [BookController::class, 'store']
    )->name('libro_crear');

    Route::get(
        '/libros/{book}/editar',
        [BookController::class, 'edit']
    )->name('libro_editar');

    Route::post(
        '/libros/{book}/editar',
        [BookController::class, 'update']
    )->name('libro_editar');

    Route::post(
        '/libros/{book}/borrar',
        [BookController::class, 'edit']
    )->name('libro_borrar');

    Route::get(
        '/admin/usuarios/profesores/pendientes',
        [TeacherController::class, 'teacherPendingAccounts']
    )->name('profesores_pendientes');

    Route::get(
        '/admin/usuarios/estudiantes/pendientes',
        [StudentController::class, 'studentPendingAccounts']
    )->name('estudiantes_pendientes');
});