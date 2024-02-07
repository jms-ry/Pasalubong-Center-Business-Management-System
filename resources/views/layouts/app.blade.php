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
    
    
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        @auth
            <nav class="navbar navbar-light bg-white shadow-sm ">
                <button class="navbar-toggler ms-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar" aria-controls="sidebar">
                    <span class="navbar-toggler-icon fw-bold"></span>
                </button>
                <a class="navbar-brand text-primary fw-bold fs-4 mx-auto ">
                    VSU Pasalubong Center Business Management System
                </a>
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav me-3">
                    @guest
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-primary fw-bold" href="#" role="button"          data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
            </nav>
           
        @endauth
        <div class="offcanvas offcanvas-start bg-dark" tabindex="-1" id="sidebar" aria-labelledby="sidebarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title text-light fw-bold" id="sidebarLabel">Store Administration</h5>
                <button type="button" class="btn-close text-light fw-bold" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <div class="d-grid gap-2">
                    <button class="btn btn-lg btn-success fw-bold text-light" type="button">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-grid me-2 fs-3"></i>
                            <span class="flex-grow-1">Dashboard</span>
                        </div>
                    </button>
                    <button class="btn btn-lg btn-success fw-bold text-light" type="button">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-people me-2 fs-3"></i>
                            <span class="flex-grow-1">Employees</span>
                        </div>
                    </button>
                    <button class="btn btn-lg btn-success fw-bold text-light" type="button">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-person-vcard-fill me-2 fs-3"></i>
                            <span class="flex-grow-1">Customers</span>
                        </div>
                    </button>
                    <button class="btn btn-lg btn-success fw-bold text-light" type="button">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-person-workspace me-2 fs-3"></i>
                            <span class="flex-grow-1">Accounts</span>
                        </div>
                    </button>
                </div>
            </div>
        </div>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
