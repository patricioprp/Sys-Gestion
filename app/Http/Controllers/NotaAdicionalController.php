<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NotAdicional;
use App\Nota;
use Illuminate\Support\Facades\DB;

class NotaAdicionalController extends Controller
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
        $nota = Nota::find($request->idNota);
        $notaAdicionalsQuery = NotAdicional::where([['ANO','=',$nota->ANIO],['IDALUMNO','=',$nota->IDALUMNO],
        ['IDMODALIDAD','=',$nota->IDMODALIDAD],['ASIGNATURAID','=',$nota->ASIGNATURAID]]);
        $notaAdicionals= $notaAdicionalsQuery->get();
        foreach($notaAdicionals as $idx=>$notaAdicional){
        $notAd= NotAdicional::find($notaAdicional->IDNOTAADICIONAL);
        $notAd->NOTA=$request->$idx;
        $notAd->save();
        }
        flash(" La Nota del Alumno/a".$nota->alumno->NOMBRES.'-'.$nota->alumno->APELLIDOS." fue editada correctamente!!!")->warning();
        return redirect()->action('NotaAdicionalController@view',['idNota'=>$request->idNota]);
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
    public function showNotaAdicional($idNota,$idNotaAdicional)
    {
       $nota = Nota::find($idNota);
       $notaAdicional = NotAdicional::find($idNotaAdicional);
       return view('notaAdicional.edit')->with('nota',$nota)
                                        ->with('notaAdicional',$notaAdicional);
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
        $notaAdicional = NotAdicional::find($id);
        $notaAdicional->NOTA = $request->notaAdicional;
        $notaAdicional->save();
        flash(" La Nota del Alumno/a ".$notaAdicional->alumno->NOMBRES.'-'.$notaAdicional->alumno->APELLIDOS." fue editada correctamente!!!")->warning();
        return redirect()->action('NotaAdicionalController@view',['idNota'=>$request->idNota]);
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

    public function view($idNota)
    {
    $nota = Nota::find($idNota);
    $notaAdicionalsQuery = NotAdicional::where([['ANO','=',$nota->ANIO],['IDALUMNO','=',$nota->IDALUMNO],
                                          ['IDMODALIDAD','=',$nota->IDMODALIDAD],['ASIGNATURAID','=',$nota->ASIGNATURAID]]);
    $notaAdicionals= $notaAdicionalsQuery->get();
     if(count($notaAdicionals)==0)
    {
    $notaAdicionals = DB::select('execute procedure AGREGARNOTASADIC(?,?,?,?,?)',array($nota->ASIGNATURAID,$nota->IDMODALIDAD,date("Y"),$nota->IDNIVELES,$nota->IDDIVISION));
    $notaAdicionals= $notaAdicionalQuery->get();
    return view('notaAdicional.view')->with('nota',$nota)
                                     ->with('notaAdicionals',$notaAdicionals);
    }

    return view('notaAdicional.view')->with('nota',$nota)
                                     ->with('notaAdicionals',$notaAdicionals);
    }
}
