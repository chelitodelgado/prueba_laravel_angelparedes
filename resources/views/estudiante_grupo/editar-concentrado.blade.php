@extends('app')
@section('title', 'Concentrado')
@section('content')
    <div class="card">
        <div class="card-header text-center">
            <h4 class="text-muted">Asignar un estudiante a un grupo</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" action="{{route('actualizar.estudiante_grupo')}}" enctype="multipart/form-data">
                    @csrf

                        <div class="row">
                            <div class="col-xl-12 py-2">
                                <div class="form-group">
                                    <label for="name">Estudiante</label>
                                    <input type="text" class="form-control" value="{{$estudiante->nombre}} {{$estudiante->apellidos}}" disabled>
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
                                <input type="hidden" name="id" value="{{$estudiante_grupo->id}}">
                                <input type="submit" id="guardar" class="btn btn-outline-primary px-4" value="Actualizar">
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
