@extends('app')
@section('title', 'Lista de estudiantes asignados a un grupo')
@section('sidebar')
    @parent
@endsection
@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-md-7">
            <div class="card p-3 py-4">
                <div class="text-center mt-3">
                    <h5 class="mt-2 mb-0">Lista de estudiantes inscritos al grupo</h5>
                    <br>
                    <h4 class="text-muted">{{$grupo->semestre}} {{$grupo->grupo}}</h4>
                    <div class="table-responsive">
                        <table id="table_estudiantes" class="table dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>Estudiante</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($grupo->estudiantes as $estudiante)
                                <tr>
                                    <th>{{$estudiante->nombre}} {{$estudiante->apellidos}}</th>
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
