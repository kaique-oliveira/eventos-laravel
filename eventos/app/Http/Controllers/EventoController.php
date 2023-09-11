<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Eventos;

class EventoController extends Controller
{
    public function index(){
        $eventos = Eventos::all();

        return View('evento.index', ['eventos' => $eventos]);
    }
}
