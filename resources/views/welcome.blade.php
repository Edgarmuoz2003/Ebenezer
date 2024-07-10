@extends('layouts.app')

@section('titulo', 'Ebenezer-Store')

@section('content')
<div class="container pb-4">
    <h1 class="text-center animated-title">Nuestros Productos Más Recientes</h1>

    @if ($productosRecientes->isNotEmpty())
    <div class="slider-container">
        <div class="slider">
            @foreach ($productosRecientes as $product)
            <div class="slider-item">
                <img src="{{ Storage::url($product->imagen) }}" alt="{{ $product->titulo }}">
                <div class="slider-caption">
                    <h5>{{ $product->titulo }}</h5>
                    <p>{{ $product->descripcion }}</p>
                </div>
            </div>
            @endforeach
            <!-- Duplicar los elementos para crear un efecto de bucle infinito -->
            @foreach ($productosRecientes as $product)
            <div class="slider-item">
                <img src="{{ Storage::url($product->imagen) }}" alt="{{ $product->titulo }}">
                <div class="slider-caption">
                    <h5>{{ $product->titulo }}</h5>
                    <p>{{ $product->descripcion }}</p>
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
        <div class="col-md-3">
            <img src="https://via.placeholder.com/300" class="img-fluid rounded">
            <h3 class="text-center">Categoría 1</h3>
        </div>
        <div class="col-md-3">
            <img src="https://via.placeholder.com/300" class="img-fluid rounded">
            <h3 class="text-center">Categoría 2</h3>
        </div>
        <div class="col-md-3">
            <img src="https://via.placeholder.com/300" class="img-fluid rounded">
            <h3 class="text-center">Categoría 3</h3>
        </div>
        <div class="col-md-3">
            <img src="https://via.placeholder.com/300" class="img-fluid rounded">
            <h3 class="text-center">Categoría 4</h3>
        </div>
    </div>
</div>

<!-- Sección de Testimonios -->
<div class="testimonials mt-5">
    <h2 class="text-center animated-title">Lo Que Dicen Nuestros Clientes</h2>
    <div class="row">
        <div class="col-md-4">
            <blockquote class="blockquote text-center">
                <p class="mb-0">"Excelente calidad y servicio."</p>
                <footer class="blockquote-footer">Cliente 1</footer>
            </blockquote>
        </div>
        <div class="col-md-4">
            <blockquote class="blockquote text-center">
                <p class="mb-0">"Muy recomendados, volveré a comprar."</p>
                <footer class="blockquote-footer">Cliente 2</footer>
            </blockquote>
        </div>
        <div class="col-md-4">
            <blockquote class="blockquote text-center">
                <p class="mb-0">"Gran variedad de productos."</p>
                <footer class="blockquote-footer">Cliente 3</footer>
            </blockquote>
        </div>
    </div>
</div>

@endsection





