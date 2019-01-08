@extends('layouts.principal')

@section('titulo','Consulta de notas')

@section('cuerpo')
 	<form class="form-group" method="get" action="vernotas" enctype="multipart/form-data">
 		<div class="form-group">
			<label for="">Año</label>
			<input type="text" class="form-control" name="ano" value="2018">
		</div>
		<div class="form-group">          
            <label for="control1">Seleccione un Nivel / Division</label> 
            <select class="form-control" id="control1" name="control1">
            	@foreach($docentecursos as $doccurso) 
                	<option value={{ $doccurso->ASIGNATURACURSOID}}>{{ $doccurso->ANIO }} - {{ $doccurso->IDNIVELES }} - {{ $doccurso->IDDIVISION }} - {{ $doccurso->NOMASIGNATURA }}</option>
                @endforeach    
            </select> 
        </div>
        <div class="form-group">          
            <label for="control2">Seleccione Modalidad</label> 
            <select class="form-control" id="control2" name="control2">
            	@foreach($tablamodalidad as $modali) 
                	<option value={{ $modali->IDMODALIDAD}}>{{ $modali->EVALUACION }}</option>
                @endforeach    
            </select> 
        </div>
        <div class="form-group">          
            <label for="control3">Seleccione Tipo Nota</label> 
            <select class="form-control" id="control3" name="control3">
                @foreach($tiponota as $tipono) 
                    <option value={{ $tipono->TIPONOTAID}}>{{ $tipono->DESCRIPCION }}</option>
                @endforeach    
            </select> 
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
	</form>
@endsection

@section('javascript')
    <script src="/js/modalidad/modalidad.js"></script>
@endsection



