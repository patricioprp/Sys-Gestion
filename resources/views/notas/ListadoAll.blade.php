
@extends('layouts.principal')

@section('titulo','Listado de notas')

@section('cuerpo')

    <div class="panel panel-default">
      <!-- Default panel contents -->
      <div class="panel-heading">
          <div class="row">
              <div class="alert alert-info" role="alert">
                  <h5><strong>MODALIDAD: {{$tipoNota->modalidad->DESCRIPCION}}</strong></h5>
              </div>
              <div class="alert alert-primary" role="alert">
                  <h5><strong>TIPO DE NOTA: {{$tipoNota->DESCRIPCION}}</strong></h5>
              </div>
              <div class="alert alert-primary" role="alert">
                <h5><strong>ASIGNATURA: {{$asignatura->NOMBRE}}</strong></h5>
            </div>
           </div>
        <hr>
       <div class="row">
       <a href="{{route('docenteCurso.index')}}" class="btn btn-danger btn-lg" style="color:white"><b>VOLVER</b></a>
            <a href="{{ route('Notas.pdf',['idAsig' => $asignatura->ASIGNATURAID, 'idTipoNota' =>$idTipoNota, 'asignaturaCursoId'=>$asignaturaCursoId]) }}" class="btn btn-info btn-lg">
                Descargar Notas en PDF
            </a>
      </div>
      </div>
    </div>
<p>
<div class="col-xs-12">
<div class="table-responsive">
      <!-- Table -->
      <table class="table table-bordered table-condensed table-striped table-responsive table-hover" id="myTable2">
        <tr>
          <th>#</th>
          <th onclick="sortTable(1)" id="ordenar">NOMBRE Y APELLIDO</th>
          <th>VALOR</th>
          <th>AÑO</th>
          <th>NIVEL</th>
          <th>DIVISION</th>
        </tr>
          @foreach ($notas as $nota)
            @if($nota->NOTAID=="$IdNota")
        <tr id="{{$estado}}">
            <td>{{$nota->alumno->IDALUMNO}}</td>
            <td>{{$nota->alumno->APELLIDOS}} {{$nota->alumno->NOMBRES}}</td>
            <td>{{$nota->NOTA}}</td>
            <td>{{$nota->ANIO}}</td>
            <td>{{$nota->IDNIVELES}}</td>
            <td>{{$nota->IDDIVISION}}</td>
        </tr>
        @elseif(($IdNota!="{{$nota->NOTAID}}"))
        <tr>
            <td>{{$nota->NOTAID}}</td>
            <td>{{$nota->alumno->APELLIDOS}} {{$nota->alumno->NOMBRES}}</td>

            <td>{{$nota->NOTA}}</td>
            <td>{{$nota->ANIO}}</td>
            <td>{{$nota->IDNIVELES}}</td>
            <td>{{$nota->IDDIVISION}}</td>
        </tr>
        @endif
          @endforeach
      </table>
    </div>
    </div>
</p>

@endsection