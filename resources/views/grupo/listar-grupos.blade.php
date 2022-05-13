@extends('app')
@section('title', 'Grupos')
@section('content')
    <div class="container">
        <div class="btn-group" role="group">
            <a href="{{ url('/agregar/grupo') }}" class="btn btn-enlaces">Agregar Grupo</a>
        </div>
        <br>
        <div class="card text-center">
            <div class="card-header">
                <h4 class="text-muted">Lista de grupos</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                       <div class="table-responsive">
                            <table class="table dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Semestre</th>
                                        <th>Grupo</th>
                                        <th>Turno</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($grupos as $grupo)
                                    <tr>
                                        <td>{{$grupo->semestre}}</td>
                                        <td>{{$grupo->grupo}}</td>
                                        <td>{{$grupo->turno}}</td>
                                        <td>
                                            <a href="{{route('ver.estudiantes', ['id' => $grupo->id])}}">Ver mas</a>
                                            <a href="{{route('editar.grupo',    ['id' => $grupo->id])}}">Editar</a>
                                            <a href="{{route('eliminar.grupo',  ['id' => $grupo->id])}}">Eliminar</a>
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
