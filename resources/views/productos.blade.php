@extends('layouts.app')

@section('titulo', 'Ebenezer-Store')

@section('content')
    <h1 class="text-center pt-2">Gestión de Productos</h1>
    <div class="container">
        <!-- Button trigger modal -->
        <div class="d-flex justify-content-end mt-3">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Añadir Producto
            </button>
        </div>

        <div class="container mt-4">
            <div class="row">
                @foreach ($productos as $producto)
                    <div class="col-md-3 mb-4">
                        <div class="card h-100">
                            <img src="{{ Storage::url($producto->imagen) }}" class="card-img-top img-fluid imagen-producto"
                                alt="{{ $producto->titulo }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $producto->titulo }}</h5>
                                <p class="card-text">${{ number_format($producto->precio, 0, ',', '.') }}</p>

                                <div class="d-flex justify-content-between">
                                    <!-- Botón Editar -->
                                    <a href="{{ route('gestionProductos.edit', $producto->id) }}"
                                        class="btn btn-primary btn-sm">Editar</a>

                                    <!-- Botón Eliminar -->
                                    <form action="{{ route('gestionProductos.destroy', $producto->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="tituloModal">Guardar y Publicar productos</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('gestionProductos.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="titulo" class="form-label">Título de la publicación</label>
                                <input type="text" name="titulo" class="form-control" id="titulo" required>
                            </div>
                            <div class="mb-3">
                                <label for="imagen" class="form-label">Cargar Imagen</label>
                                <input type="file" name="imagen" class="form-control" id="imagen-producto"
                                    accept="image/*" required>
                            </div>
                            <div class="mb-3">
                                <label for="precio" class="form-label">Precio</label>
                                <input type="number" name="precio" class="form-control" id="precio" required>
                            </div>
                            <div class="mb-3">
                                <label for="descripcion" class="form-label">Descripción</label>
                                <textarea name="descripcion" class="form-control" id="Descripcion" cols="40" rows="5" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="categoria" class="form-label">Categoría</label>
                                <select name="categoria" id="categoria" class="form-select" required>
                                    <option value="Pijamas">Pijamas</option>
                                    <option value="Camisetas">Camisetas</option>
                                    <option value="Blusas">Blusas</option>
                                    <option value="Maquillaje">Maquillaje</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Tallas Disponibles</label>
                                <div class="row">
                                    <div class="col-6 col-sm-4 col-md-2">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="tallas_disponibles[]"
                                                id="tallaXS" value="XS">
                                            <label class="form-check-label" for="tallaXS">XS</label>
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-4 col-md-2">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="tallas_disponibles[]"
                                                id="tallaS" value="S">
                                            <label class="form-check-label" for="tallaS">S</label>
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-4 col-md-2">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="tallas_disponibles[]"
                                                id="tallaM" value="M">
                                            <label class="form-check-label" for="tallaM">M</label>
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-4 col-md-2">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="tallas_disponibles[]"
                                                id="tallaL" value="L">
                                            <label class="form-check-label" for="tallaL">L</label>
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-4 col-md-2">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="tallas_disponibles[]"
                                                id="tallaXL" value="XL">
                                            <label class="form-check-label" for="tallaXL">XL</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group form-check">
                                <input class="form-check-input" type="checkbox" name="destacado" id="destacado" value="1">
                                <label for="destacado" class="form-check-label">Marcar Como Destacado</label>
                            </div>

                            <div class="form-group form-check">
                                <input class="form-check-input" type="checkbox" name="enOferta" id="enOferta" value="1">
                                <label for="enOferta" class="form-check-label">Producto En Oferta</label>
                            </div>

                            <button type="submit" class="btn btn-primary">Publicar</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- script para que aparezca el swit alert --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let mensaje = '{{ session('success') }}';
            let error = '{{ session('error') }}';
            let deleted = '{{ session('deleted') }}';
            let errordeleted = '{{ session('errordeleted') }}';
            let updateSuccess = '{{ session('updateSuccess') }}';
            let updateError = '{{ session('updateError') }}';

            if (mensaje) {
                Swal.fire({
                    title: 'El producto Se ha guardado con Éxito!',
                    text: mensaje,
                    icon: 'success',
                    confirmButtonText: 'Aceptar'
                });
            }

            if (error) {
                Swal.fire({
                    title: '¡Ha ocurrido un error!',
                    text: error,
                    icon: 'error',
                    confirmButtonText: 'Aceptar'
                });
            }

            if (deleted) {
                Swal.fire({
                    title: '¡Eliminación Exitosa!',
                    text: deleted,
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 1500
                });
            }

            if (errordeleted) {
                Swal.fire({
                    title: '¡Ha ocurrido un error!',
                    text: errordeleted,
                    icon: 'error',
                    showConfirmButton: false,
                    timer: 1500
                });
            }

            if (updateSuccess) {
                Swal.fire({
                    title: '¡Actualización Exitosa!',
                    text: updateSuccess,
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 2000
                });
            }

            if (updateError) {
                Swal.fire({
                    title: '¡Ha ocurrido un error!',
                    text: updateError,
                    icon: 'error',
                    showConfirmButton: false,
                    timer: 2000
                });
            }
        });
    </script>

@include('layouts.botonsubir')
@endsection
