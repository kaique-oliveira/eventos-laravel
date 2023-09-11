<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventoController;

Route::get('/', [EventoController::class, 'index']);
Route::post('/', [EventoController::class, 'store']);
Route::get('/detalhes/{id}', [EventoController::class, 'detalhes']);