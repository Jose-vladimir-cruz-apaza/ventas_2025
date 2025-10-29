@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Cliente</h2>

    <form action="{{ route('clients.update', $client->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nombre</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $client->name) }}" required>
        </div>

        <div class="mb-3">
            <label>Apellido</label>
            <input type="text" name="last_name" class="form-control" value="{{ old('last_name', $client->last_name) }}" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $client->email) }}" required>
        </div>

        <div class="mb-3">
            <label>Teléfono</label>
            <input type="text" name="phone" class="form-control" value="{{ old('phone', $client->phone) }}">
        </div>

        <div class="mb-3">
            <label>Dirección</label>
            <textarea name="direction" class="form-control">{{ old('direction', $client->direction) }}</textarea>
        </div>
        

        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('clients.index') }}" class="btn btn-secondary">Volver</a>
    </form>
</div>
@endsection
