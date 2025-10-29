@extends('layouts.app')

@section('content')
<div class="container vh-100 d-flex align-items-center justify-content-center overflow-hidden">
    <div class="row justify-content-center w-100">
        <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5">
            <div class="card shadow" style="max-width: 100%;">
                <div class="card-header bg-secondary text-white text-center py-3">
                    <h3 class="mb-0">
                        @isset($provider)
                            Editar Proveedor
                        @else
                            Formulario de Proveedores
                        @endisset
                    </h3>
                </div>
                <div class="card-body p-4">
                    <form action="{{ isset($provider) ? route('provider.update', $provider->id) : route('provider.store') }}" method="POST">
                        @csrf
                        @if(isset($provider))
                            @method('PUT')
                        @endif

                        <div class="row">
                            <!-- Columna izquierda -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nombre del proveedor</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Ingresa el nombre del proveedor" value="{{ old('name', isset($provider) ? $provider->name : '') }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="contact" class="form-label">Contacto</label>
                                    <input type="text" class="form-control" id="contact" name="contact" placeholder="Persona de contacto" value="{{ old('contact', isset($provider) ? $provider->contact : '') }}">
                                </div>

                                <div class="mb-3">
                                    <label for="phone" class="form-label">Teléfono</label>
                                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Número de teléfono" value="{{ old('phone', isset($provider) ? $provider->phone : '') }}" required>
                                </div>
                            </div>

                            <!-- Columna derecha -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="company" class="form-label">Empresa</label>
                                    <input type="text" class="form-control" id="company" name="company" placeholder="Nombre de la empresa" value="{{ old('company', isset($provider) ? $provider->company : '') }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Correo electrónico</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Correo electrónico" value="{{ old('email', isset($provider) ? $provider->email : '') }}">
                                </div>

                                <div class="mb-3">
                                    <label for="direction" class="form-label">Dirección</label>
                                    <input type="text" class="form-control" id="direction" name="direction" placeholder="Dirección del proveedor" value="{{ old('direction', isset($provider) ? $provider->direction : '') }}" required>
                                </div>
                            </div>
                        </div>

                        <!-- Campo NIT que ocupa toda la fila -->
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="NIT" class="form-label">NIT</label>
                                    <input type="text" class="form-control" id="NIT" name="NIT" placeholder="Número de identificación tributaria" value="{{ old('NIT', isset($provider) ? $provider->NIT : '') }}" required>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex flex-column flex-sm-row justify-content-between mt-3 gap-2">
                            <button type="submit" class="btn btn-dark w-100 d-flex align-items-center justify-content-center">
                                <i class="bi bi-send-fill me-1"></i>
                                @isset($provider)
                                    Actualizar
                                @else
                                    Enviar
                                @endisset
                            </button>
                            <button type="button" class="btn btn-outline-dark w-100 d-flex align-items-center justify-content-center" onclick="history.back()">
                                <i class="bi bi-arrow-left me-1"></i> Retroceder
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
