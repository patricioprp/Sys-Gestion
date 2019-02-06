@extends('layouts.principal')

@section('titulo','Editando Nota')

@section('cuerpo')

{!! Form::open(['route' => ['Nota.update',$nota],'method'=>'PUT']) !!}
     <div class="panel-group">
       <div class="row">
        <div class="alert alert-primary" role="alert">
        <h3><b>Alumno:</b> {{$nota->alumno->NOMBRES}}-{{$nota->alumno->APELLIDOS}}</h3>
        </div>
       </div>
       <div class="row">
            <div class="alert alert-warning" role="alert">
                    NIVEL <b>{{$nota->IDNIVELES}}</b>
            </div>
           <div class="alert alert-success" role="alert">
               DIVISION <b>{{$nota->IDDIVISION}}</b>
           </div>
           <div class="alert alert-danger" role="alert">
             ASIGNATURA <b>{{$asignatura->NOMBRE}}</b>
           </div>
        </div>
          <h3>Nota :{!! Form::text('nota', $nota->NOTA) !!}</h3>
          {!! Form::hidden('idAsig', $idAsig) !!}
          {!! Form::hidden('idDiv', $idTipoNota) !!}
          {!! Form::submit('Editar',['class'=>'btn btn-primary']) !!}
     </div>
{!! Form::close() !!}
@endsection
