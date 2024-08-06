<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get("/", function () {
    return view("index");
});

Route::get('/registrarse', [UserController::class, "create"]);
Route::post('/user', [UserController::class, "store"]);
