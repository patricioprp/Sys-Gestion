<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\modalidad;
use App\Modalidad;
use App\TipoNota;

class ModalidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function byProject($id)
    {
        return modalidad::join('ASIGNATURACURSO','ASIGNATURACURSO.IDTIPOMODALIDAD','=','MODALIDAD.IDTIPOMODALIDAD')
        ->select('MODALIDAD.*')
        ->where('ASIGNATURACURSO.ASIGNATURACURSOID',$id)
        ->get();

    }

    public function getTipoNota(Request $request,$IDMODALIDAD){
        if($request->ajax()){
            $tipoNotas = TipoNota::modalidads($IDMODALIDAD);
          return response()->json($tipoNotas);
        }
    }
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
