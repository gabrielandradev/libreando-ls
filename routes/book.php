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
    Route::post('/libros/{book}/solicitar-prestamo', 
    [LoanController::class, 'create'])->name('solicitar-prestamo');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get(
        '/libros/crear',
        [BookController::class, 'create']
    )->name('libro_crear');

    Route::post(
        '/libros/crear',
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
        [BookController::class, 'destroy']
    )->name('libro_borrar');

});