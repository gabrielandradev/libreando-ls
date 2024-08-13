<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;

Route::get("/", function () {
    return view("index");
});

Route::get('/registrarse/', function () {
    return view("user-signup-menu");
});

Route::get('/secret/', function () {
    return view('secret');
})->middleware(['auth', 'verified']);

Route::controller(StudentController::class)->group(function() {
    Route::get("/registrarse/estudiantes", "create");
    Route::post("/registrarse/estudiantes", "store");
});

Route::controller(TeacherController::class)->group(function() {
    Route::get("/registrarse/profesores", "create");
    Route::post("/registrarse/profesores", "store");
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
