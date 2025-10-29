@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Registrar Venta</h1>

    <form action="{{ route('sales.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Cliente</label>
            <select name="client_id" class="form-control" required>
                <option value="">Seleccione...</option>
                @foreach($clients as $client)
                    <option value="{{ $client->id }}">{{ $client->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Total Venta</label>
            <input type="number" step="0.01" name="total_sale" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Estado</label>
            <select name="state" class="form-control" required>
                <option value="pendiente">Pendiente</option>
                <option value="completada">Completada</option>
                <option value="cancelada">Cancelada</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Método de Pago</label>
            <select name="payment_method" class="form-control">
                <option value="">Ninguno</option>
                <option value="efectivo">Efectivo</option>
                <option value="tarjeta">Tarjeta</option>
                <option value="qr">QR</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Número de Factura</label>
            <input type="text" name="factura" class="form-control" maxlength="50">
        </div>

        <button class="btn btn-success">Guardar</button>
        <a href="{{ route('sales.index') }}" class="btn btn-secondary">Volver</a>
    </form>
</div>
@endsection
