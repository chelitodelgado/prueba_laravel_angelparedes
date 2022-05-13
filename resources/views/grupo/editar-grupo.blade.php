@extends('app')
@section('title', 'Grupos')
@section('content')

    <div class="container">
        <div class="btn-group" role="group">
            <a href="{{ url('/listar/grupos') }}" class="btn btn-enlaces">Lista de grupos</a>
        </div>
        <br>
        <div class="card">
            <div class="card-header text-center">
                <h4 class="text-muted">Editar grupo</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form method="POST" action="{{route('actualizar.grupo')}}" enctype="multipart/form-data">
                        @csrf
                            <div class="row">
                                <div class="col-xl-6 py-2">
                                    <div class="form-group">
                                        <label for="semestre">Semestre</label>
                                        <input type="text"
                                        id="semestre"
                                        name="semestre"
                                        class="form-control @error('semestre') is-invalid @enderror"
                                        required
                                        value="{{$grupo->semestre}}"
                                        placeholder="Semestre">
                                        @error('semestre')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xl-6 py-2">
                                    <div class="form-group">
                                        <label for="grupo">Grupo</label>
                                        <input type="text"
                                        id="grupo"
                                        name="grupo"
                                        class="form-control @error('grupo') is-invalid @enderror"
                                        required
                                        value="{{$grupo->grupo}}"
                                        placeholder="Grupo">
                                        @error('grupo')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xl-6 py-2">
                                    <div class="form-group">
                                        <label for="turno">Turno</label>
                                        <input type="test"
                                        id="turno"
                                        name="turno"
                                        class="form-control @error('turno') is-invalid @enderror"
                                        required
                                        value="{{$grupo->turno}}"
                                        placeholder="Turno">
                                        @error('turno')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xl-6 py-2">
                                    <div class="form-group">
                                        <div class="form-group py-4">
                                            <input type="hidden" name="id" value="{{$grupo->id}}">
                                            <input type="submit" class="btn btn-block btn-outline-primary px-4" value="Actualizar">
                                        </div>
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
