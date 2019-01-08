@extends('layouts.principal')

@section('titulo','Consulta de notas')

@section('cuerpo')
<div class="row">
	<h5>Asignatura: {{substr($tablanotas[0]->MATERIA,0,27)}} - Año: {{ $tablanotas[0]->ANIO }} - Nivel: {{substr($tablanotas[0]->IDNIVELES,0,27)}} - Division: {{substr($tablanotas[0]->IDDIVISION,0,27)}} </h5>
</div>

<div class="row" style="margin-top: 30px">
	<table class="table table-striped table-sm">
	  <thead class="thead-dark">
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">Apellido</th>
	      <th scope="col">Nombre</th>
	      <th scope="col">Nota</th>
	    </tr>
	  </thead>
	  <tbody>
	  	@foreach($tablanotas as $detnota)
		    <tr>
		      <td>{{ $detnota->NOTAID }}</td>
		      <td>{{ $detnota->APELLIDO }}</td>
		      <td>{{ $detnota->NOMBRE }}</td>
		      <td>{{ $detnota->NOTA}}</td>
			  <td>
				<a href="/nota/{{ $detnota->NOTAID}}" class="btn btn-primary" role="button">Editar nota</a>
 			  </td>	
		    </tr>
	    @endforeach
	  </tbody>
	</table>
</div>	
@endsection
