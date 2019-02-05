@extends('layouts.principal')
@section('titulo','Sys-Gestion')
@section('cuerpo')
<div>
    <center>
<img src="{{asset('image/logo.png')}}" alt="Logo" height="120" margin-bottom: 100px>
    </center>
</div>

<div class="content">
         <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-md-4">
                    <div class="card mb-4 bg-default text-white" style="background-color:#7B0A22;">
                        <div class="card-body text-center">
                          <h5 class="card-title">Gestion de Calificaciones</h5>
                          <p class="card-text"></p>
                          <a href="{{route('docenteCurso.index')}}"><img src="{{ asset('image/calificaciones.jpeg')}}"alt="" height="200"></a>
                        </div>
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
