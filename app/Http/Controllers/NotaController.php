<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
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

        $asignaturaCurso = AsignaturaCurso::find($request->asigCurso);

        $asignatura = Asignatura::find($asignaturaCurso->ASIGNATURAID);

        $configuraMod = ConfiguraMod::where([['IDMODALIDAD','=',$modalidad->IDMODALIDAD],['ACTIVO','=','S'],['ANO','=',$asignaturaCurso->ANIO]])->get();

        if($configuraMod)
        {
         $notas = Nota::where([['ASIGNATURAID','=',$asignaturaCurso->ASIGNATURAID],['IDDIVISION','=',$asignaturaCurso->IDDIVISION],['ANIO','=',$asignaturaCurso->ANIO],['TIPONOTAID','=',$request->tipoNota],
         ['IDMODALIDAD','=',$modalidad->IDMODALIDAD]])->get();

         return view('notas.Listado')->with('notas',$notas)
                                     ->with('asignatura',$asignatura)
                                     ->with('idAsigCurso',$request->asigCurso)
                                     ->with('idTipoNota',$request->tipoNota)
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

    public function view($idNota,$idAsig,$idTipoNota,$idAsigCurso)
    {
        $nota = Nota::find($idNota);
        $asignatura = Asignatura::find($idAsig);
        return view('notas.Editar')->with('nota',$nota)
                                   ->with('asignatura',$asignatura)
                                   ->with('idAsigCurso',$idAsigCurso)
                                   ->with('idAsig',$idAsig)
                                   ->with('idTipoNota',$idTipoNota);
    }

    public function pdf($idAsig,$idTipoNota,$idAsigCurso)
    {

        $tipoNota = TipoNota::find($idTipoNota);

        $modalidad = Modalidad::find($tipoNota->IDMODALIDAD);

        $asignaturaCurso = AsignaturaCurso::find($idAsigCurso);

        $asignatura = Asignatura::find($asignaturaCurso->ASIGNATURAID);

        $configuraMod = ConfiguraMod::where([['IDMODALIDAD','=',$modalidad->IDMODALIDAD],['ACTIVO','=','S'],['ANO','=',$asignaturaCurso->ANIO]])->get();

        $now = Carbon::now();

        $date = $now->format('d-m-Y');

        $time = $now->format('H:i:s');
        if($configuraMod)
        {
         $notas = Nota::where([['ASIGNATURAID','=',$asignaturaCurso->ASIGNATURAID],['IDDIVISION','=',$asignaturaCurso->IDDIVISION],['ANIO','=',$asignaturaCurso->ANIO],['TIPONOTAID','=',$idTipoNota],
         ['IDMODALIDAD','=',$modalidad->IDMODALIDAD]])->get();

         $pdf = PDF::loadView('notas.pdf.Notas',compact('notas','asignatura','idAsigCurso','tipoNota','date','time'));

                                     return $pdf->download('listado.pdf');
        }
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
        if(is_numeric ( $request->nota )){
         if($request->nota> "0" && $request->nota< "11"){
            $nota->NOTA = $request->nota;
            $nota->save();
            flash("Nota cargada correctamente")->important();
            return redirect()->action('DocenteCursoController@list',['idDiv'=>$request->idDiv,'idAsig'=>$request->idAsig, 'idAsigCurso'=>$request->idAsigCurso]);
         }
         else{
            flash("Nota no puede ser mayor a 10 ni menor a 1")->error();
            return redirect()->back();
         }
        }
      /*  if(is_string ( $request->nota )){
            dd('es una letra');
        }*/

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
