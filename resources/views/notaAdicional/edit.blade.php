@extends('layouts.principal')

@section('titulo','Editando Nota Adicional')

@section('cuerpo')
{!! Form::open(['route' => ['NotaAdicional.update',$notaAdicional->IDNOTAADICIONAL],'method'=>'PUT']) !!}
<div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading">
        <div class="row">
            <div class="alert alert-info" role="alert">
                <h5><strong>ASIGNATURA: {{$nota->asignatura->NOMBRE}}</strong></h5>
            </div>
            <div class="alert alert-primary" role="alert">
                <h5><strong>ALUMNO: {{$nota->alumno->NOMBRES}}-{{$nota->alumno->APELLIDOS}}</strong></h5>
            </div>
            <div class="alert alert-success" role="alert">
            <h5>DIVISION:{{$nota->IDDIVISION}}</h5>
           </div>
           <div class="alert alert-warning" role="alert">
            <h5>NIVEL:{{$nota->IDNIVELES}}</h5>
           </div>
         </div>
      <hr>
    </div>
  </div>
  <div class="col-xs-12">
    <div class="table-responsive">
          <!-- Table -->
          <table class="table table-bordered table-condensed table-striped table-responsive table-hover">
            <tr>
              <th>#</th>
              <th>DESCRIPCION</th>
              <th>NOTA</th>
            </tr>
              <tr>
                <td>{{$notaAdicional->IDNOTAADICIONAL}}</td>
                <td>{{$notaAdicional->planAsigAdic->DESCRIPCION}}</td>
                <td></label><input type="text" name="notaAdicional" value="{{$notaAdicional->NOTA}}"></td>
            </tr>
          </table>
        </div>
        </div>
        {!! Form::hidden('idNota', $nota->NOTAID) !!}
        <div class="row">
            <button class="btn btn-primary">Aceptar</button>
        </div>
{!! Form::close() !!}
@endsection
