@extends('layouts.app')
@section('title', 'Estudiantes')
@section('content')
    <div class="card text-center">
        <div class="card-header">
            <h4 class="text-muted">Lista de estudiantes</h4>
        </div>
        <div class="card-body">
            <div class="row">

                <div class="col-md-5">
                    <form method="POST" id="form_estudiante" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-xl-5 py-2">
                                <div class="form-group">
                                    <label for="name">Nombre</label>
                                    <input type="text"
                                    id="nombre"
                                    name="nombre"
                                    class="form-control"
                                    placeholder="Nombre">
                                </div>
                            </div>
                            <div class="col-xl-7 py-2">
                                <div class="form-group">
                                    <label for="apellidos">Apellidos</label>
                                    <input type="text"
                                    id="apellidos"
                                    name="apellidos"
                                    class="form-control"
                                    placeholder="Apellidos completos">
                                </div>
                            </div>
                            <div class="col-xl-12 py-2">
                                <div class="form-group">
                                    <label for="email">Correo Electronico</label>
                                    <input type="email"
                                    id="email"
                                    name="email"
                                    class="form-control"
                                    placeholder="Email" required>
                                </div>
                            </div>
                            <div class="col-xl-6 py-2">
                                <div class="form-group">
                                    <label for="edad">Edad</label>
                                    <input type="test"
                                    id="edad"
                                    name="edad"
                                    class="form-control"
                                    placeholder="Edad">
                                </div>
                            </div>
                            <div class="col-xl-6 py-2">
                                <div class="form-group">
                                    <label for="telefono">Telefono</label>
                                    <input type="tel"
                                    name="telefono"
                                    id="telefono"
                                    class="form-control"
                                    placeholder="Telefono">
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
                        <table id="table_estudiantes" class="table dt-responsive nowrap w-100">
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
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="{{ asset('js/estudiante.js') }}"></script>
@endsection
