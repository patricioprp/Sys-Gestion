<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\nota;

class NotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    /*  $tablanotas = nota::join('ASIGNATURA', 'ASIGNATURA.ASIGNATURAID', '=', 'NOTAS.ASIGNATURAID')
            ->join('ALUMNOS', 'ALUMNOS.IDALUMNO', '=', 'NOTAS.IDALUMNO')
            ->select('NOTAS.*', 'ASIGNATURA.NOMBRE AS MATERIA', 'ALUMNOS.APELLIDOS AS NOMBRES')
            ->where('NOTAS.ANIO','=',2018)
            ->where('NOTAS.IDDIVISION','=','5B')
            ->where('NOTAS.IDNIVELES','=','SECUNDARIO')
            ->where('NOTAS.IDMODALIDAD','=',18)
            ->where('NOTAS.TIPONOTAID','=',24)
            ->where('NOTAS.ASIGNATURAID','=',22)
            ->get();
        return view('notas.vernotas',compact('tablanotas')); */

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
         $tablanotas = nota::join('ASIGNATURA', 'ASIGNATURA.ASIGNATURAID', '=', 'NOTAS.ASIGNATURAID')
        ->join('ALUMNOS', 'ALUMNOS.IDALUMNO', '=', 'NOTAS.IDALUMNO')
        ->select('NOTAS.*', 'ASIGNATURA.NOMBRE AS MATERIA', 'ALUMNOS.APELLIDOS AS APELLIDO','ALUMNOS.NOMBRES AS NOMBRE')
        ->find($id);
        return view('notas.editar',compact('tablanotas'));

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
      //  dd($request);

        $tablanotas=nota::findorfail($id);
       // $tablanotas->fill($request->all());
    $tablanotas->NOTA = $request->NOTA;
      $tablanotas->save();
      return redirect(route('docentecurso'));

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
