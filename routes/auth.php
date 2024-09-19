<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;

Route::middleware('guest')->group(function () {
    Route::get('registrarse', function () {
        return view("auth.user-signup-menu");
    })->name('registrarse');

    Route::get(
        "/registrarse/estudiantes",
        [StudentController::class, 'create']
    )->name('registrar-estudiante');

    Route::post(
        '/registrarse/estudiantes',
        [StudentController::class, 'store']
    );

    Route::get(
        "/registrarse/profesores",
        [TeacherController::class, 'create']
    )->name('registrar-profesor');

    Route::post(
        '/registrarse/profesores',
        [TeacherController::class, 'store']
    );

    Route::get(
        'iniciar-sesion',
        [AuthenticatedSessionController::class, 'create']
    )->name('login');

    Route::post(
        'iniciar-sesion',
        [AuthenticatedSessionController::class, 'store']
    );

    Route::get(
        'forgot-password',
        [PasswordResetLinkController::class, 'create']
    )->name('password.request');

    Route::post(
        'forgot-password',
        [PasswordResetLinkController::class, 'store']
    )->name('password.email');

    Route::get(
        'reset-password/{token}',
        [NewPasswordController::class, 'create']
    )->name('password.reset');

    Route::post(
        'reset-password',
        [NewPasswordController::class, 'store']
    )->name('password.store');
});

Route::middleware('auth')->group(function () {
    Route::get(
        'confirm-password',
        [ConfirmablePasswordController::class, 'show']
    )->name('password.confirm');

    Route::post(
        'confirm-password',
        [ConfirmablePasswordController::class, 'store']
    );

    Route::put(
        'password',
        [PasswordController::class, 'update']
    )->name('password.update');

    Route::post(
        'logout',
        [AuthenticatedSessionController::class, 'destroy']
    )->name('logout');
});
