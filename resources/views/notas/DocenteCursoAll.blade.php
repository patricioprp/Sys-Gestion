@extends('layouts.principal')
@section('titulo','Consulta de notas')

@section('cuerpo')

{!! Form::open(['route' => 'NotaAll.view','method'=>'POST']) !!}

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
        <option value={{$configuraMod->modalidad->IDMODALIDAD}}>{{  $configuraMod->modalidad->EVALUACION }}-{{ $configuraMod->modalidad->DESCRIPCION}}</option>
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
            <a href="/" class="btn btn-danger" style="color:white"><b>Volver</b></a>
      </div>
      <div class="col-lg-2">
              {!! Form::submit('Buscar',['class'=>'btn btn-primary']) !!}
      </div>
  </div>
</div>

{!! Form::close() !!}
@endsection