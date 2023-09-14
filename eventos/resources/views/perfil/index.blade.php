@extends('layouts.main')

@section('title', 'Editando')

@section('content')

<link rel="stylesheet" href="/css/styles.perfil.css">

<main>
    <div class="container-perfil">
        <h4>{{$user->name}}</h4>

        <div class="container-info">
            <span for="#">E-mail</span>
            <p>{{$user->email}}</p>
        </div>

        <div class="container-info">
            <span for="#">Quantidade de seus eventos</span>
            @if(count($eventos) > 1)
                <p>{{count($eventos)}}  eventos</p>
            @else
                <p>{{count($eventos)}}  evento</p>
            @endif
        </div>


        <div class="container-info">
            <span for="#">Quantidade de eventos que estou participando</span>
            @if(count($participando) > 1)
                <p>{{count($participando)}}  eventos</p>
            @else
                <p>{{count($participando)}}  evento</p>
            @endif
        </div>        
    </div>

</main>

@endsection