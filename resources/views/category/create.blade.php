@extends('layouts.app')
@section('content')
     <div class="container-fluid vh-100 d-flex align-items-center justify-content-center">
        <div class="row w-100 justify-content-center">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card shadow">
                    <div class="card-header bg-secondary text-white text-center py-3">
                        <h3 class="mb-0">Formulario de Categorías</h3>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('category.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombre" placeholder="Ingresa el nombre de la categoría" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="descripcion" class="form-label">Descripción</label>
                                <input type="text" class="form-control" id="descripcion" placeholder="Ingresa la descripción" name="description" required>
                            </div>
                            <div class="mb-3">
                                <label for="imagen" class="form-label">Imagen</label>
                                <input type="text" class="form-control" id="imagen" placeholder="Ingresa la URL de la imagen" name="imagen" required>
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Estado</label>
                                <select class="form-select" id="state" name="state">
                                    <option value="activo">Activo</option>
                                    <option value="inactivo">Inactivo</option>
                                </select>                                
                            </div>
                                <div class="d-flex justify-content-between mt-3">
                                <!-- Botón Enviar -->
                                <button type="submit" class="btn btn-dark d-flex align-items-center">
                                    <i class="bi bi-send-fill me-1"></i> Enviar
                                </button>
                                <!-- Botón Retroceder -->
                                <button type="button" class="btn btn-outline-dark d-flex align-items-center" onclick="history.back()">
                                    <i class="bi bi-arrow-left me-1"></i> Retroceder
                                </button>                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
