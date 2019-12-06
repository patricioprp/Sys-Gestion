
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
       <a href="{{route('docenteCurso.all')}}" class="btn btn-danger btn-lg" style="color:white"><b>VOLVER</b></a>
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
          <th>ACCION</th>
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
            <td>
                @if($asignatura->NOTAADICIONAL)
            <a href="{{route('NotaAdicional.viewAll',$nota->NOTAID)}}" class="btn btn-info""><b>Nota Adicional</b></a>
                @endif
            </td>
        </tr>
        @elseif(($IdNota!="{{$nota->NOTAID}}"))
        <tr>
            <td>{{$nota->NOTAID}}</td>
            <td>{{$nota->alumno->APELLIDOS}} {{$nota->alumno->NOMBRES}}</td>

            <td>{{$nota->NOTA}}</td>
            <td>{{$nota->ANIO}}</td>
            <td>{{$nota->IDNIVELES}}</td>
            <td>{{$nota->IDDIVISION}}</td>
            <td>
                @if($asignatura->NOTAADICIONAL)
            <a href="{{route('NotaAdicional.viewAll',$nota->NOTAID)}}" class="btn btn-info""><b>Nota Adicional</b></a>
                @endif
            </td>
        </tr>
        @endif
          @endforeach
      </table>
    </div>
    </div>
</p>
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script>
function reply_click(clicked_id)
{
    var id=clicked_id;
    console.log('#'+id);
    var posicion = $('#'+id).offset().top;
    sessionStorage.setItem("posicion", posicion);
}
$( document ).ready(function() {
                var posicion= sessionStorage.getItem("posicion");
                console.log(posicion);
                $("html, body").animate({
                scrollTop: posicion
            }, 2000);
            sortTable(1);//se envia parametro para ordenar a la funcion para ordenar la tabla, tmb se puede ordenar clickeando en la colummna
             //inicializar=0;
            // sessionStorage.setItem("posicion", inicializar);
        });
</script>
@endsection