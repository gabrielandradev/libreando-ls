<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;

Route::get("/", function () {
    return view("index");
});

Route::get('/registrarse/', function () {
    return view("user-signup-menu");
});

Route::controller(StudentController::class)->group(function() {
    Route::get("/registrarse/estudiantes", "create");
    Route::post("/student", "store");
});

Route::controller(TeacherController::class)->group(function() {
    Route::get("/registrarse/profesores", "create");
    Route::post("/profesor", "store");
});