@extends('layouts.principal')

@section('titulo','Listado de notas')

@section('cuerpo')
<body>
    <div class="panel panel-default">
      <!-- Default panel contents -->
      <div class="panel-heading">
        <div class="row">
            <h5>Asignatura:{{$asignatura->NOMBRE}}  - Año:{{$anio}}  - Nivel:{{$nivel}}  - Division:{{$division}}  </h5>
        </div>
      </div>
<p>
<div class="col-xs-12">
<div class="table-responsive">
      <!-- Table -->
      <table class="table table-bordered table-condensed table-striped table-responsive table-hover">
        <tr>
          <th>#</th>
          <th>Apellido</th>
          <th>Nombre</th>
          <th>Nota</th>
          <th>Accion</th>
        </tr>

          @foreach ($notas as $nota)
          <tr>
            <td>{{$nota->NOTAID}}</td>
            <td>{{$nota->alumno->APELLIDOS}}</td>
            <td>{{$nota->alumno->NOMBRES}}</td>
            <td>{{$nota->NOTA}}</td>
            <td><a href="" class="btn btn-success" title="Ver Comisiones">Calificar</span></a></td>
        </tr>
          @endforeach

      </table>
    </div>
    </div>
</p>
@endsection
