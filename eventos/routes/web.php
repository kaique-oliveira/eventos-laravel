<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventoController;

Route::get('/', function () {
    return view('Evento.index');
});

Route::post('/', [EventoController::class, 'store']);