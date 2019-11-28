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
use App\PlanAsigAdic;


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
       // header('Content-Type: text/html; charset=iso-8859-1');
        $docente = Auth::User();
        $docenteCursos = DocenteCurso::join('ASIGNATURACURSO','ASIGNATURACURSO.ASIGNATURACURSOID','=','DOCENTECURSO.ASIGNATURACURSOID')
                                     ->join('ASIGNATURA','ASIGNATURA.ASIGNATURAID','=','ASIGNATURACURSO.ASIGNATURAID')
                                     ->select('ASIGNATURACURSO.*','ASIGNATURA.IDTIPOMODALIDAD','ASIGNATURA.NOMBRE AS NOMASIGNATURA')
                                     ->where([['DOCENTECURSO.iddocente','=',$docente->iddocente],['ASIGNATURACURSO.ANIO','=',date("Y")]])->get();

        $configuraMods = ConfiguraMod::where([['ACTIVO','=','S'],['ANO','=',date("Y")],['IDMODALIDAD','>','0']])->get();

        return view('notas.DocenteCurso')->with('configuraMods',$configuraMods)
                                         ->with('docenteCursos',$docenteCursos);

    }

    public function all()
    {
        $docente = Auth::User();
        $docenteCursos = DocenteCurso::join('ASIGNATURACURSO','ASIGNATURACURSO.ASIGNATURACURSOID','=','DOCENTECURSO.ASIGNATURACURSOID')
                                     ->join('ASIGNATURA','ASIGNATURA.ASIGNATURAID','=','ASIGNATURACURSO.ASIGNATURAID')
                                     ->select('ASIGNATURACURSO.*','ASIGNATURA.IDTIPOMODALIDAD','ASIGNATURA.NOMBRE AS NOMASIGNATURA')
                                     ->where([['DOCENTECURSO.iddocente','=',$docente->iddocente],['ASIGNATURACURSO.ANIO','=',date("Y")]])->get();

        $configuraMods = ConfiguraMod::where([['ANO','=',date("Y")],['IDMODALIDAD','>','0']])->get();

        return view('notas.DocenteCursoAll')->with('configuraMods',$configuraMods)
                                         ->with('docenteCursos',$docenteCursos);
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
    public function return(Request $request)
    {
      dd($request->all);
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

   public function list($idAsig, $idTipoNota, $asignaturaCursoId,$estado,$IdNota){

    $tipoNota = TipoNota::find($idTipoNota);

    $modalidad = Modalidad::find($tipoNota->IDMODALIDAD);

    $asignaturaCurso = AsignaturaCurso::find($asignaturaCursoId);

    $asignatura = Asignatura::find($asignaturaCurso->asignatura->ASIGNATURAID);

    /* $notas = Nota::where([['ASIGNATURAID','=',$asignatura->ASIGNATURAID],['ANIO','=',$asignaturaCurso->ANIO],['TIPONOTAID','=',$idTipoNota],
     ['IDMODALIDAD','=',$modalidad->IDMODALIDAD],['ASIGNATURACURSOID','=',$asignaturaCurso->ASIGNATURACURSOID]])->orderBy('NOTAID', 'DESC')->get();*/
     $notasQuery = Nota::
     join('ALUMNOS', 'ALUMNOS.IDALUMNO', '=', 'NOTAS.IDALUMNO')
     ->where('NOTAS.ANIO', '=', date("Y"))->where('NOTAS.ASIGNATURAID','=',$asignatura->ASIGNATURAID)->where('NOTAS.TIPONOTAID','=',$idTipoNota)
     ->where('NOTAS.IDMODALIDAD','=',$modalidad->IDMODALIDAD)->where('NOTAS.ASIGNATURACURSOID','=',$asignaturaCurso->ASIGNATURACURSOID)
     ->Where('ALUMNOS.EGRESO',NULL)
     ->orderBy('ALUMNOS.APELLIDOS', 'DESC')
     ->orderBy('ALUMNOS.NOMBRES', 'DESC');

     $notas=$notasQuery->get();
     return view('notas.Listado')->with('notas',$notas)
                                 ->with('asignatura',$asignatura)
                                 ->with('idTipoNota',$idTipoNota)
                                 ->with('tipoNota',$tipoNota)
                                 ->with('asignaturaCursoId',$asignaturaCursoId)
                                 ->with('estado',$estado)
                                 ->with('IdNota',$IdNota);
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
