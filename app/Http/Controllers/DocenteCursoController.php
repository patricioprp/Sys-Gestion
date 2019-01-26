<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Modalidad;
use App\TipoNota;
use App\DocenteCurso;
use App\User;
use App\Asignatura;
use App\TipoModalidad;
use App\ConfiguraMod;
use App\nota;
class DocenteCursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Docente=Auth::user();

        $docenteCursos = $Docente->asignaturas;

        foreach($docenteCursos as $dc){
        $n=$dc->asignatura->tipoModalidad->modalidades;
        foreach($n as $n2){
         $M=$n2->configuraMods;
         foreach($M as $m){
             dump($m->IDCONFIGURAMOD);
         if($m->ACTIVO=="S"){
            return view('notas.DocenteCurso')->with('docenteCursos',$docenteCursos);
         }
         }
        }
        }
        flash("Usted no tiene Asignaturas con Modalidades Habilitadas para cargar!")->error();
        return redirect(route('inicio'));
    }

    public function getModalidad(Request $request,$ASIGNATURAID){
        if($request->ajax()){
            $asignatura = Asignatura::find($ASIGNATURAID);
            $IDTIPOMODALIDAD =$asignatura->IDTIPOMODALIDAD;
            $idtipomodalidad = TipoModalidad::find($IDTIPOMODALIDAD);
            $modalidads = Modalidad::modalidad($idtipomodalidad->IDTIPOMODALIDAD);
          return response()->json($modalidads);
        }
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
        //flash("Se creo la Comision correctamente!")->success();
        //return redirect(route('docenteCurso.index'));
       // dd($request->all());
        $tipoNota = TipoNota::find($request->tipoNota);

        $modalidad = Modalidad::find($tipoNota->IDMODALIDAD);

        $configuraMod = ConfiguraMod::where([['IDMODALIDAD','=',$modalidad->IDMODALIDAD],['ACTIVO','=','S']])->get();

        if($configuraMod)
        {
         $nota = Nota::where('ASIGNATURAID','=',$request->asigCurso)->get();

         foreach($nota as $n){
dump($n);  //falta definir las relaciones en la tabla nota y alumnos
         }
        }

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
