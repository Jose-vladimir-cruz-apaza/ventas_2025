@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Roles</h1>

    <a href="{{ route('rols.create') }}" class="btn btn-primary mb-3">Nuevo Rol</a>

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
                <th>ID</th><th>Nombre</th><th>Descripción</th><th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rols as $r)
                <tr>
                    <td>{{ $r->id }}</td>
                    <td>{{ $r->name }}</td>
                    <td>{{ $r->description ?? 'Sin descripción' }}</td>
                    <td>
                        <a href="{{ route('rols.edit', $r) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('rols.destroy', $r) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar este rol?')"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
