@extends('app')
@section('title', 'Inicio')
@section('sidebar')
    @parent
@endsection
@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-md-7">
            <div class="card p-3 py-4">
                <div class="text-center mt-3">
                    <h5 class="mt-2 mb-0">Angel Paredes Torres</h5>
                    <br>
                    <div class="buttons">
                        <a href="{{ url('/listar/estudiantes') }}" class="btn btn-outline-primary px-4">Comenzar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
