<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Auth;
use App\Modalidad;
use App\TipoNota;
use App\DocenteCurso;
use App\Asignatura;
use App\TipoModalidad;
use App\ConfiguraMod;
use App\Nota;
use Barryvdh\DomPDF\Facade as PDF;
use App\AsignaturaCurso;
use Carbon\Carbon;

class NotaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          //
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

        $asignaturaCurso = AsignaturaCurso::find($request->asignaturaCursoId);

        $asignatura = Asignatura::find($asignaturaCurso->asignatura->ASIGNATURAID);

        $estado="false";

        $IdNota = "false";

        $notas = Nota::where([['ASIGNATURAID','=',$asignatura->ASIGNATURAID],['ANIO','=',date("Y")],['TIPONOTAID','=',$request->tipoNota],
         ['IDMODALIDAD','=',$modalidad->IDMODALIDAD],['ASIGNATURACURSOID','=',$asignaturaCurso->ASIGNATURACURSOID]])->orderBy('NOTAID', 'DESC')->get();

        if(count($notas)==0)
        {
        $notas2 = DB::select('exec AGREGARNOTAS(?,?,?,?,?,?)',array($asignatura->ASIGNATURAID,$modalidad->IDMODALIDAD,$request->tipoNota,date("Y"),$asignaturaCurso->nivel->IDNIVELES,$asignaturaCurso->division->IDDIVISION));
        dd($notas2);
        return view('notas.Listado')->with('notas',$notas)
        ->with('asignatura',$asignatura)
        ->with('idTipoNota',$request->tipoNota)
        ->with('asignaturaCursoId',$asignaturaCurso->ASIGNATURACURSOID)
        ->with('tipoNota',$tipoNota)
        ->with('estado',$estado)
        ->with('IdNota',$IdNota);
        }

         return view('notas.Listado')->with('notas',$notas)
                                     ->with('asignatura',$asignatura)
                                     ->with('idTipoNota',$request->tipoNota)
                                     ->with('asignaturaCursoId',$asignaturaCurso->ASIGNATURACURSOID)
                                     ->with('tipoNota',$tipoNota)
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

    public function view($idNota,$idAsig,$idTipoNota,$asignaturaCursoId)
    {
        $nota = Nota::find($idNota);
        $asignatura = Asignatura::find($idAsig);
        return view('notas.Editar')->with('nota',$nota)
                                   ->with('asignatura',$asignatura)
                                   ->with('idAsig',$idAsig)
                                   ->with('idTipoNota',$idTipoNota)
                                   ->with('asignaturaCursoId',$asignaturaCursoId);
    }

    public function pdf($idAsig,$idTipoNota,$asignaturaCursoId)
    {

        $tipoNota = TipoNota::find($idTipoNota);

        $modalidad = Modalidad::find($tipoNota->IDMODALIDAD);

        $asignaturaCurso = AsignaturaCurso::find($asignaturaCursoId);

        $asignatura = Asignatura::find($asignaturaCurso->asignatura->ASIGNATURAID);

        $now = Carbon::now();

        $date = $now->format('d-m-Y');


        $notas = Nota::where([['ASIGNATURAID','=',$asignatura->ASIGNATURAID],['ANIO','=',$asignaturaCurso->ANIO],['TIPONOTAID','=',$idTipoNota],
        ['IDMODALIDAD','=',$modalidad->IDMODALIDAD],['ASIGNATURACURSOID','=',$asignaturaCurso->ASIGNATURACURSOID]])->get();

         $pdf = PDF::loadView('notas.pdf.Notas',compact('notas','asignatura','tipoNota','date'));

                                     return $pdf->download('listado.pdf');

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

        $nota=Nota::findorfail($id);
            $nota->NOTA = $request->nota;
            $nota->save();
          //  dd($nota->NOTAID);
            flash(" La Nota del Alumno/a ".$nota->alumno->NOMBRES.'-'.$nota->alumno->APELLIDOS." fue editada correctamente!!!")->warning();
            $estado = "activo";
            return redirect()->action('DocenteCursoController@list',['idDiv'=>$request->idDiv,'idAsig'=>$request->idAsig,
                                                                    'asignaturaCursoId'=>$request->asignaturaCursoId,
                                                                    'estado'=>$estado,
                                                                    'IdNota'=>$nota->NOTAID]);
      // return redirect()->back();


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
