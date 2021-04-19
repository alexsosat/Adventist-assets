<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="{{ asset('js/dropdowns.js') }}"></script>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js" defer></script>



    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Merriweather">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Drag-Drop-File-Input-Upload.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Footer-Dark.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Navigation-with-Button.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Team-Boxed.css') }}">

</head>

<body>
    <div id="app">
        <div id="page-content">
            <nav class="navbar navbar-light navbar-expand-md navigation-clean-button" id="navbar">
                <div class="container"><a class="navbar-brand" href="{{ url('/') }}"><img id="nav-logo"
                            src="{{ asset('img/logo-nav.svg') }}"></a><button data-toggle="collapse"
                        class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle
                            navigation</span><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navcol-1">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('publications.index') }}">Buscar
                                    departamento</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ url('/about') }}">Acerca de
                                    nosotros</a></li>
                        </ul>
                        @if (Route::has('login'))
                            @auth

                                <div class="dropdown">
                                    <button class="btn btn-block text-left dropdown-button-filter nav_user"
                                        aria-expanded="false" data-toggle="dropdown" type="button">
                                        <div class="d-flex align-items-center">
                                            <div class="rounded-circle nav-circle-image"
                                                style="background: url(/users/profile_images/{{ Auth::user()->id }}) center / cover no-repeat;">
                                            </div>
                                            <span class="font-weight-bold">{{ Auth::user()->name }}</span>
                                            <i class="fas fa-sort-down ml-2"></i>
                                        </div>
                                    </button>
                                    <div class="dropdown-menu dropdown-type">
                                        <a class="dropdown-item" href="{{ route('users.show', Auth::user()->id) }}">
                                            {{ __('info') }}
                                        </a>

                                        <a class="dropdown-item"
                                            href="{{ route('users.publications', Auth::user()->id) }}">
                                            {{ __('Publicaciones') }}
                                        </a>

                                        <a class="dropdown-item text-danger mt-3" href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </div>

                            @else
                                <span class="navbar-text actions"> <a class="login" href="{{ route('login') }}">Log
                                        In</a>
                                    @if (Route::has('register'))
                                        <a class="btn btn-primary rounded text-white" role="button" id="sign-up"
                                            href="{{ route('register') }}">Sign up</a>
                                    @endif
                                </span>
                            @endauth
                        @endif
                    </div>
                </div>
            </nav>

            <main class="py-4">
                @yield('content')
            </main>

        </div>
        <footer class="footer-dark">
            <div class="container"><img class="mx-auto d-block" src="{{ asset('img/logoadv.svg') }}">
                <p class="copyright">Adv. Assets</p>
            </div>
        </footer>

    </div>

</body>

</html>
