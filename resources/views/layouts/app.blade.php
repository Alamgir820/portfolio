<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">


    <link href="{{ asset('public/frontend') }}/img/favicon.png" rel="icon">
    <link href="{{ asset('public/frontend') }}/img/apple-touch-icon.png" rel="apple-touch-icon">
  
    <!-- Bootstrap CSS File -->
    <link href="{{ asset('public/frontend') }}/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" >
    
    <link href="{{ asset('public/frontend') }}/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"  />
    <link href="{{ asset('public/frontend') }}/lib/animate/animate.min.css" rel="stylesheet">
    <link href="{{ asset('public/frontend') }}/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="{{ asset('public/frontend') }}/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="{{ asset('public/frontend') }}/lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('public/backend/plugins/toastr/toastr.min.css') }}">
  
    <!-- Main Stylesheet File -->
    <link href="{{ asset('public/frontend') }}/css/style.css" rel="stylesheet">



    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                
                            @endif

                            @if (Route::has('register'))
                               
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
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




<!-- JavaScript Libraries -->
<script src="{{ asset('public/frontend') }}/lib/jquery/jquery.min.js"></script>
<script src="{{ asset('public/backend') }}/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="{{ asset('public/backend') }}/plugins/jquery/jquery.min.js"></script>
<script src="{{ asset('public/frontend') }}/lib/jquery/jquery-migrate.min.js"></script>
<script src="{{ asset('public/frontend') }}/lib/popper/popper.min.js"></script>
<script src="{{ asset('public/frontend') }}/lib/bootstrap/js/bootstrap.min.js"></script>
<script src="{{ asset('public/frontend') }}/lib/easing/easing.min.js"></script>

<script src="{{ asset('public/frontend') }}/lib/counterup/jquery.waypoints.min.js"></script>
<script src="{{ asset('public/frontend') }}/lib/counterup/jquery.counterup.js"></script>
<script src="{{ asset('public/frontend') }}/lib/owlcarousel/owl.carousel.min.js"></script>
<script src="{{ asset('public/frontend') }}/lib/lightbox/js/lightbox.min.js"></script>
<script src="{{ asset('public/frontend') }}/lib/typed/typed.min.js"></script>
<script src="{{ asset('public/backend') }}/plugins/sweetalert/sweetalert.min.js"></script>
<script src="{{ asset('public/backend') }}/plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="{{ asset('public/backend') }}/plugins/toastr/toastr.min.js"></script>
<script src="{{ asset('public/frontend') }}/js/bootstrap.min.js"></script>
<script src="{{ asset('public/frontend') }}/js/bootstrap.bundle.min.js"></script>





<!-- Contact Form JavaScript File -->
<script src="{{ asset('public/frontend') }}/contactform/contactform.js"></script>

<!-- Template Main Javascript File -->
<script src="{{ asset('public/frontend') }}/js/main.js"></script>






</body>
</html>
