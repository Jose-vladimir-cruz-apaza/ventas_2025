@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Detalle de Venta</h1>

    <form action="{{ route('sale_details.update', $saleDetail) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Venta</label>
            <select name="sale_id" class="form-control" required>
                @foreach($sales as $s)
                    <option value="{{ $s->id }}" {{ $saleDetail->sale_id == $s->id ? 'selected' : '' }}>
                        Venta #{{ $s->id }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Producto</label>
            <select name="product_id" class="form-control" required>
                @foreach($products as $p)
                    <option value="{{ $p->id }}" {{ $saleDetail->product_id == $p->id ? 'selected' : '' }}>
                        {{ $p->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Cantidad</label>
            <input type="number" name="quantity" value="{{ $saleDetail->quantity }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Precio Unitario</label>
            <input type="number" step="0.01" name="unit_price" value="{{ $saleDetail->unit_price }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Descuento</label>
            <input type="number" step="0.01" name="discount" value="{{ $saleDetail->discount }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Estado</label>
            <select name="status" class="form-control">
                @foreach(['active', 'returned', 'canceled'] as $st)
                    <option value="{{ $st }}" {{ $saleDetail->status == $st ? 'selected' : '' }}>
                        {{ ucfirst($st) }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Notas</label>
            <textarea name="notes" class="form-control">{{ $saleDetail->notes }}</textarea>
        </div>

        <button class="btn btn-success">Actualizar</button>
        <a href="{{ route('sale_details.index') }}" class="btn btn-secondary">Volver</a>
    </form>
</div>
@endsection
