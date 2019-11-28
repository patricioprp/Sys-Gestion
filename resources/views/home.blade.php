@extends('layouts.principal')
@section('titulo','Sys-Gestion')
@section('cuerpo')
<div>
    <center>
<img src="{{asset('image/logo.png')}}" alt="Logo" height="120" margin-bottom: 100px>
    </center>
</div>
<p></p>
<div class="content">
         <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-md-4">
                    <div class="card border-primary mb-3" style="max-width: 18rem;">
                        <div class="card-header" style="background-color:#1DA6E1;color:#FBFBFB"><b>Carga de Datos</b></div>
                        <div class="card-body text-secundary">
                         <!-- <h5 class="card-title">Primary card title</h5> -->
                          <a href="{{route('docenteCurso.index')}}"><p class="card-text"><h5>Carga de Notas Académicas y Asistencias de Alumnos por Asignatura</h5></p></a>
                        </div>
                </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="card border-primary mb-3" style="max-width: 18rem;">
                        <div class="card-header" style="background-color:#9C2932;color:#FBFBFB"><b>Consulta de Datos Historicos</b></div>
                        <div class="card-body text-secundary">
                         <!-- <h5 class="card-title">Primary card title</h5> -->
                          <a href="{{route('docenteCurso.all')}}"><p class="card-text"><h5>Carga de Notas Académicas y Asistencias de Alumnos por Asignatura</h5></p></a>
                        </div>
                </div>
            </div>
        </div>
</div>

@endsection
