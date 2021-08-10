<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Rahmah') }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito"
            rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
            crossorigin="anonymous">
    </head>

    <body>
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
                <div class="container">
                                        <a class="navbar-brand" href="{{ url('/') }}">
                        Rahmah 
                    </a>
                    <div class="collapse navbar-collapse"
                        id="navbarSupportedContent">

                        <!-- Right Side Of Navbar -->
                        
                        <ul class="navbar-nav ml-auto">
                            @if(Route::current()->getName() != 'register' && Route::current()->getName() != 'login')
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('logout') }}"> 
                                    Logout
                                </a>
                            </li>
                            @endif
                            <!-- Authentication Links -->
                         @if(Route::current()->getName() ==
                            'register')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Login</a>
                            </li>
                            @endif @if(Route::current()->getName() == 'login')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register')
                            }}">Register</a>
                        </li>
                        
                            @endif                 

                           
                        </ul>
                    </div>
                </div>
            </nav>

            <main class="py-4">
                @yield('content')
            </main>
        </div>
    </body>

</html>