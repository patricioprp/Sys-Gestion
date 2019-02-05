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
use App\AsignaturaCurso;

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
       // dd($docenteCursos);
        foreach($docenteCursos as $dc){
        $n=$dc->asignatura->tipoModalidad->modalidades;
        foreach($n as $n2){
         $M=$n2->configuraMods;
         foreach($M as $m){
            // dump($m->IDCONFIGURAMOD);
         if($m->ACTIVO=="S"&&$m->ANO=="2015"){
            return view('notas.DocenteCurso')->with('docenteCursos',$docenteCursos);
         }
         }
        }
        }
        flash("Usted no tiene Asignaturas con Modalidades Habilitadas para cargar!")->error();
        return redirect(route('inicio'));
    }

    public function getModalidad(Request $request,$ASIGNATURACURSOID){
        if($request->ajax()){
            $ac = AsignaturaCurso::find($ASIGNATURACURSOID);
            $asignatura = Asignatura::find($ac->ASIGNATURAID);
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

    }

   public function list($idAsig, $idTipoNota, $idAsigCurso){

    $tipoNota = TipoNota::find($idTipoNota);

    $modalidad = Modalidad::find($tipoNota->IDMODALIDAD);

    $asignaturaCurso = AsignaturaCurso::find($idAsigCurso);
    $asignatura = Asignatura::find($asignaturaCurso->ASIGNATURAID);
    $configuraMod = ConfiguraMod::where([['IDMODALIDAD','=',$modalidad->IDMODALIDAD],['ACTIVO','=','S'],['ANO','=',$asignaturaCurso->ANIO]])->get();

    if($configuraMod)
    {
     $notas = Nota::where([['ASIGNATURAID','=',$asignaturaCurso->ASIGNATURAID],['IDDIVISION','=',$asignaturaCurso->IDDIVISION],['ANIO','=',$asignaturaCurso->ANIO],['TIPONOTAID','=',$idTipoNota],
     ['IDMODALIDAD','=',$modalidad->IDMODALIDAD]])->get();

     return view('notas.Listado')->with('notas',$notas)
                                 ->with('asignatura',$asignatura)
                                 ->with('idAsigCurso',$idAsigCurso)
                                 ->with('idTipoNota',$idTipoNota)
                                 ->with('tipoNota',$tipoNota);
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
