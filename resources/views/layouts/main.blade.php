<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        {{-- Fonte Google --}}
        <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">

        {{-- Importação BootStrap --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

        {{-- CSS --}}
        <link rel="stylesheet" href="{{asset('css/style.css')}}">

        <link rel="shortcut icon" href="favicon-32x32.png" type="image/x-icon">

        {{-- JS --}}
        <script src="/js/script.js"></script>
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a href="{{ route('index') }}">
                        <img src="{{ asset('img/users/' . auth()->user()->profile_photo_path) }}" class="rounded-circle border border-3 border-white shadow" style="width: 60px; height: 60px; object-fit: cover;" alt="Avatar">
                    </a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                           <li class="nav-item">
                                <a href="{{route('animals.create')}}" class="nav-link">Adicionar animais</a>
                           </li>
                           @auth
                            <li class="nav-item">
                                <a href="{{route('dashboard')}}" class="nav-link">Meus animais</a>
                           </li>

                           <li class="nav-item">
                                <form action="{{route('logout')}}" method="POST">
                                    @csrf
                                    <a
                                    href="/logout" class="nav-link" onclick="event.preventDefault();
                                    this.closest('form').submit();">Sair</a>
                                </form>
                           </li>
                           @endauth
                           @guest
                           <li class="nav-item">
                                <a href="/login" class="nav-link">Entrar</a>
                           </li>
                           <li class="nav-item">
                                <a href="/register" class="nav-link">Cadastrar</a>
                           </li>
                           @endguest
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <main>
            <div class="container-fluid">
                <div class="row">
                    @if(session('msg'))
                        <p class="msg">{{ session('msg')}}</p>
                    @endif

                    @if(session('error'))
                        <p class="error">{{session('error')}}</p>
                    @endif
                    @yield('content')
                </div>
            </div>
        </main>

        <footer>
            <p>Fernando Cordova &copy; 2026</p>
        </footer>

        {{-- Importação Bootstrap JS --}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

        {{-- Importação da biblioteca de Icones --}}

        <script type="module" src="https://unpkg.com/ionicons@8.0.13/dist/ionicons/ionicons.esm.js"></script>

        <script nomodule src="https://unpkg.com/ionicons@8.0.13/dist/ionicons/ionicons.js"></script>

    </body>
</html>
