<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('auth/register', [AuthController::class, 'create']);
Route::post('auth/login', [AuthController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::resource('pacientes', PacienteController::class);
    Route::resource('citas', CitaController::class);
    Route::get('citasall', [CitaController::class, 'all']);
    Route::get('citasbypaciente', [CitaController::class, 'CitasByPaciente']);
    Route::get('auth/logout', [AuthController::class, 'logout']);
});
