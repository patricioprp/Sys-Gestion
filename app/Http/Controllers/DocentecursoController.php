<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\docentecurso;
use App\modalidad;
use App\tiponota;
use Auth;


class DocentecursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $iddocente=Auth::user()->id;

        $docentecursos = docentecurso::join('ASIGNATURACURSO', 'ASIGNATURACURSO.ASIGNATURACURSOID', '=', 'DOCENTECURSO.ASIGNATURACURSOID')
            ->join('ASIGNATURA','ASIGNATURA.ASIGNATURAID','=','ASIGNATURACURSO.ASIGNATURAID')
            ->select('ASIGNATURACURSO.*','ASIGNATURA.IDTIPOMODALIDAD','ASIGNATURA.NOMBRE AS NOMASIGNATURA')
            ->where('DOCENTECURSO.IDDOCENTE','=',$iddocente)
            ->get();

        $tablamodalidad = modalidad::all();
        $tiponota = tiponota::all();
        return view('notas.docentecurso',compact('docentecursos','tablamodalidad','tiponota'));
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
    public function show(Request $request)
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
    public function __construct()
    {
        $this->middleware('auth');
    }
  
}
