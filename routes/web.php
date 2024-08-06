<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get("/", function () {
    return view("index");
});

Route::get('/registrarse/estudiantes', [StudentController::class, "create"]);
Route::post('/student', [StudentController::class, "store"]);
