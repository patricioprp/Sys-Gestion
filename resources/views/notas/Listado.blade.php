@extends('layouts.principal')

@section('titulo','Listado de notas')

@section('cuerpo')

    <div class="panel panel-default">
      <!-- Default panel contents -->
      <div class="panel-heading">
        <div class="row">
            <h5>Asignatura:{{$asignatura->NOMBRE}} </h5>

        </div>
        <hr>
        <p>
            <a href="{{ route('Notas.pdf',['idAsig' => $asignatura->ASIGNATURAID, 'idTipoNota' =>$idTipoNota, 'idAsigCurso' =>$idAsigCurso]) }}" class="btn btn-sm btn-primary">
                Descargar Notas en PDF
            </a>
        </p>
      </div>
<p>
<div class="col-xs-12">
<div class="table-responsive">
      <!-- Table -->
      <table class="table table-bordered table-condensed table-striped table-responsive table-hover">
        <tr style="background-color:#14703f;">
          <th id="blanco">#</th>
          <th id="blanco">APELLIDO</th>
          <th id="blanco">NOMBRE</th>
          <th id="blanco">NOTA</th>
          <th id="blanco">AÑO</th>
          <th id="blanco">NIVEL</th>
          <th id="blanco">DIVISION</th>
          <th id="blanco">TIPO NOTA</th>
          <th id="blanco">MODALIDAD</th>
          <th id="blanco">ACCION</th>
        </tr>

          @foreach ($notas as $nota)
          <tr>
            <td>{{$nota->NOTAID}}</td>
            <td>{{$nota->alumno->APELLIDOS}}</td>
            <td>{{$nota->alumno->NOMBRES}}</td>
            <td>{{$nota->NOTA}}</td>
            <td>{{$nota->ANIO}}</td>
          <td>{{$nota->IDNIVELES}}</td>
          <td>{{$nota->IDDIVISION}}</td>
          <td>{{$nota->TIPONOTAID}}</td>
          <td>{{$nota->IDMODALIDAD}}</td>
            <td><a href="{{route('NotaView', ['idNota' => $nota->NOTAID, 'idAsig' => $asignatura->ASIGNATURAID, 'idTipoNota' =>$idTipoNota, 'idAsigCurso' =>$idAsigCurso])}}" class="btn btn-success" title="Calificar">Calificar</span></a></td>
        </tr>
          @endforeach
      </table>
    </div>
    </div>
</p>
@endsection
