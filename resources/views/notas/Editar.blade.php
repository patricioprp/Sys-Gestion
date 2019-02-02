@extends('layouts.principal')

@section('titulo','Editando Nota')

@section('cuerpo')

{!! Form::open(['route' => ['Nota.update',$nota],'method'=>'PUT']) !!}
     <div class="panel-group">
        <div class="alert alert-primary" role="alert">
            <h3><b>Alumno:</b> {{$nota->alumno->NOMBRES}}-{{$nota->alumno->APELLIDOS}}</h3>
        </div>
        <div class="alert alert-success" role="alert">
              <b>Asignatura: </b>{{$asignatura->NOMBRE}}
        </div>
          <h3>Nota :{!! Form::text('nota', $nota->NOTA) !!}</h3>
          {!! Form::hidden('idAsig', $idAsig) !!}
          {!! Form::hidden('idDiv', $idTipoNota) !!}
          {!! Form::hidden('idAsigCurso', $idAsigCurso) !!}
          {!! Form::submit('Editar',['class'=>'btn btn-primary']) !!}
     </div>
{!! Form::close() !!}
@endsection
