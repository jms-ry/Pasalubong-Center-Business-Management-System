<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'PCBMS') }}</title>
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">


    @stack('style')
  <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
  </head>
  <body data-controller="footer-visibility">
    <div id="app">
      <div class="alert-container mt-2" data-controller="flash-message">
        @include('flash-messages')
      </div>
      <style>
        .alert-container {
          position: relative;
          height: 0; 
          opacity: 100%;
        }

        .alert {
          position: absolute;
          top: 0;
          left: 0;
          width: 100%;
          z-index: 1000; 
        }
      </style>
      @auth
        <nav class="navbar navbar-light bg-white shadow-sm ">
          <button class="navbar-toggler ms-4  text-success" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar" aria-controls="sidebar">
            <i class="bi bi-menu-button-wide-fill"></i>
          </button>
          <a class="navbar-brand text-primary fw-bold fs-4 mx-auto ">
            @if(request()->is('point-of-sale'))
              VSU PCBMS Point of Sales
            @else
              VSU Pasalubong Center Business Management System
            @endif
          </a>
          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav me-4">
            @guest
              @else
                <li class="nav-item dropdown">
                  <a id="navbarDropdown" class="nav-link dropdown-toggle text-primary fw-bold" href="#" role="button"     data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                  </a>

                  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown" style="position: absolute; z-index: 1000;">
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
        </nav>
      @endauth
      @include('sidebar')
      <main class="py-4">
        @yield('content')
      </main>
      @auth
        <footer class="bg-light text-dark text-center d-flex justify-content-center align-items-center fw-bold" >
          <p><i class="bi bi-c-circle"></i> 2024 VSU Pasalubong Center Business Management System.</p>
        </footer>
      @endauth
    </div>
    @stack('scripts')
  </body>
</html>
