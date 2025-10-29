@extends('layouts.app')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if(session('success'))
<script>
Swal.fire({
    icon: 'success',
    title: '¡Éxito!',
    text: '{{ session('success') }}',
    confirmButtonText: 'Aceptar'
});
</script>
@endif

@if(session('error'))
<script>
Swal.fire({
    icon: 'error',
    title: 'Error',
    text: '{{ session('error') }}',
    confirmButtonText: 'Entendido'
});
</script>
@endif

<div class="container">
    <h1>Registrar Detalle de Venta</h1>

    <form action="{{ route('sale_details.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Venta</label>
            <select name="sale_id" class="form-control" required>
                <option value="">Seleccione...</option>
                @foreach($sales as $s)
                    <option value="{{ $s->id }}">Venta #{{ $s->id }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Producto</label>
            <select name="product_id" class="form-control" required>
                <option value="">Seleccione...</option>
                @foreach($products as $p)
                    <option value="{{ $p->id }}">{{ $p->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Cantidad</label>
            <input type="number" name="quantity" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Precio Unitario</label>
            <input type="number" step="0.01" name="unit_price" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Descuento</label>
            <input type="number" step="0.01" name="discount" class="form-control" value="0">
        </div>

        <div class="mb-3">
            <label>Estado</label>
            <select name="status" class="form-control">
                <option value="active">Activo</option>
                <option value="returned">Devuelto</option>
                <option value="canceled">Cancelado</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Notas</label>
            <textarea name="notes" class="form-control"></textarea>
        </div>

        <button class="btn btn-success">Guardar</button>
        <a href="{{ route('sale_details.index') }}" class="btn btn-secondary">Volver</a>
    </form>
</div>
@endsection
