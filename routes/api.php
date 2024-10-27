<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\AdministrativosController;
use App\Http\Controllers\CalificacionesController;
use App\Http\Controllers\EstudiantesController;
use App\Http\Controllers\GruposController;
use App\Http\Controllers\HorariosController;
use App\Http\Controllers\MateriasController;
use App\Http\Controllers\ProfesoresController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('Usuarios',UsuariosController::class);
Route::apiResource('Administrativos',AdministrativosController::class);
Route::apiResource('Estudiantes',EstudiantesController::class);
Route::apiResource('Profesores',ProfesoresController::class);
Route::apiResource('Horarios',HorariosController::class);
Route::apiResource('Grupos',GruposController::class);
Route::apiResource('Materias',MateriasController::class);
Route::apiResource('Calificaciones',CalificacionesController::class);