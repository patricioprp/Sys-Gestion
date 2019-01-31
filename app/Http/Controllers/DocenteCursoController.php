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
use App\Nota;
class DocenteCursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $Docente=Auth::user();

        $docenteCursos = $Docente->asignaturas;

        foreach($docenteCursos as $dc){
        $n=$dc->asignatura->tipoModalidad->modalidades;
        foreach($n as $n2){
         $M=$n2->configuraMods;
         foreach($M as $m){
            // dump($m->IDCONFIGURAMOD);
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

        $tipoNota = TipoNota::find($request->tipoNota);

        $modalidad = Modalidad::find($tipoNota->IDMODALIDAD);

        $configuraMod = ConfiguraMod::where([['IDMODALIDAD','=',$modalidad->IDMODALIDAD],['ACTIVO','=','S']])->get();

        $asignatura = Asignatura::find($request->asigCurso);

        if($configuraMod)
        {
         $notas = Nota::where([['ASIGNATURAID','=',$request->asigCurso],['TIPONOTAID','=',$request->tipoNota],
         ['IDMODALIDAD','=',$modalidad->IDMODALIDAD]])->get();

         foreach($notas as $n){
           $nivel = $n->division->IDNIVELES;
          $division = $n->division->ABREVIA;
          $idDiv = $n->division->IDDIVISION;
         }
         return view('notas.Listado')->with('notas',$notas)
                                     ->with('asignatura',$asignatura)
                                     ->with('idDiv',$idDiv)
                                     ->with('nivel',$nivel)
                                     ->with('division',$division);
        }

    }

   public function list($idAsig, $idTipoNota){


    $tipoNota = TipoNota::find($idTipoNota);

    $modalidad = Modalidad::find($tipoNota->IDMODALIDAD);

    $configuraMod = ConfiguraMod::where([['IDMODALIDAD','=',$modalidad->IDMODALIDAD],['ACTIVO','=','S']])->get();

    $asignatura = Asignatura::find($idAsig);

    if($configuraMod)
    {
     $notas = Nota::where([['ASIGNATURAID','=',$idAsig],['TIPONOTAID','=',$idTipoNota],
     ['IDMODALIDAD','=',$modalidad->IDMODALIDAD]])->get();

     foreach($notas as $n){
        $anio = $n->ANIO;
        $nivel = $n->division->IDNIVELES;
        $division = $n->division->ABREVIA;
        $idDiv = $n->division->IDDIVISION;
     }
     return view('notas.Listado')->with('notas',$notas)
                                 ->with('anio',$anio)
                                 ->with('asignatura',$asignatura)
                                 ->with('idDiv',$idDiv)
                                 ->with('nivel',$nivel)
                                 ->with('division',$division)
                                 ->with('idTipoNota',$idTipoNota);
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
