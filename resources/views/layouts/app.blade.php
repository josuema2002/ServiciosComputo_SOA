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
    <script src="{{ asset('js/titulo.js') }}" defer></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('jquery-ui-1.13.0.custom/jquery-ui.min.css') }}">

    <!--Icons-->
    <link href="{{ asset('css/icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('css/icons/bootstrap-icons.css') }}" rel="stylesheet">

</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark shadow-sm pri fixed-top">
            <div class="container-xxl">
                <a class="tituloHeader navbar-brand text-white fs-3" href="{{ url('/') }}">
                    Servicios Computo
                </a>

                <button class="navbar navbar-toggler navbar-dark bg-dark border-0" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse footerResponsivo" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                        <form action="" id="formsearch" class="form-inline mt-2 mt-md-0 position-relative mb-0"
                            autocomplete="on" method="GET">
                            @csrf
                            {{method_field('GET')}}
                            <input class="form-control mr-sm-2 sec border-primary placeholder-white text-white"
                                type="text" placeholder="Buscar" aria-label="Search" id="search" autocomplete="on">
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
                        <a class="nav-link text-white" href="{{ url('/hardware') }}">Hardware</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ url('/software') }}">Software</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ url('/ayuda') }}">Ayuda</a>
                        </li>

                        _
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif

                        <!--Boton para registrar usuario-->
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                    
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="bi bi-person"></i> {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right"
                                aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>

                                <a class="dropdown-item" href="{{ url('perfil/') }}">
                                    {{ __('Perfil') }}
                                </a>
                            </div>

                        </li>
                        @endguest

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
                    </ul>

                </div>
            </div>
        </nav>
    </div>

</body>

<script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>

<script src="{{ asset('jquery-ui-1.13.0.custom/jquery-ui.min.js') }}"></script>

<script src="https://maps.googleapis.com/maps/api/js?key=&callback=iniciarMapa"></script>


<script>
    enviar = false;
    mensaje = ['No hay servicios a lo que mencionas :(','o esta deshabilitado en este momento'];
    $('#search').autocomplete({
        source: function (request, response) {
            $.ajax({
                url: "{{route('buscar.servicio')}}",
                dataType: 'json',
                data: {
                    term: request.term
                },
                success: function (data) {
                    console.log(data);
                    d = data;

                    var dato1 = '', dato2 = '', dato3 = '', dato4 = '', dato5 = '';
                    var datos = [];
                    if (d[0] != undefined) {
                        dato1 = d[0];
                        datos[0] = dato1;
                    }
                    if (d[1] != undefined) {
                        dato2 = d[1];
                        datos[1] = dato2;
                    }
                    if (d[2] != undefined) {
                        dato3 = d[2];
                        datos[2] = dato3;
                    }
                    if (d[3] != undefined) {
                        dato4 = d[3];
                        datos[3] = dato4;
                    }
                    if (d[4] != undefined) {
                        dato5 = d[4];
                        datos[4] = dato5;
                    }

                    if (d[0] != undefined) {
                        response(datos);
                        enviar = true;
                        console.log(datos[0].id);
                        
                    } else {
                        response(mensaje);
                        enviar = false;
                    }
                }
            });
        }
    });

    $('#search').change(function () {
        $('#search').val().trim();
        for (let i = 0; i < 5; i++) {
            if (enviar && $('#search').val() == d[i].value) {
                $('#formsearch').attr('action', "{{url('/servicio')}}" + "/" + d[i].id);
            }
        }
        if (enviar==false || $('#search').val() != d[0].value) {
            $('#formsearch').attr('action', "");
            document.getElementById('formsearch').addEventListener('submit', function (e) {
                Location.href = "{{url('/servicio')}}";
                alert('Lo que buscas no existe')
            });
        }
    });

</script>

</html>
