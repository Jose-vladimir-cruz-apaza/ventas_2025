@extends('layouts.app')
@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1>Categories</h1>
        <a href="{{ route('category.create') }}" class="btn btn-success btn-sm">
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
                text: @json(session('success')), // mensaje enviado desde Laravel
                icon: 'success',
                timer: 2000, // 2 segundos
                showConfirmButton: false // no muestra botón de confirmar
            });            
        </script>
    @endif

    </section>    
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Lista de categorias</h3>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>                                                                
                                <th>Estado</th>                                    
                                <th>Acciones</th>
                            </tr>
                        </thead>           
                        @foreach ($category as $category)
                            <tbody>
                                <tr>
                                    <td>{{$category->id}}</td>  
                                    <td>{{$category->name}}</td>                                                                    
                                    <td>
                                        @if($category->state == 'inactivo')
                                            <span class="badge bg-danger">{{ $category->state }}</span>
                                        @else
                                            <span class="badge bg-success">{{ $category->state }}</span>
                                        @endif
                                    </td> 
                                    <td>
                                        
                                        <a href="{{ route('category.edit', $category->id) }}" class="btn btn-warning btn-sm mr-1">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <!-- Botón Eliminar -->
                                        <button class="btn btn-danger btn-sm" onclick="confirmDelete({{ $category->id }})">
                                            <i class="fas fa-trash"></i>
                                        </button>

                                        <!-- Formulario oculto para eliminar -->
                                        <form id="delete-form-{{ $category->id }}" action="{{ route('category.destroy', $category->id) }}" method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        @endforeach                                     
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div><!-- /.container-fluid -->
    
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

    <!-- 🔹 Template de SweetAlert -->
    <template id="delete-template">
      <swal-title>
        ¿Estás seguro de eliminar este registro?
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