@extends('layouts.app')

@section('titulo', 'Ebenezer-Store')

@section('content')
    <h1 class="text-center">Gestión de Productos</h1>
    <div class="container">
        <!-- Button trigger modal -->
        <div class="d-flex justify-content-end mt-3">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Añadir Producto
            </button>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                              <label for="titulo" class="form-label">Título de la publicación</label>
                              <input type="text" name="titulo" class="form-control" id="titulo" >
                            </div>
                            <div class="mb-3">
                              <label for="imagen" class="form-label">Cargar Imagen</label>
                              <input type="file" name="imagen" class="form-control" id="imagen-producto" accept="image/*" >
                            </div>
                            <div class="mb-3 form-check">
                              <input type="checkbox" class="form-check-input" id="exampleCheck1">
                              <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div>
                            <!-- Cierre correcto del formulario -->
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary">Guardar Cambios</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
