@extends('layouts.main')

@section('title', 'Editando')

@section('content')

<link rel="stylesheet" href="/css/styles.evento.css">

<div id="modal-criar-evento" class="modal-wrapper-show">
    <div class="modal-container">
        <div class="modal-header">
            <h6 class="titulo-modal">Editando evento - {{$evento->nome}}</h6>
            <button id="btn-fechar-editar">
                <ion-icon class="icon" name="close-circle"></ion-icon>
            </button>
        </div>

        <form class="modal-conteudo" action="/update/{{$evento->id}}" method="POST" class="form-eventos" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <img src="/img/eventos/{{$evento->imagem}}" alt="{{$evento->nome}}" 
                style="width: 300px; border-radius: var(--border-medium);" >
            <div class="container-input">
                <label for="imagem">Capa</label>
                <input required id="imagem" name="imagem" type="file" class="input-neutro-file"></input>
            </div>

            <div class="container-input">
                <label for="nome">Nome</label>
                <input required id="nome" name="nome" class="input-neutro" value="{{$evento->nome}}" placeholder="Nome do evento"></input>
            </div>
            <div class="container-input">
                <label for="cidade">Cidade</label>
                <input required id="cidade" name="cidade" class="input-neutro" value="{{$evento->cidade}}" placeholder="Local do evento"></input>
            </div>
            <div class="container-input">
                <label for="data">Data</label>
                <input required id="data" name="data" type="date" value="{{$evento->data}}" class="input-neutro input-data"></input>
            </div>
            <div class="container-area">
                <label for="descricao">Descrição</label>
                <textarea required rows="1" id="descricao" name="descricao" type="text" class="input-neutro"
                    placeholder="O que vai acontecer no evento?">{{$evento->descricao}}</textarea>
            </div>

            <div class="opcoes-infraestruturas">
                <label class="opcoes-titulo" for="descricao">Adicione itens de infraestrutura</label>
                <div class="opcoes">
                    <label for="cadeiras">Cadeiras</label>
                    <input id="cadeiras" type="checkbox" name="items[]" value="Cadeiras">
                </div>
                <div class="opcoes">
                    <label for="palco">Palco</label>
                    <input id="palco" type="checkbox" name="items[]" value="Palco">
                </div>
                <div class="opcoes">
                    <label for="bebidas">Bebidas</label>
                    <input id="bebidas" type="checkbox" name="items[]" value="Bebidas">
                </div>
                <div class="opcoes">
                    <label for="food">Open food</label>
                    <input id="food" type="checkbox" name="items[]" value="Open food">
                </div>
                <div class="opcoes">
                    <label for="brindes">Brindes</label>
                    <input id="brindes" type="checkbox" name="items[]" value="Brindes">
                </div>
            </div>

            <div class="container-input">
                <label for="privado">É privado?</label>
                <select id="privado" name="privado" class="input-neutro">
                    <option value="0">não</option>
                    <option value="1" {{$evento->privado == 1 ? "selected='selected'": ""}}>sim</option>
                </select>
            </div>

            <button style="margin-top: 5px;" class="btn-neutro btn-default-primary">
                <ion-icon color="white" name="save-sharp"></ion-icon>
                salvar edição
            </button>

        </form>
    </div>
</div>

<script src="/js/eventos.js"></script>

@endsection