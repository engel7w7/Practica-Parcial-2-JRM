<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\EspecialidadController;
use App\Http\Controllers\PacienteController;

// Ruta de prueba sin autenticación
Route::get('/test', function () {
    return response()->json(['message' => 'API is working!', 'timestamp' => now()]);
});

Route::post('/login', [AuthController::class, 'apiLogin']);

// Ruta de prueba CON autenticación
Route::middleware('auth:sanctum')->get('/test-auth', function (Request $request) {
    return response()->json(['message' => 'Auth works!', 'user' => $request->user()]);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::apiResource('medicos', MedicoController::class);
    Route::apiResource('especialidades', EspecialidadController::class);
    Route::apiResource('pacientes', PacienteController::class);
});

