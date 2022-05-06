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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/estudiantes', 'Api\EstudianteController@index')->name('estudiantes');
Route::get('/grupos', 'Api\GrupoController@index')->name('grupos');
Route::get('/concentrado', 'Api\ConcentradoController@index')->name('concentrado');
