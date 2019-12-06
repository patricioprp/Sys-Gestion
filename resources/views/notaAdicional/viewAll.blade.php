@extends('layouts.principal')

@section('titulo','Notas Adicionales')

@section('cuerpo')

<div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading">
    <a href="{{route('NotaListAll',['idAsig'=>$nota->ASIGNATURAID,'idTipoNota'=>$nota->TIPONOTAID,'AsinaturaCursoId'=>$nota->ASIGNATURACURSOID,'estado'=>'activo','IdNota'=>$nota->NOTAID])}}" class="btn btn-danger btn-lg" style="color:white"><b>VOLVER</b></a>
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
            </tr>
           <input type="hidden" value={{ $i=0 }}>
            {!! Form::open(['route' => 'NotaAdicional.store','method'=>'POST']) !!}
            <input type="hidden" name="notaAdicionals" value={{ $notaAdicionals }}>
              @foreach ($notaAdicionals as $notaAdicional)
              <tr>
                <td>{{ $notaAdicional->IDNOTAADICIONAL }}</td>
                <td>{{$notaAdicional->planAsigAdic->DESCRIPCION}}</td>
                <td>                
                  <label type="text" name={{ $i }} value={{ $notaAdicional->NOTA }}>
                  <input type="hidden" name="idNota" value={{ $nota->NOTAID }} >
                </td>
            </tr>
            <input type="hidden" value={{ $i=$i+1 }}>
              @endforeach
          </table>
          <center>
          {!! Form::submit('Registrar',['class'=>'btn btn-primary']) !!}
          </center>
          {!! Form::close() !!}
        </div>
        </div>

@endsection

