@extends('welcome')
@section('contenido')
<div class="content-wrapper" style="min-height: 1302.13px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Datos de responsable</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="{{url('/responsables')}}">Responsables</a></li>
                        <li class="breadcrumb-item active">Datos de responsable</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="row p-2">
        <div class="col-md-8">
            <div class="card card-secondary">
                <div class="card-header">
                    <h3 class="card-title">Archivos firmados por el responsable</h3>
                </div>
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Folio</th>
                                <th>Matricula</th>
                                <th>Fecha de expedición</th>
                                <th>Fecha de creación</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>000022</td>
                                <td>123456</td>
                                <td>2022-06-26 19:30:14</td>
                                <td>2022-06-27 03:54:26</td>
                                <td>
                                    <a href="{{url('/archivos/ver')}}" type="button" class="btn btn-primary" title="Información de archivo">
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
                    <h3 class="profile-username text-center">Información de responsable</h3>
                    <p class="text-muted text-center">{{session()->get('nombreInstitucion')}}</p>
                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Nombre</b><a class="float-right" id="nombreResponsable">{{$responsable->nombre}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Primer apellido</b><a class="float-right" id="apellidoResponsable">{{$responsable->primerApellido}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Segundo apellido</b><a class="float-right" id="apellido2Responsable">{{$responsable->segundoApellido}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>CURP</b><a class="float-right" id="curpResponsable">{{$responsable->curp}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Cargo</b><a class="float-right" id="cargoResponsable">{{$responsable->cargo->descripcionCargo}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Clave pública</b><a class="float-right">{{$responsable->archivoCer}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Clave privada</b><a class="float-right">{{$responsable->archivoKey}}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection