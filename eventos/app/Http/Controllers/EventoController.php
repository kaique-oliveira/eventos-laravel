<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Eventos;
use App\Models\User;

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
        $user = auth()->user();
        $isParticipando = false;

        if($user){
            $userEventos = $user->eventosComoParticipante->toArray();

            foreach($userEventos as $userEvento){
                if($userEvento['id'] == $id){
                    $isParticipando = true;
                }
            }
        }

        $donoEvento = User::where('id', $evento->user_id)->first()->toArray();

        return View('evento.detalhes', ['evento' => $evento, 'donoEvento' => $donoEvento, 'isParticipando' => $isParticipando]);
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
        return redirect('/')->with('msg', 'evento criado com sucesso!');
    }

    public function dashboard(){
        $user = auth()->user();

        $eventosComParticipantes = $user->eventosComoParticipante;
        $eventos = $user->eventos;

        return view('evento.dashboard', ['eventos' => $eventos, 'participantes' =>  $eventosComParticipantes]);
    }

    public function destroy($id){
        Eventos::findOrFail($id)->delete();

        return redirect('/dashboard')->with('msg', 'Evento deletado com sucesso!');
    }

    public function edit($id){
        $user = auth()->user();
        $evento = Eventos::findOrFail($id);

        if($user->id != $evento->user_id){
            return redirect('/dashboard');
        }

        return view('evento.editar', ['evento' => $evento]);
    }

    public function update(Request $request){
        $data = $request->all();

        if($request->hasfile('imagem') && $request->file('imagem')->isValid()){
            $requestImage = $request->imagem;

            $extesion = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extesion;

            $request->imagem->move(public_path('img/eventos'), $imageName);

            $data['imagem'] = $imageName;
        }

        Eventos::findOrFail($request->id)->update($data);

        return redirect('/dashboard')->with('msg', 'Evento editado com sucesso!');
    }

    public function joinEvento($id){
        $user = auth()->user();

        $user->eventosComoParticipante()->attach($id);

        $evento = Eventos::findOrFail($id);

        return redirect('/dashboard')->with('msg', 'Presença confirmada - ' . $evento->nome . '!');
    }

    public function leaveEvento($id){
        $user = auth()->user();

        $user->eventosComoParticipante()->detach($id);

        $evento = Eventos::findOrFail($id);

        return redirect('/dashboard')->with('msg', 'Você saiu do evento - ' . $evento->nome . '!');
    }
}
