@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Producto</h1>

    <form action="{{ route('products.update', $product) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-3">
            <label>Nombre</label>
            <input type="text" name="name" value="{{ $product->name }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Categoría</label>
            <select name="categorie_id" class="form-control" required>
                @foreach($categories as $c)
                    <option value="{{ $c->id }}" {{ $product->categorie_id == $c->id ? 'selected' : '' }}>
                        {{ $c->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Proveedor</label>
            <select name="provider_id" class="form-control">
                <option value="">Ninguno</option>
                @foreach($providers as $p)
                    <option value="{{ $p->id }}" {{ $product->provider_id == $p->id ? 'selected' : '' }}>
                        {{ $p->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Especificaciones</label>
            <textarea name="specifications" class="form-control">{{ $product->specifications }}</textarea>
        </div>
        <div class="mb-3">
            <label>Precio</label>
            <input type="number" step="0.01" name="price" value="{{ $product->price }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Stock</label>
            <input type="number" name="stock" value="{{ $product->stock }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Stock mínimo</label>
            <input type="number" name="stock_minimum" value="{{ $product->stock_minimum }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Descripción</label>
            <textarea name="description" class="form-control">{{ $product->description }}</textarea>
        </div>

        <button class="btn btn-success">Actualizar</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Volver</a>
    </form>
</div>
@endsection
