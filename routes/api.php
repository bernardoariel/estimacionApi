<?php

use App\Http\Controllers\EstimacionController;
use App\Http\Controllers\SprintController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
/* ESTIMACIONES */
Route::post('/ingresar', [EstimacionController::class, 'ingresar']);
Route::post('/ingresar-nombre-valor', [EstimacionController::class, 'ingresarNombreValor']);
Route::delete('/eliminar-registros', [EstimacionController::class, 'eliminarRegistros']);
Route::get('/obtenerEstimaciones', [EstimacionController::class, 'obtenerEstimaciones']);
Route::post('/reiniciarEstimaciones', [EstimacionController::class, 'reiniciarEstimaciones']);
Route::get('/verificar-autenticacion', [EstimacionController::class, 'verificarAutenticacion']);

/* Ver si existe un sprint */
Route::get('/last-sprint', [SprintController::class, 'lastSprint']);
Route::post('/crearsprint', [SprintController::class, 'nuevo']);
Route::delete('/eliminar-sprint', [SprintController::class, 'eliminarRegistros']);