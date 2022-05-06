@extends('layouts.app')
@section('title', 'Grupos')
@section('content')
    <div class="card text-center">
        <div class="card-header">
            <h4 class="text-muted">Lista de estudiantes</h4>
        </div>
        <div class="card-body">
            <div class="row">

                <div class="col-md-5">
                    <form method="POST" id="form_grupo" enctype="multipart/form-data">
                    @csrf
                        <div class="row">
                            <div class="col-xl-6 py-2">
                                <div class="form-group">
                                    <label for="semestre">Semestre</label>
                                    <input type="text"
                                    id="semestre"
                                    name="semestre"
                                    class="form-control"
                                    placeholder="Semestre">
                                </div>
                            </div>
                            <div class="col-xl-6 py-2">
                                <div class="form-group">
                                    <label for="grupo">Grupo</label>
                                    <input type="text"
                                    id="grupo"
                                    name="grupo"
                                    class="form-control"
                                    placeholder="Grupo">
                                </div>
                            </div>
                            <div class="col-xl-6 py-2">
                                <div class="form-group">
                                    <label for="turno">Turno</label>
                                    <input type="test"
                                    id="turno"
                                    name="turno"
                                    class="form-control"
                                    placeholder="Turno">
                                </div>
                            </div>
                            <div class="col-xl-6 py-2">
                                <div class="form-group">
                                    <div class="form-group py-4">
                                        <input type="hidden" id="id" name="id" value="">
                                        <input type="submit" id="guardar" class="btn btn-block btn-outline-primary px-4" value="Guardar">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>

                <div class="col-md-7">
                   <div class="table-responsive">
                        <table id="table_grupos" class="table dt-responsive nowrap w-100">
                            <thead>
                                <tr>
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

    <script src="{{ asset('js/grupo.js') }}"></script>
@endsection
