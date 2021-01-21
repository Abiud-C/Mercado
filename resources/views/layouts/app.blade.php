<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="/img/Logo-TuxMercado.png">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Mercado') }}</title>
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/loader-page.css">
    <link rel="stylesheet" href="/css/imgzoom.css">
    <link rel="stylesheet" href="/vendor/jquery-ui/jquery-ui.min.css">
    <link rel="stylesheet" href="/dropzone-5.7.0/dist/dropzone.css">
    

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <script src="https://kit.fontawesome.com/3415d5eee3.js" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script src="{{ asset('/vendor/jquery-ui/jquery-ui.min.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!--Scripts Personales-->
    <script src="{{ asset('js/mensaje.js') }}"></script>

    <script src="{{ asset('js/Ca_01.js') }}"></script>

    <script src="{{ asset('js/Po_01.js') }}"></script>

    <script src="{{ asset('js/Re_Pro_01.js') }}"></script>

    <script src="{{ asset('js/Venta_Pro_01.js') }}"></script>

    <script src="{{ asset('js/load.js') }}"></script>

    <script src="{{ asset('js/zoom.js') }}"></script>
    
    <script src="{{ asset('js/search.js') }}"></script>

    <script src="{{ asset('dropzone-5.7.0/dist/dropzone.js') }}"></script>

    <script src="{{ asset('js/Pregunta.js')}}"></script>

    <script src="{{ asset('js/RegisterUser.js')}}"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

</head>
<body style="background-color: #F5F5F5">
<div class="loader-page"></div>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="/img/Logo-TuxMercado.png" width="120" height="30" alt="Mercado Logo" class="brand-image  elevation-3"
             style="opacity: .8">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        @guest
                         <!-- Authentication Links -->
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar sesion') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                                </li>
                            @endif
                        @else
                        
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="far fa-user-circle"></i>  {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                   @switch(Auth::user()->roles[0]->Nombre)
                                   @case('Supervisor')
                                    <a class="dropdown-item" href="{{ url('Admin') }}"><i class="far fa-address-card"></i>
                                        {{ __('Cuenta') }}
                                    </a>
                                    @break

                                   @case('Encargado')
                                    <a class="dropdown-item" href="{{ url('Encargado') }}"><i class="far fa-address-card"></i>
                                        {{ __('Cuenta') }}
                                    </a>
                                    @break

                                   @case('Contador')
                                    <a class="dropdown-item" href="{{ url('Contador') }}"><i class="far fa-address-card"></i>
                                        {{ __('Cuenta') }}
                                    </a>
                                    @break
                                   @case('Comprador')
                                        <a class="dropdown-item" href="{{ url('Cliente') }}"><i class="far fa-address-card"></i>
                                            {{ __('Cuenta') }}
                                        </a>
                                        @break
                                    @default
                                        <a class="dropdown-item" href="{{ url('Cliente') }}"><i class="far fa-address-card"></i>
                                        {{ __('Cuenta') }}
                                        </a>
                                        @break
                                    @endswitch
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i>
                                        {{ __('Salir') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
            
        </main>
    </div>
    <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2020-2021 Abiu-Ma</p>
    <ul class="list-inline">
      <li class="list-inline-item"><a href="#">Privacy</a></li>
      <li class="list-inline-item"><a href="#">Terms</a></li>
      <li class="list-inline-item"><a href="#">Support</a></li>
    </ul>
  </footer>
</body>
</html>
