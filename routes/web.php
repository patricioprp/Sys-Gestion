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
Route::resource('docenteCurso','DocenteCursoController');
Route::get('tipoNota/{IDMODALIDAD}','ModalidadController@getTipoNota');//para el select dinamico
Route::get('asignaturaCurso/{TIPONOTAID}','DocenteCursoController@getAsignatura');//para el select dinamico
Route::resource('Nota','NotaController');
Route::get('Nota/{idNota}/{idAsig}/{idTipoNota}','NotaController@view')->name('NotaView');
Route::get('DocenteCurso/{idAsig}/{idTipoNota}','DocenteCursoController@list')->name('NotaList');
Route::get('descargar-notas/{idAsig}/{tipoNota}', 'NotaController@pdf')->name('Notas.pdf');
Route::resource('NotaAdicional','NotaAdicionalController');


