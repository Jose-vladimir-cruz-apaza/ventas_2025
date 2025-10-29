@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Rol</h1>

    <form action="{{ route('rols.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nombre</label>
            <input type="text" name="name" class="form-control" required maxlength="50">
        </div>

        <div class="mb-3">
            <label>Descripción</label>
            <textarea name="description" class="form-control" maxlength="255"></textarea>
        </div>

        <button class="btn btn-success">Guardar</button>
        <a href="{{ route('rols.index') }}" class="btn btn-secondary">Volver</a>
    </form>
</div>
@endsection
