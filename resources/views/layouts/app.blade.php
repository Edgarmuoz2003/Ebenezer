<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Ebenezer Store') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Importación de Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Importación de Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <!-- Importación de Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Importación de Bootstrap JS y Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

    {{-- importacion de sweetalert2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <header>
        {{-- Primer nav --}}
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand logo-nav" href="#">
                    <img src="{{ asset('img/logo-ebenezer.png')}} " alt="Logo Ebenezer" width="150" height="auto" class="d-inline-block align-text-top">
                </a>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="¿Qué estás buscando?" aria-label="Search" id="input-buscar" name="input-buscar">
                    <button class="btn btn-outline-success" type="submit" id="btn-buscar" name="btn-buscar">
                        <i class="fas fa-search" alt="Botón de Buscar"></i>
                    </button>
                </form>
                @guest
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Iniciar Sesión</a>
                        </li>
                    </ul>
                @else
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Bienvenido, {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Cerrar Sesión
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                @endguest
            </div>
        </nav>
        {{-- Final primer nav--}}

        {{-- Inicio segundo nav --}}
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarScroll">
                    <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('tienda') }}">Tienda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('nosotros') }}">Nosotros</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contactenos') }}">Contáctenos</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Categorías
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                                <li><a class="dropdown-item" href="#">Pijamas</a></li>
                                <li><a class="dropdown-item" href="#">Blusas</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#">Camisetas</a></li>
                                <li><a class="dropdown-item" href="#">Maquillaje</a></li>
                            </ul>
                        </li>
                        @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('gestionProductos.index') }} ">Gestionar Productos</a>
                        </li>
                        @endauth
                    </ul>
                    <a href="#"><i class="fas fa-shopping-cart"></i></a>
                </div>
            </div>
        </nav>
        {{-- Fin segundo nav --}}
    </header>
    <main>
        @yield('content') <!-- Espacio reservado para el contenido específico de cada vista hija -->
    </main>
    <footer class="footer text-center">
        <div class="contenedor">
            <div class="row">
                <div class="col-md-12">
                    <div class="contact-info">
                        <div class="social-icons">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-youtube"></i></a>
                            <a href="#"><i class="fab fa-tiktok"></i></a>
                        </div>
                        <p>+57 300 366 62 08 | <a href="#">lauraynataly@gmail.com</a></p>
                        <p>
                            <i class="fas fa-map-marker-alt"></i> Medellín: Calle 89 D #31-22 barrio Belen |
                            <i class="fas fa-map-marker-alt"></i> Montería: Diagonal 12 #4-24 B/La Granja |
                        </p>
                    </div>
                    <p>&copy; Copyright 2024 Ebenezer-Store All rights reserved. Nueve Seis Dos SAS | 1067888598-8</p>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
