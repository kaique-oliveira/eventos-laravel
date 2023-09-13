@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')

<link rel="stylesheet" href="/css/styles.evento.css">

<main>
    <h5 style=" margin-top: -200px; margin-bottom: 20px">Meus eventos</h5>

    @if(count($eventos) > 0)
    <table id="minha-table" class="table">
        <tr style="background-color: pink; border-radius: 9px;">
            <th style="border-top-left-radius: var(--border-medium); text-align: center;" class="table-dark">Id</th>
            <th class="table-dark" width="550px">Nome</th>
            <th class="table-dark" width="60px">Participantes</th>
            <th style="border-top-right-radius: var(--border-medium); text-align: center;" colspan="2"
                class="table-dark" width="15px">Ações</th>
        </tr>
        @foreach($eventos as $evento)
        <tr>
            <td>{{$evento->id}}</td>
            <td width="250px"><a href="/detalhes/{{$evento -> id}}">{{$evento->nome}}</a></td>
            <td style="text-align: center;">{{count($evento->users)}}</td>
            <td width="10px" style="padding: 0;">
                <a href="/editar/{{$evento->id}}">
                    <button class="btn-neutro">
                        <ion-icon style="color: var(--orange); font-size: 22px;" name="create-outline"></ion-icon>
                        editar
                    </button>
                </a>
            </td>
            <td width="10px" style="padding: 0;">

                <form action="/deletar/{{$evento->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn-neutro" type="submit">
                        <ion-icon style="color: var(--red); font-size: 22px;" name="trash-outline"></ion-icon>
                        deletar
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    @else
    <p>
        Você ainda não possui nenhum evento,
        <a id="link-criar" href="/">
            Criar evento
        </a>
    </p>
    @endif

    <h5 style=" margin-top: 40px; margin-bottom: 20px">Eventos que estou participando</h5>

    @if(count($participantes) > 0)
    <table id="minha-table" class="table">
        <tr style="background-color: pink; border-radius: 9px;">
            <th style="border-top-left-radius: var(--border-medium); text-align: center;" class="table-dark">Id</th>
            <th class="table-dark" width="550px">Nome</th>
            <th class="table-dark" width="60px">Participantes</th>
            <th style="border-top-right-radius: var(--border-medium); text-align: center;" colspan="2"
                class="table-dark" width="15px">Ações</th>
        </tr>
        @foreach($participantes as $evento)
        <tr>
            <td>{{$evento->id}}</td>
            <td width="250px"><a href="/detalhes/{{$evento -> id}}">{{$evento->nome}}</a></td>
            <td style="text-align: center;">{{count($evento->users)}}</td>
            <td width="10px" style="padding: 0;">
                <a href="#">
                    <button class="btn-neutro">
                        <ion-icon style="color: var(--orange); font-size: 22px;" name="exit-outline"></ion-icon>
                        sair
                    </button>
                </a>
            </td>
        </tr>
        @endforeach
    </table>

    @else
    <p>
        Você ainda não está participando de nenhum evento,
        <a href="/">
            Ver todos eventos
        </a>
    </p>
    @endif

    <script src="/js/eventos.js"></script>
</main>