@extends('layouts.principal')
@section('titulo','Consulta de notas')

@section('cuerpo')

{!! Form::open(['route' => 'docenteCurso.store','method'=>'POST']) !!}

<div class="form-group">
<div class="row">
    <label for="ano">Año</label>
    <input type="text" class="form-control" name="ano" value={{date("Y")}}>
</div>
<div class="row">
    <div class="col-lg-12">
        {!! Form::select('docenteCurso',$docenteCursos,null,['class'=>'form-control','id' =>'docenteCurso','placeholder'=>'Seleccione un Curso'])!!}
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        {!! Form::select('modalidad',['placeholder'=>'Seleccion una Modalidad'],null,['class'=>'form-control select-modalidad','id'=>'modalidad'])!!}
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        {!! Form::select('tipoNota',['placeholder'=>'Selecciona un Tipo de Nota'],null,['class'=>'form-control','id'=>'tipoNota'])!!}
    </div>
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
