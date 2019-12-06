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
Route::get('docenteCursoAll','DocenteCursoController@all')->name('docenteCurso.all');//para consultar todas las notas
Route::post('NotaAll','NotaController@notaView')->name('NotaAll.view');;//para listar las notas
Route::get('tipoNota/{IDMODALIDAD}','ModalidadController@getTipoNota');//para el select dinamico
//Route::get('asignaturaCurso/{TIPONOTAID}','DocenteCursoController@getAsignatura');//para el select dinamico
Route::resource('Nota','NotaController');
Route::get('Nota/{idNota}/{idAsig}/{idTipoNota}/{asignaturaCursoId}','NotaController@view')->name('NotaView');
Route::get('DocenteCurso/{idAsig}/{idTipoNota}/{AsinaturaCursoId}/{estado}/{IdNota}','DocenteCursoController@list')->name('NotaList');
Route::get('DocenteCurso/{idAsig}/{idTipoNota}/{AsinaturaCursoId}/{estado}/{IdNota}','DocenteCursoController@listAll')->name('NotaListAll');
Route::get('descargar-notas/{idAsig}/{tipoNota}/{asignaturaCursoId}', 'NotaController@pdf')->name('Notas.pdf');
Route::resource('NotaAdicional','NotaAdicionalController');
Route::get('NotaAdicional/{idNota}/view','NotaAdicionalController@view')->name('NotaAdicional.view');
Route::get('NotaAdicional/{idNota}/viewAll','NotaAdicionalController@viewAll')->name('NotaAdicional.viewAll');
Route::get('NotaAdicional/{idNota}/editar','NotaAdicionalController@editar')->name('NotaAdicional.editar');
Route::get('NotaAdicional/{idNota}/{idNotaAdicional}/showNotaAdicional','NotaAdicionalController@showNotaAdicional')->name('NotaAdicional.show');

