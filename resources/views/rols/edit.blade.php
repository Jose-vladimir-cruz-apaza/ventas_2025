@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Rol</h1>

    <form action="{{ route('rols.update', $rol) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-3">
            <label>Nombre</label>
            <input type="text" name="name" value="{{ $rol->name }}" class="form-control" required maxlength="50">
        </div>

        <div class="mb-3">
            <label>Descripción</label>
            <textarea name="description" class="form-control" maxlength="255">{{ $rol->description }}</textarea>
        </div>

        <button class="btn btn-success">Actualizar</button>
        <a href="{{ route('rols.index') }}" class="btn btn-secondary">Volver</a>
    </form>
</div>
@endsection
