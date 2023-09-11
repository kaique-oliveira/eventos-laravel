@extends('layouts.main')

@section('title', 'Eventos')

@section('content')

<link rel="stylesheet" href="/css/styles.evento.css">


<div id="modal-criar-evento" class="modal-wrapper-hide">
    <div class="modal-container">
        <div class="modal-header">
            <h6 class="titulo-modal">Criar Evento</h6>
            <button id="btn-fechar">
                <ion-icon class="icon" name="close-circle"></ion-icon>
            </button>
        </div>

        <form class="modal-conteudo" action="/" method="POST" class="form-eventos" enctype="multipart/form-data">
            @csrf

            <div class="container-input">
                <label for="image">Capa</label>
                <input required id="image" name="image" type="file" class="input-neutro-file"></input>
            </div>

            <div class="container-input">
                <label for="nome">Nome</label>
                <input required id="nome" name="nome" class="input-neutro" placeholder="Nome do evento"></input>
            </div>
            <div class="container-input">
                <label for="cidade">Cidade</label>
                <input required id="cidade" name="cidade" class="input-neutro" placeholder="Local do evento"></input>
            </div>
            <div class="container-input">
                <label for="data">Data</label>
                <input required id="data" name="data" type="date" class="input-neutro input-data"></input>
            </div>
            <div class="container-area">
                <label for="descricao">Descrição</label>
                <textarea required rows="1" id="descricao" name="descricao" type="text" class="input-neutro"
                    placeholder="O que vai acontecer no evento?"></textarea>
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
                    <option value="1">sim</option>
                </select>
            </div>

            <button style="margin-top: 5px;" class="btn-neutro btn-default-primary">
                <ion-icon color="white" name="save-sharp"></ion-icon>
                salvar evento
            </button>

        </form>
    </div>
</div>

<div class="search-bar">
    <div class="container-search">
        <form action="/" method="GET" class="container-input">
            <label for="search">pesquisar</label>
            <input id="search" name="search" class="input-neutro" placeholder="Buscar por titulo do evento"></input>
            <ion-icon name="search-sharp"></ion-icon>
        </form>
    </div>

    <button id="btn-criar" class="btn-neutro btn-float-right btn-default-dark">
        <ion-icon color="white" name="add-sharp"></ion-icon>
        criar
    </button>
</div>

<main>
    <h1>teste</h1>
</main>

<script src="/js/eventos.js"></script>
@endsection