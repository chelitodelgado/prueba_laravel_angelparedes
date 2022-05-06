@extends('layouts.app')
@section('title', 'Inicio')
@section('sidebar')
    @parent
@endsection
@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-md-7">
            <div class="card p-3 py-4">
                <div class="text-center">
                    <img src="{{ asset('img/perfil.png') }}" width="100" class="rounded-circle">
                </div>
                <div class="text-center mt-3">
                    <h5 class="mt-2 mb-0">Angel Paredes Torres</h5>
                    <span>Desarrollador web Full Stack</span>
                    <ul class="social-list">
                        <li>
                            <a href="https://www.facebook.com/chelitodelgado0" target="_blank" rel="noopener noreferrer">
                                <i class="fa fa-facebook">
                            </a></i>
                        </li>
                        <li>
                            <a href="https://www.linkedin.com/in/angel-paredes-torres/" target="_blank" rel="noopener noreferrer">
                                <i class="fa fa-linkedin"></i>
                            </a>
                        </li>
                        <li>
                            <a href="mailto: angelparedestorres.apt@gmail.com" target="_blank" rel="noopener noreferrer">
                                <i class="fa fa-google"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://angel-cv.pages.dev/" target="_blank" rel="noopener noreferrer">
                                <i class="fa fa-globe"></i>
                            </a>
                        </li>
                    </ul>
                    <div class="buttons">
                        <a href="{{ url('/estudiantes') }}" class="btn btn-outline-primary px-4">Comenzar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
