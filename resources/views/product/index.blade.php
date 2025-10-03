@extends('layouts.app')
@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1>Productos</h1>
        <a href="{{ route('product.create') }}" class="btn btn-success btn-sm">
            <i class="fas fa-plus"></i> Nuevo
        </a>
    </div>
@stop

@section('content')
    <!-- Main content -->

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
                    <h3 class="card-title">Lista de Productos</h3>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Marca</th>
                                <th>Modelo</th>
                                <th>Código</th>
                                <th>Precio</th>
                                <th>Stock</th>
                                <th>Imagen</th>
                                <th>Categoría</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->nombre }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td>{{ $product->marca }}</td>
                                    <td>{{ $product->modelo }}</td>
                                    <td>{{ $product->codigo_product }}</td>
                                    <td>${{ number_format($product->precio, 2) }}</td>
                                    <td>
                                        <span class="badge {{ $product->stock > 0 ? 'bg-success' : 'bg-danger' }}">
                                            {{ $product->stock }}
                                        </span>
                                    </td>
                                    <td>
                                        @if($product->imagen)
                                            <img src="{{ asset('storage/' . $product->imagen) }}" alt="Imagen" width="50" height="50">
                                        @else
                                            <span class="text-muted">Sin imagen</span>
                                        @endif
                                    </td>
                                    <td>{{ $product->category->name ?? 'Sin categoría' }}</td>
                                    <td>
                                        <a href="{{ route('product.edit', $product->id) }}" class="btn btn-warning btn-sm mr-1">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button class="btn btn-danger btn-sm" onclick="confirmDelete({{ $product->id }})">
                                            <i class="fas fa-trash"></i>
                                        </button>

                                        <form id="delete-form-{{ $product->id }}" action="{{ route('product.destroy', $product->id) }}" method="POST" style="display: none;">
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
                template: "#delete-template",
                preConfirm: () => {
                    document.getElementById('delete-form-' + id).submit();
                }
            });
        }
    </script>

    <template id="delete-template">
      <swal-title>
        ¿Estás seguro de eliminar este producto?
      </swal-title>
      <swal-icon type="warning" color="red"></swal-icon>
      <swal-button type="confirm" color="red">
        Sí, eliminar
      </swal-button>
      <swal-button type="cancel">
        Cancelar
      </swal-button>
      <swal-param name="allowEscapeKey" value="false" />
    </template>
@endsection