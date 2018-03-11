<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
  <link rel="stylesheet" href="{{mix('css/app.css')}}">
</head>
<body>
    <div id="app" class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light static-top toggleable-md bg-faded">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Mastery
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                      <li class="nav-item">
                        <form class="" action="/messages">
                          <div class="input-group">
                            <input type="text" name="query" required class="form-control" placeholder="Buscar...">
                            <span class="input-group-btn">
                              <button class="btn btn-outline-success">Buscar</button>
                            </span>
                          </div>
                        </form>
                      </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">{{ __('Ingresar') }}</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">{{ __('Registrarse') }}</a></li>
                        @else
                          {{-- Notificaciones --}}
                          <li class="nav-item dropdown mr-2 mt-2">
                            <a href="/" class="dropdown-toggle" data-toggle="dropdown">
                              Notificaciones
                              <span class="caret"></span>
                            </a>
                            {{-- Error --}}
                              <notifications :user="{{ Auth::user()->id}}">

                              </notifications>
                              {{-- Error --}}
                          </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                          {{-- Notificaciones --}}

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Salir') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
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

    <!-- Scripts -->
    <script src="{{mix('js/app.js')}}">

    </script>
</body>
</html>
