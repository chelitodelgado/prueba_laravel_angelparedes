@extends('app')
@section('title', 'Concentrado')
@section('content')
    <div class="card">
        <div class="card-header text-center">
            <h4 class="text-muted">Asignar un estudiante a un grupo</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-5">
                    <form method="POST" action="{{route('insertar.estudiante_grupo')}}" enctype="multipart/form-data">
                    @csrf

                        <div class="row">
                            <div class="col-xl-12 py-2">
                                <div class="form-group">
                                    <label for="name">Estudiante</label>
                                    <select name="id_estudiante"
                                    id="id_estudiante"
                                    required
                                    class="form-control">
                                        <option>Selecciona un estudiante</option>
                                        @foreach ($estudiante as $item)
                                        <option value="{{$item->id}}">
                                            {{$item->nombre}} {{$item->apellidos}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-12 py-2">
                                <div class="form-group">
                                    <label for="name">Grupos</label>
                                    <select name="id_grupo"
                                    id="id_grupo"
                                    required
                                    class="form-control">
                                        <option>Selecciona un grupo</option>
                                        @foreach ($grupo as $item)
                                        <option value="{{$item->id}}">
                                            {{$item->semestre}} {{$item->grupo}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-12 py-5">
                            <div class="form-group">
                                <div class="form-group">
                                    <input type="hidden" id="id" name="id" value="">
                                    <input type="submit" id="guardar" class="btn btn-outline-primary px-4" value="Guardar">
                                </div>
                            </div>
                        </div>

                    </form>

                </div>
                <div class="col-md-7">
                    <div class="table-responsive">
                        <table class="table dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Semestre</th>
                                    <th>Grupo</th>
                                    <th>Turno</th>
                                    <th>Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($estudiantes_grupos as $estudiante_grupo)
                                <tr>
                                    <td>{{$estudiante_grupo->nombre}}</td>
                                    <td>{{$estudiante_grupo->semestre}}</td>
                                    <td>{{$estudiante_grupo->grupo}}</td>
                                    <td>{{$estudiante_grupo->turno}}</td>
                                    <td>
                                        <a href="{{route('editar.estudiante_grupo', ['id' => $estudiante_grupo->id])}}">Editar</a>
                                        <a href="{{route('eliminar.estudiante_grupo', ['id' => $estudiante_grupo->id])}}">Eliminar</a>
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
@endsection
