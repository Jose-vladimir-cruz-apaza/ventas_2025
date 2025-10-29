@extends('layouts.app')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1>Proveedores</h1>
        <a href="{{ route('provider.create') }}" class="btn btn-success btn-sm">
            <i class="fas fa-plus"></i> Nuevo
        </a>
    </div>
@stop

@section('content')
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

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Lista de proveedores</h3>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Empresa</th>
                                <th>Contacto</th>
                                <th>Teléfono</th>
                                <th>Email</th>
                                <th>NIT</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>           
                        <tbody>
                            @foreach ($providers as $provider)
                                <tr>
                                    <td>{{ $provider->id }}</td>
                                    <td>{{ $provider->name }}</td>
                                    <td>{{ $provider->company }}</td>
                                    <td>{{ $provider->contact ?? '-' }}</td>
                                    <td>{{ $provider->phone }}</td>
                                    <td>{{ $provider->email ?? '-' }}</td>
                                    <td>{{ $provider->NIT }}</td>
                                    <td>
                                        <a href="{{ route('provider.edit', $provider->id) }}" class="btn btn-warning btn-sm mr-1">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <!-- Botón Eliminar -->
                                        <button class="btn btn-danger btn-sm" onclick="confirmDelete({{ $provider->id }})">
                                            <i class="fas fa-trash"></i>
                                        </button>

                                        <!-- Formulario oculto para eliminar -->
                                        <form id="delete-form-{{ $provider->id }}" action="{{ route('provider.destroy', $provider->id) }}" method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach                                     
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: '¿Estás seguro de eliminar este proveedor?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            });
        }
    </script>
@endsection
