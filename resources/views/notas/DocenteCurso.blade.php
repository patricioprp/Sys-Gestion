@extends('layouts.principal')
@section('titulo','Consulta de notas')

@section('cuerpo')

{!! Form::open(['route' => 'Nota.store','method'=>'POST']) !!}

<div class="form-group">
<div class="row">
     <!--  <label for="ano">Año</label>
 <input type="text" class="form-control" name="ano" value="2015"> -->
</div>
<p>
<div class="row">
    <select class="form-control col-md-4" id="modalidad" name="modalidad" required>
        <option value="" disabled selected>Seleccione una Modalidad</option>
    @foreach($configuraMods as $configuraMod)
        <option value={{$configuraMod->modalidad->IDMODALIDAD}}>{{ $configuraMod->modalidad->DESCRIPCION}} - {{ $configuraMod->modalidad->IDMODALIDAD}} </option>
        @endforeach
</select>
</div>
</p>
<div class="row">
        {!! Form::select('tipoNota',['placeholder'=>'Selecciona un Tipo de Nota'],null,['class'=>'form-control col-md-4','id'=>'tipoNota'])!!}
</div>
<p>
    <div class="row">
        <select class="form-control col-md-6" id="asignaturaCursoId" name="asignaturaCursoId" required>
              <option value="" disable selected>Seleccione una Asignatura</option>
        @foreach($docenteCursos as $docenteCurso)
        <option value={{$docenteCurso->ASIGNATURACURSOID}}>{{$docenteCurso->ANIO}}-{{$docenteCurso->asignaturaCurso->asignatura->NOMBRE}}-{{$docenteCurso->asignaturaCurso->IDDIVISION}}-{{$docenteCurso->asignaturaCurso->IDNIVELES}}</option>
        @endforeach
        </select>
    </div>
    </p>
    <div class="col-md-6">
        <hr  />
    </div>
  <div class="row">
      <div class="col-lg-2">
              {!! Form::submit('Buscar',['class'=>'btn btn-primary']) !!}
      </div>
  </div>
</div>

{!! Form::close() !!}
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script>
    $( document ).ready(function() {
        $(function(){
        $('#modaliad').val('0')
        $('#modalidad').change();
        console.log("combio");//puede q este script genere conflictos en el select dinamico y en la busqueda de alumnos
    });
            });
    </script>
@endsection
