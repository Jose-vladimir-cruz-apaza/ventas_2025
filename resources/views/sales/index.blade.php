@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Ventas</h1>

    <a href="{{ route('sales.create') }}" class="btn btn-primary mb-3">Nueva Venta</a>

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
                <th>Cliente</th>
                <th>Usuario</th>
                <th>Total</th>
                <th>Fecha</th>
                <th>Estado</th>
                <th>Método de Pago</th>
                <th>Factura</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sales as $sale)
                <tr>
                    <td>{{ $sale->id }}</td>
                    <td>{{ $sale->client->name ?? 'Sin cliente' }}</td>
                    <td>{{ $sale->user->name ?? 'N/A' }}</td>
                    <td>${{ number_format($sale->total_sale, 2) }}</td>
                    <td>{{ \Carbon\Carbon::parse($sale->date_sale)->format('d/m/Y H:i') }}</td>
                    <td>
                        <span class="badge 
                            @if($sale->state == 'pendiente') bg-warning 
                            @elseif($sale->state == 'completada') bg-success 
                            @else bg-danger @endif">
                            {{ ucfirst($sale->state) }}
                        </span>
                    </td>
                    <td>{{ ucfirst($sale->payment_method ?? 'N/A') }}</td>
                    <td>{{ $sale->factura ?? '—' }}</td>
                    <td>
                        <a href="{{ route('sales.edit', $sale) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('sales.destroy', $sale) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar esta venta?')">
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
