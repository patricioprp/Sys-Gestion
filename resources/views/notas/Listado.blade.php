
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
              <div class="alert alert-success" role="alert">
              <h5>{{$asignatura->NOMBRE}}-{{$asignatura->ASIGNATURAID}}</h5>
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
          <th onclick="sortTable(1)">APELLIDO</th>
          <th onclick="sortTable(0)">NOMBRE</th>
          <th>NOTA</th>
          <th>AÑO</th>
          <th>NIVEL</th>
          <th>DIVISION</th>
          <th>ACCION</th>
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
            <td><a href="{{route('NotaView', ['idNota' => $nota->NOTAID, 'idAsig' => $asignatura->ASIGNATURAID, 'idTipoNota' =>$idTipoNota, 'asignaturaCursoId'=>$asignaturaCursoId])}}" class="btn btn-warning" title="Calificar"><b>Editar Nota</b></span></a>
                @if($asignatura->NOTAADICIONAL)
            <a href="{{route('NotaAdicional.view',$nota->NOTAID)}}" class="btn btn-info"><b>Nota Adicional</b></a>
                @endif
            </td>
        </tr>
          @endforeach
      </table>
    </div>
    </div>
</p>

@endsection
