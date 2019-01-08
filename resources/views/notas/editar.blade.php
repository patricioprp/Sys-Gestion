@extends('layouts.principal')

@section('titulo','Consulta de notas')

@section('cuerpo')	
<form class="form-group" method="POST" action="/nota/{{ $tablanotas->NOTAID}}" enctype="multipart/form-data">
	@method('PUT')
	@csrf
	<div class="form-group">
		<label for="">Apellido</label>
		<input type="text" class="form-control" name="name" value="{{ $tablanotas->APELLIDO }}">
	</div>
	<div class="form-group">
		<label for="">Nombre</label>
		<input type="text" class="form-control" name="name" value="{{ $tablanotas->NOMBRE }}">
	</div>
	
	<div class="form-group">	
		<label for="">NOTA</label>
		<input class="form-control" name="NOTA" value="{{ $tablanotas->NOTA }}">
	</div>

	<button class="btn btn-prymary" type="submit">Actualizar</button>
</form>
@endsection
