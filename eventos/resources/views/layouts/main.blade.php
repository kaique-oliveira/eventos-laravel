<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap"
        rel="stylesheet">

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

    <link rel="stylesheet" href="/css/global.css">
</head>

<body>
    <header>
        <div class="container-logo">
            <a href="/"><ion-icon name="today-sharp"></ion-icon></a>
        </div>

        <nav class="navbar navbar-expand-sm navbar-dark" style="background-color: #2e2b41;">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="/">Eventos</a>
                    </li>
                    @auth
                    <li class="nav-item">
                        <a class="nav-link" href="/dashboard">Meus eventos</a>
                    </li>
                    <li class="nav-item">
                      <form action="/logout" method="POST">
                        @csrf
                        <a href="/logout"
                            class="nav-link"
                            onclick="event.preventDefault();
                            this.closest('form').submit();">Sair</a>
                      </form>
                    </li>
                    @endauth
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Entrar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/register">Cadastrar-se</a>
                    </li>
                    @endguest
                </ul>
            </div>
        </nav>
    </header>
    @yield('content')

    @if(session('msg'))
        <div id="mensagem" class="mensagem-wrapper">
            <div id="conteudo-mensagem">
                <h6>Tudo certo</h6>
                <p>{{session('msg')}}</p>
            </div>
        </div>

        <script>
            const msg = document.getElementById('mensagem');

            setTimeout(() => {
                msg.className = 'mensagem-wrapper-hide';
            }, 5000)
        </script>
    @endif

</body>

</html>