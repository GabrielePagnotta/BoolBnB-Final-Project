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

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />




    <!-- Script Latitudine Longitudine -->
    <link rel="stylesheet" type="text/css"
        href="https://api.tomtom.com/maps-sdk-for-web/cdn/plugins/SearchBox/3.1.3-public-preview.0/SearchBox.css" />
    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.1.2-public-preview.15/services/services-web.min.js">
    </script>
    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/plugins/SearchBox/3.1.3-public-preview.0/SearchBox-web.js">
    </script>




    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand height-7 personal-bg-lightpink shadow-sm p-4 container-fluid d-flex justify-content-between align-items-center">

            <a class="personal-width" href="{{ url('/') }}">
                <img class="w-100" src="{{ asset('images/B.png') }}" alt="logo">
            </a>
            {{-- <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button> --}}

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link personal-text-LoginRegister"
                            href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link personal-text-LoginRegister"
                                href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <!-- username -->
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-danger" href="#"
                            role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <span class="personal-font-weight-900">{{ Auth::user()->first_name }}</span>
                        </a>
                        <!-- logut -->
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a href="{{ route('mainPage') }}" class="dropdown-item">I miei appartmenti</a>
                            <!-- <a href="{{ route('addApartment') }}" class="dropdown-item">Aggiungi appartamento</a> -->
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <!-- aggiungi appartamento -->
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>

                    </li>
                @endguest
            </ul>


        </nav>


    </div>
    <main class="py-4 personal-bg-lightpink-reverse height-93">
        @yield('content')
    </main>
    <footer>
    <div class="container-fluid d-flex justify-content-center footercontainer">
        <div class="text-center">
            <p>Developed by:</p>
            <div class="d-flex flex-wrap justify-content-center">
                <div>
                    <div class="mx-2 yuri"></div>
                    <p class="bold my-3">Yuri Di Domenico</p>
                </div>
                <div>
                    <div class="mx-2 ale"></div>
                    <p class="bold my-3">Alessia Carrera</p>
                </div>
                <div>
                    <div class="mx-2 andrea"></div>
                    <p class="bold my-3">Andrea Panzeri</p>
                </div>
                <div>
                    <div class="mx-2 gab"></div>
                    <p class="bold my-3">Gabriele Pagnotta</p>
                </div>


        </div>

        </div>
    </div>
    </footer>
    @yield('scripts')
</body>

</html>

<style>
    .height-7 {
        height: 7vh;
    }

    .height-93 {
        height: 93vh;
        overflow-y: scroll
    }

    .personal-bg-lightpink {
        background-image: linear-gradient(to bottom, #ffd2dc 20%, #fff0f3);
    }

    .personal-bg-lightpink-reverse {
        background-image: linear-gradient(to top, #ffd2dc 20%, #fff0f3);
    }

    .height-100 {
        height: 100vh;
    }

    .personal-text-LoginRegister {
        color: #ff3d60;
        font-weight: bold;
    }

    .nav-link:hover {
        transform: scale(1.1);
        letter-spacing: 0.1rem;
        color: #f33b5d;
        text-shadow: 0 0 30px #cb1515;
    }

    .personal-font-weight-900 {
        font-weight: 900;
    }
    .footercontainer{
        background-color: #e57b8e;
        color:white;
    }



    .yuri{
        background-image: url("{{asset('images/yuri.png')}}");
        width:200px;
        height: 200px;
        background-color: white;
        background-size:76%;
        background-repeat: no-repeat;
        background-position: center;
        border-radius: 100px 100px 100px 100px;
    }

    .ale{
        background-image: url("{{asset('images/alessia.jpg')}}");
        width:200px;
        height: 200px;
        background-color: white;
        background-size:95%;
        background-repeat: no-repeat;
        background-position: center;
        border-radius: 100px 100px 100px 100px;
    }
    .gab{
        background-image: url("{{asset('images/gab.png')}}");
        width:200px;
        height: 200px;
        background-color: white;
        background-size:91%;
        background-repeat: no-repeat;
        background-position: center;
        border-radius: 100px 100px 100px 100px;
    }
    .andrea{
        background-image: url("{{asset('images/andrea.png')}}");
        width:200px;
        height: 200px;
        background-color: white;
        background-size:91%;
        background-repeat: no-repeat;
        background-position:bottom;
        border-radius: 100px 100px 100px 100px;
    }


    .bold{
        font-weight: bold;
    }




    /* RESPONSIVE */
    .personal-width {
        width: 150px;
    }
</style>
