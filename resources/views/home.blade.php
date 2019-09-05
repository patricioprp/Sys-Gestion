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

                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="card border-primary mb-3" style="max-width: 18rem;">
                        <div class="card-header" style="background-color:#1DA6E1;color:#FBFBFB"><b>Carga de Datos</b></div>
                        <div class="card-body text-secundary">
                         <!-- <h5 class="card-title">Primary card title</h5> -->
                          <a href="{{route('docenteCurso.index')}}"><p class="card-text"><h5>Carga de Notas Académicas y Asistencias de Alumnos por Asignatura</h5></p></a>
                        </div>
                </div>
             <!--    <div class="col-sm-12 col-md-4">
                    <div class="card mb-4 bg-default text-white" style="background-color:#7B0A22;">
                        <div class="card-body text-center">
                          <h5 class="card-title">Gestion de Docentes</h5>
                          <p class="card-text"></p>
                          <a href=""><img src="{ asset('image/docentes.png')}}"alt="" width="300" height="200"></a>
                        </div>
                     </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="card mb-4 bg-default text-white" style="background-color:#7B0A22;">
                        <div class="card-body text-center">
                          <h5 class="card-title">Gestion de Alumnos</h5>
                          <p class="card-text"></p>
                          <a href=""><img src="{ asset('image/alumnos.jpeg')}}"alt="" height="200"></a>
                        </div>
                     </div>
                </div>  -->
            </div>
        </div>
</div>

@endsection
