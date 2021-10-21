<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Servicios Computo</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!--Icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">

</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark shadow-sm pri fixed-top">
            <div class="container">
                <a class="navbar-brand text-white" href="{{ url('/') }}">
                    Servicios Computo
                </a>

                <button class="navbar navbar-toggler navbar-dark bg-dark border-0" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                        <form class="form-inline mt-2 mt-md-0 position-relative">
                            <input class="form-control mr-sm-2 sec border-primary placeholder-white text-white"
                                type="text" placeholder="Buscar" aria-label="Search">
                            <button class="btn text-primary my-2 my-sm-0" style="margin-left: -50px;" type="submit"><i
                                    class="bi bi-search"></i></button>
                        </form>

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto text-white">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ url('/Qsomos') }}">Que somos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('login') }}">Hardware</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('login') }}">Software</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ url('/ayuda') }}">Ayuda</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4 mt-5">
            @yield('content')
        </main>

        <nav class="navbar navbar-expand-md navbar-light shadow-sm pri">
            <div class="container">
                <a class="navbar-brand text-white" href="{{ url('/') }}">
                    Servicios Computo
                </a>

                <div class="d-flex" id="">
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto text-white mx-3">

                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ url('/ayuda') }}">Ayuda</a>
                        </li>

                    </ul>

                    <ul class="navbar-nav ml-auto text-white">

                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">

                            <div class="dropdown-menu dropdown-menu-top dropdown-menu-right"
                                aria-labelledby="navbarDropdown" style="bottom: 100% !important; min-width: 7rem !important;">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>

                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                        </li>
                        @endguest

                    </ul>

                </div>
            </div>
        </nav>
    </div>
</body>

</html>
