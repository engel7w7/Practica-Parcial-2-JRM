<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\LoginController;

// Rutas de autenticación (públicas)
Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Ruta inicial
Route::get('/', function () {
    return redirect()->route('medicos.index');
});

// Rutas protegidas (requieren autenticación)
Route::middleware('auth')->group(function () {
    // Rutas para Médicos
    Route::resource('medicos', MedicoController::class);
    
    // Rutas para Especialidades
    Route::resource('especialidades', \App\Http\Controllers\EspecialidadController::class);
    
    // Rutas para Pacientes
    Route::resource('pacientes', \App\Http\Controllers\PacienteController::class);
});
