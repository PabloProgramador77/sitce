@extends('welcome')
@section('contenido')
<div class="content-wrapper" style="min-height: 1302.13px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Calificaciones de alumno</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="{{url('/alumnos')}}">Alumnos</a></li>
                        <li class="breadcrumb-item"><a href="{{url('/alumnos/ver')}}/{{$calificaciones->idAlumno}}">Ver alumno</a></li>
                        <li class="breadcrumb-item active">Actualizar calificación</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="row p-2">
        <div class="col-md-8">
            <div class="card card-secondary">
                <div class="card-header">
                    <h3 class="card-title">Actualizar calificación de asignatura</h3>
                </div>
                <form role="form">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>{{$calificaciones->asignaturas->nombreAsignatura}}</label>
                            <input type="text" class="form-control" id="calificacion" name="calificacion" placeholder="Calificación" pattern="[0-9.]{1,3}" value="{{$calificaciones->calificacion}}">
                            <select class="custom-select" id="observaciones" name="observaciones">
                                <option value="{{$calificaciones->observaciones->id}}">{{$calificaciones->observaciones->descripcionObservacion}}</option>
                                @foreach ($observaciones as $observacion)
                                    @if ($observacion->descripcionObservacion!=$calificaciones->observaciones->descripcionObservacion)
                                        <option value="{{$observacion->id}}">{{$observacion->descripcionObservacion}}</option>    
                                    @endif
                                @endforeach
                            </select>
                            <select class="custom-select" id="estatus" name="estatus">
                                <option value="{{$calificaciones->estatusCalificacion}}">{{$calificaciones->estatusCalificacion}}</option>
                                @if ($calificaciones->estatusCalificacion=='Aprobada')
                                    <option value="No Aprobada">No Aprobada</option>
                                @else
                                    <option value="Aprobada">Aprobada</option>
                                @endif                                
                            </select>
                        </div>    
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-block" id="registrar"><b>Actualizar</b></button>
                    </div>
                    <input type="hidden" name="id" id="id" value="{{$calificaciones->id}}">
                    <input type="hidden" name="idAlumno" id="idAlumno" value="{{$calificaciones->idAlumno}}">
                    <input type="hidden" name="token" name="token" value="{{csrf_token()}}">
                </form>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-secondary">
                <div class="card-header">
                    <h3 class="card-title">Datos complementarios</h3>
                </div>
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" src="{{asset('img/avatarAlumno.png')}}" alt="User profile picture">
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
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="{{asset('js/sweetAlert.js')}}"></script>
<script src="{{asset('js/jquery-3.6.js')}}" type="text/javascript"></script>
<script src="{{asset('js/calificaciones/actualizar.js')}}" type="text/javascript"></script>
@endsection