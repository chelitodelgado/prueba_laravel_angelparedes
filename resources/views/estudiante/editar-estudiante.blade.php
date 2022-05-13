@extends('app')
@section('title', 'Estudiantes')
@section('content')

    <div class="container">

        <div class="btn-group" role="group">
            <a href="{{ url('/listar/estudiantes') }}" class="btn btn-enlaces">Listar</a>
        </div>
        <br>
        <div class="card">
            <div class="card-header text-center">
                <h4 class="text-muted">Agregar un estudiante</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form method="POST" action="{{ route('actualizar.estudiante') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-xl-5 py-2">
                                    <div class="form-group">
                                        <label for="name">Nombre</label>
                                        <input type="text"
                                        id="nombre"
                                        name="nombre"
                                        class="form-control @error('nombre') is-invalid @enderror"
                                        required
                                        value="{{$estudiante->nombre}}"
                                        placeholder="Nombre">
                                    </div>
                                </div>
                                <div class="col-xl-7 py-2">
                                    <div class="form-group">
                                        <label for="apellidos">Apellidos</label>
                                        <input type="text"
                                        id="apellidos"
                                        name="apellidos"
                                        class="form-control @error('apellidos') is-invalid @enderror"
                                        required
                                        value="{{$estudiante->apellidos}}"
                                        placeholder="Apellidos completos">
                                    </div>
                                </div>
                                <div class="col-xl-12 py-2">
                                    <div class="form-group">
                                        <label for="email">Correo Electronico</label>
                                        <input type="email"
                                        id="email"
                                        name="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        required
                                        value="{{$estudiante->email}}"
                                        placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-xl-6 py-2">
                                    <div class="form-group">
                                        <label for="edad">Edad</label>
                                        <input type="date"
                                        id="edad"
                                        name="edad"
                                        class="form-control @error('edad') is-invalid @enderror"
                                        required
                                        value="{{$estudiante->fecha_nacimiento}}"
                                        placeholder="Edad">
                                    </div>
                                </div>
                                <div class="col-xl-6 py-2">
                                    <div class="form-group">
                                        <label for="telefono">Telefono</label>
                                        <input type="text"
                                        name="telefono"
                                        id="telefono"
                                        class="form-control @error('telefono') is-invalid @enderror"
                                        required
                                        value="{{$estudiante->telefono}}"
                                        placeholder="Telefono">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12 py-5">
                                <div class="form-group">
                                    <div class="form-group">
                                        <input type="hidden" name="id" id="id" value="{{$estudiante->id}}">
                                        <input type="submit" class="btn btn-outline-primary px-4" value="Actualizar">
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
