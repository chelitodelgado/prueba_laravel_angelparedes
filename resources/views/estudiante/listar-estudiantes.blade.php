@extends('app')
@section('title', 'Lista de estudiantes')
@section('content')
    <div class="container">
        <div class="btn-group" role="group">
            <a href="{{ url('/agregar/estudiante') }}" class="btn btn-enlaces">Agregar</a>
        </div>
        <br>
        <div class="card text-center">
            <div class="card-header">
                <h4 class="text-muted">Lista de estudiantes</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Apellidos</th>
                                        <th>Edad</th>
                                        <th>Email</th>
                                        <th>Telefono</th>
                                        <th>Accion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($estudiantes as $estudiante)
                                    <tr>
                                        <td>{{$estudiante->nombre}}</td>
                                        <td>{{$estudiante->apellidos}}</td>
                                        <td>{{$estudiante->fecha_nacimiento}}</td>
                                        <td>{{$estudiante->email}}</td>
                                        <td>{{$estudiante->telefono}}</td>
                                        <td>
                                            <a href="{{route('ver.grupos',          ['id' => $estudiante->id])}}">Ver Grupos</a>
                                            <a href="{{route('editar.estudiante',   ['id' => $estudiante->id])}}">Editar</a>
                                            <a href="{{route('eliminar.estudiante', ['id' => $estudiante->id])}}">Eliminar</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                     </div>
                </div>
            </div>
        </div>
    </div>
@endsection
