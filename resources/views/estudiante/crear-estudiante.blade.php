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
                        <form method="POST" id="formularioEstudiante" action="{{ route('insertar.estudiante') }}" enctype="multipart/form-data">
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
                                        pattern="[a-zA-Z ]{2,20}"
                                        placeholder="Nombre">
                                        @error('nombre')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
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
                                        pattern="[a-zA-Z ]{2,30}"
                                        placeholder="Apellidos completos">
                                        @error('apellidos')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
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
                                        pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"
                                        placeholder="Correo electronico">
                                        @error('email')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
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
                                        placeholder="Edad">
                                        @error('edad')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
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
                                        pattern="[0-9]+"
                                        placeholder="Telefono">
                                        @error('telefono')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12 py-5">
                                <div class="form-group">
                                    <div class="form-group">
                                        <input type="submit" id="guardar" class="btn btn-outline-primary px-4" value="Guardar">
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
