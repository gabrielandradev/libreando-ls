<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\LoanController;

Route::get(
    '/libros/{book}',
    [BookController::class, 'show']
)->name('libro');

Route::get(
    '/autores/{author}',
    [AuthorController::class, 'show']
)->name('autor');

Route::middleware(['auth'])->group(function () {
    Route::get(
        '/libros/{book}/solicitar-prestamo',
        [LoanController::class, 'create']
    )->name('solicitar.prestamo');

    Route::post(
        '/libros/{book}/solicitar-prestamo',
        [LoanController::class, 'store']
    )->name('solicitar.prestamo.generar');

    Route::post(
        '/prestamos/{loan}/pdf',
        [LoanController::class, 'toPDF']
    )->name('prestamo.generado.pdf');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get(
        '/admin/crear/libro',
        [BookController::class, 'create']
    )->name('libro.crear');

    Route::post(
        '/admin/crear/libro',
        [BookController::class, 'store']
    )->name('libro.store');

    Route::get(
        '/libros/{book}/editar',
        [BookController::class, 'edit']
    )->name('libro.editar');

    Route::post(
        '/libros/{book}/editar',
        [BookController::class, 'update']
    )->name('libro.update');

    Route::post(
        '/libros/{book}/borrar',
        [BookController::class, 'destroy']
    )->name('libro.destroy');

});