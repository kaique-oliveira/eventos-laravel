<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class UserController extends Controller
{
    public function index(){
        $user = auth()->user();
        $eventos = $user->eventos;
        $participando = $user->eventosComoParticipante;

        return View('perfil.index', ['user' => $user, 'eventos' => $eventos, 'participando' => $participando]);
    }

}
