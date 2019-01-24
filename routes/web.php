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
    return view('home');
});


Auth::routes();
Route::get('docentecurso', 'DocentecursoController@index')->name('docentecurso');

Route::resource('nota','NotaController');
//Route::resource('nivel','NivelController');
//Route::resource('docentecurso','DocentecursoController');
Route::get('vernotas','NotaController@detallenotas');

//PAtricio
Route::resource('docenteCurso','DocenteCursoController');
Route::get('asignatura/{ASIGNATURAID}','DocenteCursoController@getModalidad');


