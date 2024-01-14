@extends('welcome')
@section('contenido')
<div class="content-wrapper" style="min-height: 1302.13px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Resúmen de alumno</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="{{url('/alumnos')}}">Alumnos</a></li>
                        <li class="breadcrumb-item active">Datos de alumno</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="row p-2">
        <div class="col-md-8">
            <div class="card card-secondary">
                <div class="card-header">
                    <h3 class="card-title">Archivos del alumno</h3>
                </div>
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Matricula</th>
                                <th>Nombre</th>
                                <th>Primer Apellido</th>
                                <th>Segundo Apellido</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>000022</td>
                                <td>Juan Pablo</td>
                                <td>Sanchez</td>
                                <td>Aguilar</td>
                                <td>
                                    <a href="{{url('/alumnos/ver')}}" type="button" class="btn btn-primary" title="Información de alumno">
                                        <i class="fa-solid fa-circle-info"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-header">
                    <h3 class="card-title">Calificaciones del alumno</h3>
                </div>
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Clave</th>
                                <th>Asignatura</th>
                                <th>Calificación</th>
                                <th>Observación</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($asignaturas as $asignatura)
                                <tr>
                                    <td>{{$asignatura->claveAsignatura}}</td>
                                    <td>{{$asignatura->nombreAsignatura}}</td>
                                    <td>{{$asignatura->calificacion}}</td>
                                    <td>{{$asignatura->descripcionObservacion}}</td>
                                    <td>
                                        <a href="{{url('/calificaciones/editar')}}/{{$asignatura->id}}" type="button" class="btn btn-primary" title="Editar calificación">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-secondary">
                <div class="card-header">
                    <h3 class="card-title">Datos generales</h3>
                </div>
                <div class="card-body box-profile">
                    <div class="text-center">
                        @if ($alumno->fotografia!="avatarAlumno.png")
                            <img class="profile-user-img img-fluid img-circle" src="{{asset('img/alumnos')}}/{{$alumno->fotografia}}" alt="Fotografía alumno">    
                        @else
                            <img class="profile-user-img img-fluid img-circle" src="{{asset('img/alumnos/avatarAlumno.png')}}" alt="Fotografía alumno">
                        @endif
                    </div>
                    <h3 class="profile-username text-center">Información de alumno</h3>
                    <p class="text-muted text-center">{{session()->get('nombreInstitucion')}}</p>
                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Número de control</b><a class="float-right" id="numeroControlAlumno">{{$alumno->numeroControl}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Nombre</b><a class="float-right" id="nombreAlumno">{{$alumno->nombre}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Primer apellido</b><a class="float-right" id="primerApellido">{{$alumno->primerApellido}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Segundo apellido</b><a class="float-right" id="segundoApellido">{{$alumno->segundoApellido}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>CURP</b><a class="float-right" id="curpAlumno">{{$alumno->curp}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Genero</b><a class="float-right" id="generoAlumno">{{$alumno->genero->nombreGenero}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Fecha de nacimiento</b><a class="float-right" id="fechaNacimientoAlumno">{{$alumno->fechaNacimiento}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Carrera</b><a class="float-right" id="carreraAlumno">{{$alumno->carrera->nombreCarrera}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Total de creditos</b><a class="float-right"></a>
                        </li>
                        <li class="list-group-item">
                            <b>Creditos obtenidos</b><a class="float-right"></a>
                        </li>
                        <li class="list-group-item">
                            <b>Total de asignaturas</b><a class="float-right">{{count($asignaturas)}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Promedio</b><a class="float-right"></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection