@extends('layouts.app')

@section('titulo', 'Ebenezer-Store')

@section('content')

<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="img/bienvenido.png" class="d-block w-100" alt="First slide">
        </div>
        <div class="carousel-item">
            <img src="img/baner2.png" class="d-block w-100" alt="Second slide">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<div class="container pb-4">
    <h1 class="text-center animated-title">Nuestros Productos Más Recientes</h1>

    @if ($productosRecientes->isNotEmpty())
        <div class="slider-container">
            <div class="slider">
                @foreach ($productosRecientes as $product)
                    <div class="slider-item">
                        <a href="{{ route('ruta_detalles', $product->id) }}">
                            <img src="{{ Storage::url($product->imagen) }}" alt="{{ $product->titulo }}">
                        </a>
                        
                        <div class="slider-caption">
                            <h5>{{ $product->titulo }}</h5>
                            <p>${{ number_format($product->precio, 0, ',', '.') }}</p>
                        </div>
                    </div>
                @endforeach
                <!-- Duplicar los elementos para crear un efecto de bucle infinito -->
                @foreach ($productosRecientes as $product)
                    <div class="slider-item">
                        <a href="{{ route('ruta_detalles', $product->id) }}">
                            <img src="{{ Storage::url($product->imagen) }}" alt="{{ $product->titulo }}">
                        </a>
                        
                        <div class="slider-caption">
                            <h5>{{ $product->titulo }}</h5>
                            <p>${{ number_format($product->precio, 0, ',', '.') }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <p class="text-center">No hay productos disponibles en este momento.</p>
    @endif
</div>

<!-- Sección de Categorías Destacadas -->
<div class="featured-categories mt-5">
    <h2 class="text-center animated-title">Categorías Destacadas</h2>
    <div class="row">
        @foreach ($productosDestacados as $product)
            <div class="col-md-3">
                <a href="{{ route('ruta_detalles', $product->id) }}">
                    <img src="{{ Storage::url($product->imagen) }}" class="img-fluid rounded" alt="{{ $product->titulo }}">
                </a>
                <h3 class="text-center">{{ $product->titulo }}</h3>
                <p>${{ number_format($product->precio, 0, ',', '.') }}</p>
            </div>
        @endforeach
    </div>
</div>

<!-- Sección de Testimonios -->
<div class="testimonials mt-5">
    <h2 class="text-center animated-title">Lo Que Dicen Nuestros Clientes</h2>
    <div class="row">
        <div class="col-md-4">
            <div class="testimonial-item">
                <img src="{{ asset('img/cliente1.jpg') }}" class="rounded-circle" alt="Cliente 1">
                <blockquote class="blockquote text-center">
                    <p class="mb-0">"Excelente calidad y servicio."</p>
                    <footer class="blockquote-footer">Yuli Muñoz - Medellin</footer>
                </blockquote>
            </div>
        </div>
        <div class="col-md-4">
            <div class="testimonial-item">
                <img src="{{ asset('img/cliente2.jpg') }}" class="rounded-circle" alt="Cliente 2">
                <blockquote class="blockquote text-center">
                    <p class="mb-0">"Muy recomendados, volveré a comprar."</p>
                    <footer class="blockquote-footer">Jhonny Isaza - Bogota </footer>
                </blockquote>
            </div>
        </div>
        <div class="col-md-4">
            <div class="testimonial-item">
                <img src="{{ asset('img/cliente3.jpg') }}" class="rounded-circle" alt="Cliente 3">
                <blockquote class="blockquote text-center">
                    <p class="mb-0">"Gran variedad de productos."</p>
                    <footer class="blockquote-footer">Sneider Arias - Cartagena</footer>
                </blockquote>
            </div>
        </div>
    </div>
</div>

@include('layouts.botonsubir')


@endsection
