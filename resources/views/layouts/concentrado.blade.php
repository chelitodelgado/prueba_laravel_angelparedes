@extends('layouts.app')
@section('title', 'Concentrado')
@section('content')
    <div class="card text-center">
        <div class="card-header">
            <h4 class="text-muted">Asignar un estudiante a un grupo</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-5">
                    <form method="POST" id="form_concentrado" enctype="multipart/form-data">
                    @csrf

                        <div class="row">
                            <div class="col-xl-6 py-2">
                                <div class="form-group">
                                    <label for="name">Estudiante</label>
                                    <select name="id_estudiante" id="id_estudiante" class="form-control" required></select>
                                </div>
                            </div>
                            <div class="col-xl-6 py-2">
                                <div class="form-group">
                                    <label for="name">Grupos</label>
                                    <select name="id_grupo" id="id_grupo" class="form-control" required></select>
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
                    <table id="table_concentrados" class="table dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Semestre</th>
                                <th>Grupo</th>
                                <th>Turno</th>
                                <th>Accion</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/concentrado.js') }}"></script>
@endsection
