<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/listar/estudiantes', 'EstudianteController@listarEstudiantes')->name('listar.estudiantes');
Route::get('/agregar/estudiante', 'EstudianteController@formularioInsertarEstudiante')->name('agregar.estudiante');
Route::get('/editar/estudiante/{id}', 'EstudianteController@formularioEditarEstudiante')->name('editar.estudiante');
Route::get('/ver/grupos/{id}', 'EstudianteController@verGruposEstudiante')->name('ver.grupos');
Route::post('/insertar/estudiante', 'EstudianteController@insertarEstudiante')->name('insertar.estudiante');
Route::get('/eliminar/estudiante/{id}', 'EstudianteController@eliminarEstudiante')->name('eliminar.estudiante');
Route::post('/actualizar/estudiante', 'EstudianteController@actualizarEstudiante')->name('actualizar.estudiante');

Route::get('/listar/grupos', 'GrupoController@listarGrupos')->name('listar.grupos');
Route::get('/agregar/grupo', 'GrupoController@formularioInsertarGrupo')->name('agregar.grupo');
Route::get('/editar/grupo/{id}', 'GrupoController@formularioEditarGrupo')->name('editar.grupo');
Route::get('/ver/estudiantes/{id}', 'GrupoController@verGrupoEstudiantes')->name('ver.estudiantes');
Route::post('/insertar/grupo', 'GrupoController@insertarGrupo')->name('insertar.grupo');
Route::get('/eliminar/grupo/{id}', 'GrupoController@eliminarGrupo')->name('eliminar.grupo');
Route::post('/actualizar/grupo', 'GrupoController@actualizarGrupo')->name('actualizar.grupo');

Route::get('/concentrado', 'EstudianteGrupoController@listarConcentrado')->name('listar.estudiante_grupo');
Route::post('/insertar/estudiante-grupo', 'EstudianteGrupoController@insertarEstudianteGrupo')->name('insertar.estudiante_grupo');
Route::get('/eliminar/estudiante-grupo/{id}', 'EstudianteGrupoController@eliminarEstudianteGrupo')->name('eliminar.estudiante_grupo');
Route::get('/editar/concentrado/{id}', 'EstudianteGrupoController@formularioEditarEstudianteGrupo')->name('editar.estudiante_grupo');
Route::post('/actualizar/estudiante-grupo', 'EstudianteGrupoController@actualizarEstudianteGrupo')->name('actualizar.estudiante_grupo');
