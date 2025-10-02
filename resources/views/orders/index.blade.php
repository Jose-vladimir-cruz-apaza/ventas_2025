@extends('layouts.app')
@section('content_header')
    <h1>Ordenes</h1>
@stop
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Lista de Usuarios</h3>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Teléfono</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        @foreach ($orders as $order)
                            <tbody>
                                <tr>
                                    <td>{{$order->id}}</td>                                
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
