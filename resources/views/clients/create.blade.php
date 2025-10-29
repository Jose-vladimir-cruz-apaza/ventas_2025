@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Crear Cliente</h2>

    <form action="{{ route('clients.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Nombre</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
            <label>Apellido</label>
            <input type="text" name="last_name" class="form-control" value="{{ old('last_name') }}" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
        </div>

        <div class="mb-3">
            <label>Teléfono</label>
            <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
        </div>

        <div class="mb-3">
            <label>Dirección</label>
            <textarea name="direction" class="form-control">{{ old('direction') }}</textarea>
        </div>        

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('clients.index') }}" class="btn btn-secondary">Volver</a>
    </form>
</div>
@endsection
