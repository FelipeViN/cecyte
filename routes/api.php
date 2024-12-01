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


Route::apiResource('Usuarios',UsuariosController::class);
Route::apiResource('Administrativos',AdministrativosController::class);
Route::apiResource('Estudiantes',EstudiantesController::class);
Route::apiResource('Profesores',ProfesoresController::class);
Route::apiResource('Horarios',HorariosController::class);
Route::apiResource('Grupos',GruposController::class);
Route::apiResource('Materias',MateriasController::class);
Route::apiResource('Calificaciones',CalificacionesController::class);
Route::apiResource('Materias', MateriasController::class);