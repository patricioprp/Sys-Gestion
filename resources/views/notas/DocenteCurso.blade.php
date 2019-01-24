@extends('layouts.principal')
@section('titulo','Consulta de notas')

@section('cuerpo')

{!! Form::open(['route' => 'docenteCurso.store','method'=>'POST']) !!}

<div class="form-group">
<div class="row">
    <label for="ano">Año</label>
    <input type="text" class="form-control" name="ano" value={{date("Y")}}>
</div>
<p>
<div class="row">
    <select class="form-control" id="asigCurso" name="asigCurso">
        @foreach($docenteCursos as $docCurso)
            <option value={{ $docCurso->asignatura->ASIGNATURAID}}>{{ $docCurso->ANIO }} - {{ $docCurso->IDNIVELES }} - {{ $docCurso->IDDIVISION }} - {{$docCurso->asignatura->NOMBRE}}-{{$docCurso->asignatura->ASIGNATURAID}}</option>
        @endforeach
    </select>
</div>
</p>
<p>
<div class="row">
        {!! Form::select('modalidad',['placeholder'=>'Seleccion una Modalidad'],null,['class'=>'form-control','id'=>'modalidad'])!!}
</div>
</p>
<div class="row">
        {!! Form::select('tipoNota',['placeholder'=>'Selecciona un Tipo de Nota'],null,['class'=>'form-control','id'=>'tipoNota'])!!}
</div>
  <hr /><hr />
  <div class="row">
      <div class="col-lg-2">
              {!! Form::submit('Buscar',['class'=>'btn btn-primary']) !!}
      </div>
  </div>
</div>

{!! Form::close() !!}

@endsection
