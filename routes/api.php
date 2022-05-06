<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/estudiantes', 'Api\EstudianteController@show');
Route::post('/insertEstudiante', 'Api\EstudianteController@store');
Route::post('/updateEstudiante', 'Api\EstudianteController@update');
Route::post('/editEstudiante', 'Api\EstudianteController@edit');
Route::post('/destroyEstudiante', 'Api\EstudianteController@destroy');

Route::get('/grupos', 'Api\GrupoController@show');
Route::post('/insertGrupo', 'Api\GrupoController@store');
Route::post('/updateGrupo', 'Api\GrupoController@update');
Route::post('/editGrupo', 'Api\GrupoController@edit');
Route::post('/destroyGrupo', 'Api\GrupoController@destroy');

Route::get('/concentrados', 'Api\ConcentradoController@show');
Route::post('/insertConcentrado', 'Api\ConcentradoController@store');
Route::post('/updateConcentrado', 'Api\ConcentradoController@update');
Route::post('/editConcentrado', 'Api\ConcentradoController@edit');
Route::post('/destroyConcentrado', 'Api\ConcentradoController@destroy');
Route::post('/listEstudiantes', 'Api\ConcentradoController@listEstudiantes');
Route::post('/listGrupos', 'Api\ConcentradoController@listGrupos');

