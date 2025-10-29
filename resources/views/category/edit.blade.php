@extends('layouts.app')
@section('content')
     <div class="container-fluid vh-100 d-flex align-items-center justify-content-center">
        <div class="row w-100 justify-content-center">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card shadow">
                    <div class="card-header bg-secondary text-white text-center py-3">
                        <h3 class="mb-0">
                            @isset($category)
                                Editar Categoría
                            @else
                                Formulario de Categorías
                            @endisset
                        </h3>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ isset($category) ? route('category.update', $category->id) : route('category.store') }}" method="POST">
                            @csrf
                            @if(isset($category))
                                @method('PUT')
                            @endif
                            
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <select class="form-control" id="nombre" name="name" required>
                                    <option value="">-- Selecciona una categoría --</option>
                                    <option value="Computadoras" 
                                        {{ (isset($category) && $category->name == 'Computadoras') || old('name') == 'Computadoras' ? 'selected' : '' }}>
                                        Computadoras
                                    </option>
                                    <option value="Electrodomésticos" 
                                        {{ (isset($category) && $category->name == 'Electrodomésticos') || old('name') == 'Electrodomésticos' ? 'selected' : '' }}>
                                        Electrodomésticos
                                    </option>
                                    <option value="Componentes electronicos" 
                                        {{ (isset($category) && $category->name == 'Componentes electronicos') || old('name') == 'Componentes electronicos' ? 'selected' : '' }}>
                                        Componentes electrónicos
                                    </option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="descripcion" class="form-label">Descripción</label>
                                <input type="text" class="form-control" id="descripcion" placeholder="Ingresa la descripción" name="description" value="{{ isset($category) ? $category->description : old('description') }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="state" class="form-label">Estado</label>
                                <select class="form-select" id="state" name="state">
                                    <option value="activo" {{ (isset($category) && $category->state == 'activo') ? 'selected' : '' }}>Activo</option>
                                    <option value="inactivo" {{ (isset($category) && $category->state == 'inactivo') ? 'selected' : '' }}>Inactivo</option>
                                </select>                                
                            </div>
                            <div class="d-flex justify-content-between mt-3">                                
                                <button type="submit" class="btn btn-dark d-flex align-items-center">
                                    <i class="bi bi-send-fill me-1"></i> 
                                    @isset($category)
                                        Actualizar
                                    @else
                                        Enviar
                                    @endisset
                                </button>                                
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