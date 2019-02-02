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
})->name('inicio');


Auth::routes();
Route::get('docentecurso', 'DocentecursoController@index')->name('docentecurso');

//Route::resource('nota','NotaController');
//Route::resource('nivel','NivelController');
//Route::resource('docentecurso','DocentecursoController');
//Route::get('vernotas','NotaController@detallenotas');

//Patricio
Route::resource('docenteCurso','DocenteCursoController');
Route::get('asignaturaCurso/{ASIGNATURACURSOID}','DocenteCursoController@getModalidad');//para el select dinamico
Route::get('tipoNota/{IDMODALIDAD}','ModalidadController@getTipoNota');//para el select dinamico
Route::resource('Nota','NotaController');
Route::get('Nota/{idNota}/{idAsig}/{idTipoNota}/{idAsigCurso}','NotaController@view')->name('NotaView');
Route::get('DocenteCurso/{idAsig}/{idTipoNota}/{idAsigCurso}','DocenteCursoController@list')->name('NotaList');
Route::get('descargar-notas/{idAsig}/{idTipoNota}/{idAsigCurso}', 'NotaController@pdf')->name('Notas.pdf');


