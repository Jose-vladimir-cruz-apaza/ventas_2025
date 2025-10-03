@extends('layouts.app')
@section('content')
<div class="container-fluid vh-100 d-flex align-items-center justify-content-center">
    <div class="row w-100 justify-content-center">
        <div class="col-12 col-md-10 col-lg-8 col-xl-6">
            <div class="card shadow">
                <div class="card-header bg-secondary text-white text-center py-3">
                    <h3 class="mb-0">
                        @isset($product)
                            Editar Producto
                        @else
                            Formulario de Productos
                        @endisset
                    </h3>
                </div>
                <div class="card-body p-4">
                    <form action="{{ isset($product) ? route('product.update', $product->id) : route('product.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if(isset($product))
                            @method('PUT')
                        @endif
                        
                        <!-- Campos organizados en 2 por fila -->
                        <div class="row row-cols-1 row-cols-md-2 g-3">
                            <div class="col">
                                <label for="nombre" class="form-label">Nombre *</label>
                                <input type="text" class="form-control" id="nombre" name="nombre"
                                    value="{{ isset($product) ? $product->nombre : old('nombre') }}" required>
                                @error('nombre') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>
                            <div class="col">
                                <label for="marca" class="form-label">Marca *</label>
                                <input type="text" class="form-control" id="marca" name="marca"
                                    value="{{ isset($product) ? $product->marca : old('marca') }}" required>
                                @error('marca') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>
                            <div class="col">
                                <label for="modelo" class="form-label">Modelo *</label>
                                <input type="text" class="form-control" id="modelo" name="modelo"
                                    value="{{ isset($product) ? $product->modelo : old('modelo') }}" required>
                                @error('modelo') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>
                            <div class="col">
                                <label for="codigo_product" class="form-label">Código Producto *</label>
                                <input type="text" class="form-control" id="codigo_product" name="codigo_product"
                                    value="{{ isset($product) ? $product->codigo_product : old('codigo_product') }}" required>
                                @error('codigo_product') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>
                            <div class="col">
                                <label for="precio" class="form-label">Precio *</label>
                                <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input type="number" step="0.01" class="form-control" id="precio" name="precio"
                                        value="{{ isset($product) ? $product->precio : old('precio') }}" required>
                                </div>
                                @error('precio') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>
                            <div class="col">
                                <label for="stock" class="form-label">Stock *</label>
                                <input type="number" class="form-control" id="stock" name="stock"
                                    value="{{ isset($product) ? $product->stock : old('stock') }}" required>
                                @error('stock') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>
                            <div class="col">
                                <label for="category_id" class="form-label">Categoría *</label>
                                <select class="form-select" id="category_id" name="category_id" required>
                                    <option value="">Seleccione una categoría</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ (isset($product) && $product->category_id == $category->id) || old('category_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>
                            <div class="col">
                                <label for="imagen" class="form-label">Imagen</label>
                                <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*">
                                @error('imagen') <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <!-- Descripción ocupa toda la fila -->
                        <div class="mt-3">
                            <label for="description" class="form-label">Descripción</label>
                            <textarea class="form-control" id="description" name="description" rows="3">{{ isset($product) ? $product->description : old('description') }}</textarea>
                            @error('description') <div class="text-danger small">{{ $message }}</div> @enderror
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <button type="submit" class="btn btn-dark d-flex align-items-center">
                                <i class="bi bi-send-fill me-1"></i>
                                @isset($product) Actualizar Producto @else Guardar Producto @endisset
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
