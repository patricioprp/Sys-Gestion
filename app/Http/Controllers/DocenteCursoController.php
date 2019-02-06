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

        $configuraMods = ConfiguraMod::where([['ACTIVO','=','S'],['ANO','=','2018'],['IDMODALIDAD','>','0']])->get();
        return view('notas.DocenteCurso')->with('configuraMods',$configuraMods);

    }


    public function getAsignatura(Request $request,$TIPONOTAID){
        if($request->ajax()){

            $tipoNota = TipoNota::find($TIPONOTAID);

            $TipoModalidad = $tipoNota->modalidad->tipoModalidad;

            $asignaturas = Asignatura::where('IDTIPOMODALIDAD','=',$TipoModalidad->IDTIPOMODALIDAD)->get();

          return response()->json($asignaturas);
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

   public function list($idAsig, $idTipoNota){

    $tipoNota = TipoNota::find($idTipoNota);

    $modalidad = Modalidad::find($tipoNota->IDMODALIDAD);

    $asignatura = Asignatura::find($idAsig);

     $notas = Nota::where([['ASIGNATURAID','=',$asignatura->ASIGNATURAID],['ANIO','=','2018'],['TIPONOTAID','=',$idTipoNota],
     ['IDMODALIDAD','=',$modalidad->IDMODALIDAD]])->get();

     return view('notas.Listado')->with('notas',$notas)
                                 ->with('asignatura',$asignatura)
                                 ->with('idTipoNota',$idTipoNota)
                                 ->with('tipoNota',$tipoNota);
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
