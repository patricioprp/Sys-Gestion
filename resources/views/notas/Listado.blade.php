@extends('layouts.principal')

@section('titulo','Listado de notas')

@section('cuerpo')

    <div class="panel panel-default">
      <!-- Default panel contents -->
      <div class="panel-heading">
        <div class="row">
            <h5>Asignatura:{{$asignatura->NOMBRE}}  - Año:{{$anio}}  - Nivel:{{$nivel}}  - Division:{{$division}}  </h5>
            {!! Form::hidden('idDiv', $idDiv) !!}
        </div>
        <hr>
        <p>
            <a href="{{ route('Notas.pdf',['idAsig' => $asignatura->ASIGNATURAID, 'idTipoNota' =>$idTipoNota]) }}" class="btn btn-sm btn-primary">
                Descargar Notas en PDF
            </a>
        </p>
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
            <td><a href="{{route('NotaView', ['idNota' => $nota->NOTAID, 'idAsig' => $asignatura->ASIGNATURAID, 'idTipoNota' =>$idTipoNota])}}" class="btn btn-success" title="Calificar">Calificar</span></a></td>
        </tr>
          @endforeach

      </table>
    </div>
    </div>
</p>
@endsection
