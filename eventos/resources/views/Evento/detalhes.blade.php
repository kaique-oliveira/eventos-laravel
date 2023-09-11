@extends('layouts.main')

@section('title', 'Eventos')

@section('content')

<link rel="stylesheet" href="/css/styles.evento.css">


<main>
    <div class="container-detalhes">
        <img src="/img/eventos/{{$evento->imagem}}" alt="">

        <div class="container-informacoes">
            <h5>{{$evento -> nome}}</h5>

            <div class="container-data">
                <span>{{$evento -> data}}</span>
                @if($evento -> privado == true)
                <span>privado</span>
                @endif
            </div>
            <div class="container-conjunto">
                <div class="container-info">
                    <ion-icon style="color: #eb4e46; font-size: 22px;" name="location-sharp"></ion-icon>
                    <span>{{$evento -> cidade}}</span>
                </div>

                <div class="container-info">
                    <ion-icon style="color: #f3800d; font-size: 22px;" name="people-sharp"></ion-icon>
                    <span>10 participantes</span>
                </div>
                <div class="container-info">
                    <ion-icon style="color: #2e2b41; font-size: 22px;" name="person-circle-sharp"></ion-icon>
                    <span>Dono do evento</span>
                </div>
            </div>
           
            <ul id="items-list">
                <h6>O evento conta com:</h6>
                @foreach($evento ->  items as $item)
                 <li>
                    <ion-icon style="font-size: 14px; color: #2e2b41;" name="play-sharp"></ion-icon><span>{{$item}}</span>
                 </li>
                @endforeach
            </ul>

            <p class="texto">{{$evento -> descricao}}</p>

            <button class="btn-neutro btn-default-primary">confirmar presença</button>
        </div>
    </div>
</main>

@endsection