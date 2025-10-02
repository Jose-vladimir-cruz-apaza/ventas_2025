@extends('layouts.app')
@section('content_header')
    <h1>Categories</h1>
@stop
@section('content')
    <!-- Main content -->
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
                                <th>Imagen</th>
                                <th>Estado</th>                                    
                                <th>Acciones</th>
                                <i class="ic-user"></i> Users
                            </tr>
                        </thead>           
                        @foreach ($category as $category)
                            <tbody>
                                <tr>
                                    <td>{{$category->id}}</td>  
                                    <td>{{$category->name}}</td>                                
                                    <td>{{$category->imagen}}</td>  
                                    <td>
                                        @if($category->state == 'inactivo')
                                            <span class="badge bg-danger">{{ $category->state }}</span>
                                        @else
                                            <span class="badge bg-success">{{ $category->state }}</span>
                                        @endif
                                    </td> 
                                    <td>
                                        <button class="btn btn-info btn-sm">Ver</button>
                                        <button class="btn btn-warning btn-sm">Editar</button>
                                        <button class="btn btn-danger btn-sm">Eliminar</button>
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
    </section>

@endsection
