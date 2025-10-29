@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Venta</h1>

    <form action="{{ route('sales.update', $sale) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Cliente</label>
            <select name="client_id" class="form-control" required>
                @foreach($clients as $client)
                    <option value="{{ $client->id }}" {{ $sale->client_id == $client->id ? 'selected' : '' }}>
                        {{ $client->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Total Venta</label>
            <input type="number" step="0.01" name="total_sale" value="{{ $sale->total_sale }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Estado</label>
            <select name="state" class="form-control" required>
                @foreach(['pendiente', 'completada', 'cancelada'] as $estado)
                    <option value="{{ $estado }}" {{ $sale->state == $estado ? 'selected' : '' }}>
                        {{ ucfirst($estado) }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Método de Pago</label>
            <select name="payment_method" class="form-control">
                <option value="">Ninguno</option>
                @foreach(['efectivo', 'tarjeta', 'qr'] as $metodo)
                    <option value="{{ $metodo }}" {{ $sale->payment_method == $metodo ? 'selected' : '' }}>
                        {{ ucfirst($metodo) }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Número de Factura</label>
            <input type="text" name="factura" value="{{ $sale->factura }}" class="form-control" maxlength="50">
        </div>

        <button class="btn btn-success">Actualizar</button>
        <a href="{{ route('sales.index') }}" class="btn btn-secondary">Volver</a>
    </form>
</div>
@endsection
