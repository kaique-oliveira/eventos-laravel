<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventoController;

Route::get('/', [EventoController::class, 'index']);
Route::post('/', [EventoController::class, 'store']);
Route::get('/detalhes/{id}', [EventoController::class, 'detalhes']);
Route::delete('/deletar/{id}', [EventoController::class, 'destroy'])->middleware('auth');
Route::get('/editar/{id}', [EventoController::class, 'edit'])->middleware('auth');
Route::put('/update/{id}', [EventoController::class, 'update'])->middleware('auth');

Route::get('/dashboard', [EventoController::class, 'dashboard'])->middleware('auth');

Route::post('/join/{id}', [EventoController::class, 'joinEvento'])->middleware('auth');