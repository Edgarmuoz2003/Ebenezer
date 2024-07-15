@extends('layouts.app')

@section('titulo', 'Ebenezer-Store')

@section('content')
<div class="container py-5">
    <h1 class="text-center mb-5">Sobre Nosotros</h1>

    <!-- Introducción -->
    <div class="row mb-5">
        <div class="col-md-6">
            <img src="{{ asset('img/Quienes-somos.jpg') }}" class="img-fluid" alt="Sobre Nosotros">
        </div>
        <div class="col-md-6 d-flex align-items-center">
            <div>
                <h2>Quiénes Somos</h2>
                <p>Somos Ebenezer-Store, una empresa dedicada a la venta de pijamas, camisetas y blusas de alta calidad. Nuestro objetivo es proporcionar comodidad y estilo a nuestros clientes a través de una amplia variedad de productos.</p>
            </div>
        </div>
    </div>

    <!-- Misión -->
    <div class="row mb-5">
        <div class="col-md-6 order-md-2">
            <img src="{{ asset('img/mision.jpg') }}" class="img-fluid" alt="Nuestra Misión">
        </div>
        <div class="col-md-6 d-flex align-items-center order-md-1">
            <div>
                <h2>Nuestra Misión</h2>
                <p>Nuestra misión es ofrecer productos de alta calidad que brindan confort y satisfacción a nuestros clientes, asegurándonos de que cada prenda sea confeccionada con los mejores materiales y un diseño excepcional.</p>
            </div>
        </div>
    </div>

    <!-- Visión -->
    <div class="row mb-5">
        <div class="col-md-6">
            <img src="{{ asset('img/vision.png') }}" class="img-fluid" alt="Nuestra Visión">
        </div>
        <div class="col-md-6 d-flex align-items-center">
            <div>
                <h2>Nuestra Visión</h2>
                <p>Nos visualizamos como líderes en el mercado de ropa cómoda y elegante, expandiendo nuestra presencia a nivel nacional e internacional, y siendo reconocidos por nuestra calidad y atención al cliente.</p>
            </div>
        </div>
    </div>

    <!-- Nuestro Equipo -->
    <div class="team-section">
        <h2 class="text-center mb-5">Nuestro Equipo</h2>
        <div class="row">
            <div class="col-md-4 text-center mb-4">
                <img src="{{ asset('img/gerente.PNG') }}"class="rounded-circle mb-3" alt="Miembro del equipo">
                <h4>Leicy Bader</h4>
                <p>Gerente</p>
            </div>
            <div class="col-md-4 text-center mb-4">
                <img src="{{ asset('img/admin.PNG') }}" class="rounded-circle mb-3" alt="Miembro del equipo">
                <h4>Edgar Muñoz</h4>
                <p>Administrador</p>
            </div>
            <div class="col-md-4 text-center mb-4">
                <img src="{{ asset('img/Secretaria.PNG') }}" class="rounded-circle mb-3" alt="Miembro del equipo">
                <h4>Laura Muñoz</h4>
                <p>Secretaria de Gerencia</p>
            </div>
        </div>
    </div>
</div>
@endsection

<style>
    .team-section img {
        width: 150px;
        height: 150px;
    }
</style>
