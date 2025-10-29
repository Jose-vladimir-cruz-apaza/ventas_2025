@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Detalles de Ventas</h1>

    <a href="{{ route('sale_details.create') }}" class="btn btn-primary mb-3">Nuevo Detalle</a>

    @if(session('success'))
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                title: '¡Éxito!',
                text: @json(session('success')),
                icon: 'success',
                timer: 2000,
                showConfirmButton: false
            });
        </script>
    @endif

    <table class="table table-bordered table-hover">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Venta</th>
                <th>Producto</th>
                <th>Código</th>
                <th>Cantidad</th>
                <th>Precio Unit.</th>
                <th>Descuento</th>
                <th>Subtotal</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($saleDetails as $d)
                <tr>
                    <td>{{ $d->id }}</td>
                    <td>#{{ $d->sale_id }}</td>
                    <td>{{ $d->product_name }}</td>
                    <td>{{ $d->product_code ?? '—' }}</td>
                    <td>{{ $d->quantity }}</td>
                    <td>${{ number_format($d->unit_price, 2) }}</td>
                    <td>${{ number_format($d->discount, 2) }}</td>
                    <td>${{ number_format($d->subtotal, 2) }}</td>
                    <td>
                        <span class="badge 
                            @if($d->status == 'active') bg-success 
                            @elseif($d->status == 'returned') bg-warning 
                            @else bg-danger @endif">
                            {{ ucfirst($d->status) }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('sale_details.edit', $d) }}" class="btn btn-sm btn-warning">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('sale_details.destroy', $d) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar este detalle?')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
