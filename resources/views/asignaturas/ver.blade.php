@extends('welcome')
@section('contenido')
<div class="content-wrapper" style="min-height: 1302.13px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Datos de asignatura</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="{{url('/asignaturas')}}">Asignaturas</a></li>
                        <li class="breadcrumb-item active">Datos de asignatura</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="row p-2">
        <div class="col-md-8">
            <div class="card card-secondary">
                <div class="card-header">
                    <h3 class="card-title">Alumnos inscritos en la asignatura</h3>
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
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-secondary">
                <div class="card-header">
                    <h3 class="card-title">Datos generales</h3>
                </div>
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" src="{{asset('img/avatarEscuela.png')}}" alt="User profile picture">
                    </div>
                    <h3 class="profile-username text-center">Información de asignatura</h3>
                    <p class="text-muted text-center">{{session()->get('nombreInstitucion')}}</p>
                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>ID de asignatura</b><a class="float-right" id="asignaturaId">{{$asignatura->idAsignatura}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Nombre</b><a class="float-right" id="nombreAsignatura">{{$asignatura->nombreAsignatura}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Clave</b><a class="float-right" id="claveAsignatura">{{$asignatura->claveAsignatura}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Ciclo</b><a class="float-right" id="cicloAsignatura">{{$asignatura->ciclo}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Tipo de asignatura</b><a class="float-right" id="asignaturaTipo">{{$asignatura->tipoAsignatura->tipoAsignatura}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Creditos</b><a class="float-right" id="creditosAsignatura">{{$asignatura->creditos}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Última modificación</b><a class="float-right">{{$asignatura->updated_at}}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection