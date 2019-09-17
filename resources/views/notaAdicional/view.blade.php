@extends('layouts.principal')

@section('titulo','Notas Adicionales')

@section('cuerpo')

<div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading">
    <a href="{{route('NotaList',['idAsig'=>$nota->ASIGNATURAID,'idTipoNota'=>$nota->TIPONOTAID,'AsinaturaCursoId'=>$nota->ASIGNATURACURSOID,'estado'=>'activo','IdNota'=>$nota->NOTAID])}}" class="btn btn-danger btn-lg" style="color:white"><b>VOLVER</b></a>
        <div class="row">
            <div class="alert alert-info" role="alert">
                <h5><strong>{{$nota->asignatura->NOMBRE}}</strong></h5>
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
              <th>NOTA ARRAY</th>
              <th>ACCION</th>
            </tr>
            {!! Form::open(['route' => 'NotaAdicional.store','method'=>'POST']) !!}
              @foreach ($notaAdicionals as $notaAdicional)
              <tr>
                <td>{{ $notaAdicional->IDNOTAADICIONAL }}</td>
                <td>{{$notaAdicional->planAsigAdic->DESCRIPCION}}</td>
                <td>{{ $notaAdicional->NOTA }}</td>
                <td>
                  <input type="text" name={{ $notaAdicional->IDNOTAADICIONAL }} value={{ $notaAdicional->NOTA }}>
                  <input type="hidden" name="idNota" value={{ $nota->NOTAID }} >
                </td>
              <td><a href="{{route('NotaAdicional.show',['idNota' => $nota->NOTAID,  'idNotaAdicional'=>$notaAdicional->IDNOTAADICIONAL])}}" class="btn btn-warning" title="Calificar"><b>Editar Nota</b></span></a>
                </td>
            </tr>
              @endforeach
          </table>
          {!! Form::submit('Registrar',['class'=>'btn btn-primary']) !!}
          {!! Form::close() !!}
        </div>
        </div>

@endsection

