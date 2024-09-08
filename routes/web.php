<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Book;
use App\Models\AccountStatus;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;

Route::get("/", function () {
    return view("index", ['books' => Book::where('id_disponibilidad', 1)->get()]);
})->name('dashboard');

Route::get('/secret', function () {
    return view('secret');
})->middleware(['auth', 'admin'])->name("secreto");

Route::get('/cuenta/bloqueada', function () {
    return view('profile.blocked');
})->name('blocked');

Route::get('/cuenta/pendiente', function () {
    return view('profile.pending');
})->name('pending');

Route::get('/libros/{book}', [BookController::class, 'show'])->name('libro');

Route::get('/autores/{author}', [AuthorController::class, 'show'])->name('autor');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// Route::middleware(['auth', ])->group(function () {
//     Route::get('/admin/dashboard', 'AdminController@dashboard');
// });

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
