@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Productos</h1>

    <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Nuevo Producto</a>

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

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th><th>Nombre</th><th>Categoría</th><th>Proveedor</th><th>Precio</th><th>Stock</th><th>Nro serie</th><th>Activo</th><th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $p)
                <tr>
                    <td>{{ $p->id }}</td>
                    <td>{{ $p->name }}</td>
                    <td>{{ $p->category->name ?? 'Sin categoría' }}</td>
                    <td>{{ $p->provider->name ?? 'N/A' }}</td>
                    <td>${{ $p->price }}</td>
                    <td>{{ $p->stock }}</td>
                    <td>{{ $p->cod_prod }}</td>                    
                    <td>{{ $p->active ? 'Sí' : 'No' }}</td>
                    <td>
                        <a href="{{ route('products.edit', $p) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('products.destroy', $p) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar este producto?')"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
