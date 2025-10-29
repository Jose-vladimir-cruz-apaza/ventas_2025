@extends('layouts.app')

@section('content')
@if(session('success'))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Swal.fire({
            title: '¡Éxito!',
            text: @json(session('success')), // mensaje enviado desde Laravel
            icon: 'success',
            timer: 2000, // 2 segundos
            showConfirmButton: false // no muestra botón de confirmar
        });            
    </script>
@endif
<div class="container">
    <h2>Clientes</h2>
    <a href="{{ route('clients.create') }}" class="btn btn-success mb-3">Nuevo Cliente</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Dirección</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clients as $client)
            <tr>
                <td>{{ $client->name }}</td>
                <td>{{ $client->last_name }}</td>
                <td>{{ $client->email }}</td>
                <td>{{ $client->phone }}</td>
                <td>{{ $client->direction }}</td>
                <td>
                    <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-warning btn-sm mr-1"><i class="fas fa-edit"></i></a>
                    <form action="{{ route('clients.destroy', $client->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
