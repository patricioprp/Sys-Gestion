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

class NotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $tipoNota = TipoNota::find($request->tipoNota);

        $modalidad = Modalidad::find($tipoNota->IDMODALIDAD);

        $configuraMod = ConfiguraMod::where([['IDMODALIDAD','=',$modalidad->IDMODALIDAD],['ACTIVO','=','S'],['ANO','=',date("Y")]])->get();

        $asignatura = Asignatura::find($request->asigCurso);

        if($configuraMod)
        {
         $notas = Nota::where([['ASIGNATURAID','=',$request->asigCurso],['TIPONOTAID','=',$request->tipoNota],
         ['IDMODALIDAD','=',$modalidad->IDMODALIDAD]])->get();


         foreach($notas as $n){
           $anio = $n->ANIO;
           $nivel = $n->division->IDNIVELES;
          $division = $n->division->ABREVIA;
          $idDiv = $n->division->IDDIVISION;
         }
         return view('notas.Listado')->with('notas',$notas)
                                     ->with('asignatura',$asignatura)
                                     ->with('anio',$anio)
                                     ->with('nivel',$nivel)
                                     ->with('idDiv',$idDiv)
                                     ->with('division',$division)
                                     ->with('idTipoNota',$request->tipoNota);
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
        /* $tablanotas = nota::join('ASIGNATURA', 'ASIGNATURA.ASIGNATURAID', '=', 'NOTAS.ASIGNATURAID')
        ->join('ALUMNOS', 'ALUMNOS.IDALUMNO', '=', 'NOTAS.IDALUMNO')
        ->select('NOTAS.*', 'ASIGNATURA.NOMBRE AS MATERIA', 'ALUMNOS.APELLIDOS AS APELLIDO','ALUMNOS.NOMBRES AS NOMBRE')
        ->find($id);
        return view('notas.editar',compact('tablanotas'));*/
        $nota = Nota::find($id);
        return view('notas.Editar')->with('nota',$nota);

    }

    public function view($idNota,$idAsig,$idTipoNota)
    {
        $nota = Nota::find($idNota);
        $asignatura = Asignatura::find($idAsig);
        return view('notas.Editar')->with('nota',$nota)
                                   ->with('asignatura',$asignatura)
                                   ->with('idAsig',$idAsig)
                                   ->with('idTipoNota',$idTipoNota);
    }

    public function pdf($idAsig,$idTipoNota)
    {


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
         $pdf = PDF::loadView('notas.pdf.Notas')->with('notas',$notas)
                                     ->with('anio',$anio)
                                     ->with('asignatura',$asignatura)
                                     ->with('idDiv',$idDiv)
                                     ->with('nivel',$nivel)
                                     ->with('division',$division)
                                     ->with('idTipoNota',$idTipoNota);
                                    // $pdf = PDF::loadView('pdf.products', compact('products'));

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
        //dd($request->all());
        //dd($id);
        $nota=Nota::findorfail($id);

         $nota->NOTA = $request->nota;
        $nota->save();
        return redirect()->action('DocenteCursoController@list',['idDiv'=>$request->idDiv,'idAsig'=>$request->idAsig]);
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
    public function detallenotas(Request $request)
    {
        $seleccion=$request->input('control1');
        $anio=$request->input('ano');
        $modali=$request->input('control2');
        $tipono=$request->input('control3');

        $tablanotas = nota::join('ASIGNATURA', 'ASIGNATURA.ASIGNATURAID', '=', 'NOTAS.ASIGNATURAID')
        ->join('ALUMNOS', 'ALUMNOS.IDALUMNO', '=', 'NOTAS.IDALUMNO')
        ->select('NOTAS.*', 'ASIGNATURA.NOMBRE AS MATERIA', 'ALUMNOS.APELLIDOS AS APELLIDO','ALUMNOS.NOMBRES AS NOMBRE')
        ->where('NOTAS.ASIGNATURACURSOID','=',$seleccion)
        ->where('NOTAS.IDMODALIDAD','=',$modali)
        ->where('NOTAS.TIPONOTAID','=',$tipono)
        ->get();
        return view('notas.vernotas',compact('tablanotas'));

    }

    public function __construct()
    {
        $this->middleware('auth');
    }

}
