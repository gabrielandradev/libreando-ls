<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Book;
use App\Models\AccountStatus;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\LoanController;

Route::get("/", [DashboardController::class, 'index'])->name('dashboard');

Route::get('/cuenta/bloqueada', function () {
    return view('profile.blocked');
})->name('blocked');

Route::get('/cuenta/pendiente', function () {
    return view('profile.pending');
})->name('pending');

Route::middleware('auth')->group(function () {
    Route::get('/perfil/prestamos',
    [LoanController::class, 'userLoans'])->name('perfil.prestamos');

// //     Route::get('/profile', 
// [ProfileController::class, 'edit'])->name('profile.edit');
// //     Route::patch('/profile', 
// [ProfileController::class, 'update'])->name('profile.update');
// //     Route::delete('/profile', 
// [ProfileController::class, 'destroy'])->name('profile.destroy');
// // });

// Route::middleware(['auth', ])->group(function () {
//     Route::get('/admin/dashboard', 'AdminController@dashboard');
    Route::get(
        '/perfil/wishlist',
        [WishlistController::class, 'show']
    )->name('wishlist.ver');

    Route::post(
        '/perfil/wishlist/{book}',
        [WishlistController::class, 'store']
    )->name('wishlist.agregar');

    Route::post(
        '/perfil/wishlist/{book}/eliminar',
        [WishlistController::class, 'destroy']
    )->name('wishlist.eliminar');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
require __DIR__ . '/book.php';