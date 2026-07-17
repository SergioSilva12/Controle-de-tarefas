<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'FluxoTarefas') }}</title>

    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class="d-flex flex-column min-vh-100">
    <div id="app" class="d-flex flex-column flex-grow-1 w-100">
        <nav class="navbar navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <span style="font-weight: 700; font-size: 20px;">FluxoTarefas</span>
                </a>

                <div class="d-flex align-items-center">
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto align-items-center">
                        <!-- Authentication Links -->
                        <div class="nav-bar-login-registrar">
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">Entrar</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item-azul">
                                        <a class="nav-link" href="{{ route('register') }}">Registrar</a>
                                    </li>
                                @endif
                            @else
                        </div>
                                <li class="nav-item d-flex align-items-center gap-2">
                                    <span class="navbar-text me-2">{{ Auth::user()->name }}</span>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-flex m-0">
                                        @csrf
                                        <button type="submit" class="btn btn-link nav-link p-0">
                                            <img src="{{ asset('img/sair.svg') }}">
                                        </button>
                                    </form>
                                </li>
                            @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4 flex-grow-1">
            @yield('content')
        </main>

        <footer class="bg-light text-center py-3 mt-auto border-top">
            <small class="text-muted">© 2026 FluxoTarefas — feito para quem tem prazo pra cumprir.</small>
        </footer>
    </div>
</body>

</html>