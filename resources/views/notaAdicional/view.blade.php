@extends('layouts.principal')

@section('titulo','Notas Adicionales')

@section('cuerpo')

<div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading">
        <div class="row">
            <div class="alert alert-info" role="alert">
                <h5><strong>ASIGNATURA: {{$nota->asignatura->NOMBRE}}</strong></h5>
            </div>
            <div class="alert alert-primary" role="alert">
                <h5><strong>ALUMNO: {{$nota->alumno->NOMBRES}}</strong></h5>
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
              <th>ACCION</th>
            </tr>

              @foreach ($notaAdicionals as $notaAdicional)
              <tr>
                <td>{{$notaAdicional->IDNOTAADICIONAL}}</td>
                <td>{{$notaAdicional->planAsigAdic->DESCRIPCION}}</td>
                <td>{{$notaAdicional->NOTA}}</td>
                <td><a href="" class="btn btn-warning" title="Calificar"><b>Editar Nota</b></span></a>
                </td>
            </tr>
              @endforeach
          </table>
        </div>
        </div>

@endsection

