@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Producto</h1>

    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nombre</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Categoría</label>
            <select name="categorie_id" class="form-control" required>
                <option value="">Seleccione...</option>
                @foreach($categories as $c)
                    <option value="{{ $c->id }}">{{ $c->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Proveedor</label>
            <select name="provider_id" class="form-control">
                <option value="">Ninguno</option>
                @foreach($providers as $p)
                    <option value="{{ $p->id }}">{{ $p->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Especificaciones</label>
            <textarea name="specifications" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label>Precio</label>
            <input type="number" step="0.01" name="price" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Stock</label>
            <input type="number" name="stock" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Stock mínimo</label>
            <input type="number" name="stock_minimum" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Descripción</label>
            <textarea name="description" class="form-control"></textarea>
        </div>

        <button class="btn btn-success">Guardar</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Volver</a>
    </form>
</div>
@endsection
