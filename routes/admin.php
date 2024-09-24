<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\LoanController;

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get(
        '/admin/solicitudes-prestamo',
        [LoanController::class, 'pending']
    )->name('gestionar.solicitudes.prestamo');

    Route::get(
        '/admin/prestamos',
        [LoanController::class, 'active']
    )->name('admin.prestamos.activos');

    Route::get(
        '/admin/prestar/{loan}',
        [LoanController::class, 'showLoanActivator']
    )->name('prestamo.procesar');

    Route::put(
        '/admin/prestar/handler/{loan}',
        [LoanController::class, 'loan']
    )->name('prestar-libro');

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