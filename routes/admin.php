<?php

use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get(
        '/admin/usuarios/profesores/pendientes',
        [TeacherController::class, 'teacherPendingAccounts']
    )->name('profesores_pendientes');

    Route::get(
        '/admin/usuarios/estudiantes/pendientes',
        [StudentController::class, 'studentPendingAccounts']
    )->name('estudiantes_pendientes');

    Route::post('/admin/activar/{user}',
    [UserController::class, 'activate']
    )->name('activar-usuario');

    Route::post('/admin/eliminar/{user}',
    [UserController::class, 'destroy']
    )->name('eliminar-usuario');
});