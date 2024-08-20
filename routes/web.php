<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookController; 
use Illuminate\Support\Facades\Route;

Route::get("/", function () {
    return view("index");
})->name("index");

Route::get('/secret/', function () {
    return view('secret');
})->middleware(['auth', 'verified'])->name("secreto");

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/book/', [BookController::class, 'create'])->name('book.create');
Route::get('/book/{book}', [BookController::class, 'show'])->name('book.show');
Route::get('', [BookController::class,''])->name('');

require __DIR__ . '/auth.php';
