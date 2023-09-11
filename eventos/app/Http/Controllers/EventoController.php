<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Eventos;

class EventoController extends Controller
{
    public function index(){
        $search = request('search');

        if($search){
            $eventos = Eventos::where([
                ['nome', 'like', '%'.$search.'%']
            ])->get();
        }else{
            $eventos = Eventos::all();
        }

        return View('evento.index', ['eventos' => $eventos, 'search' => $search]);
    }

    public function detalhes($id){
        $evento = Eventos::findOrFail($id);

        return View('evento.detalhes', ['evento' => $evento]);
    }

    public function store(Request $request){
        $events = new Eventos;

        $events->nome = $request->nome;
        $events->descricao = $request->descricao;
        $events->cidade = $request->cidade;
        $events->privado = $request->privado;
        $events->data = $request->data;
        $events->items = $request->items;

        if($request->hasfile('image') && $request->file('image')->isValid()){
            $requestImage = $request->image;

            $extesion = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extesion;

            $request->image->move(public_path('img/eventos'), $imageName);

            $events->imagem = $imageName;
        }

        $user = auth()->user();
        $events->user_id = $user->id;

        $events->save();
        return redirect('/')->with('msg', 'evento criado');
    }
}
