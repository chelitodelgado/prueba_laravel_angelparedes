@extends('app')
@section('title', 'Lista de grupos inscritos')
@section('sidebar')
    @parent
@endsection
@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-md-7">
            <div class="card p-3 py-4">
                <div class="text-center mt-3">
                    <h5 class="mt-2 mb-0">{{$estudiante->nombre}} {{$estudiante->apellidos}}</h5>
                    <br>
                    <h4 class="text-muted">Lista de grupos inscritos</h4>
                    <div class="table-responsive">
                        <table id="table_estudiantes" class="table dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>Grupo</th>
                                    <th>Semestre</th>
                                    <th>Turno</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($estudiante->grupos as $grupo)
                                <tr>
                                    <th>{{$grupo->grupo}}</th>
                                    <th>{{$grupo->semestre}}</th>
                                    <th>{{$grupo->turno}}</th>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
