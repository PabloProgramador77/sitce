@extends('welcome')
@section('contenido')
<div class="content-wrapper" style="min-height: 1302.13px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Eliminar archivo</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="{{url('/archivos')}}">Archivos</a></li>
                        <li class="breadcrumb-item active">Eliminar archivo</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="row p-2">
        <div class="col-md-8">
            <div class="card card-secondary">
                <div class="card-header">
                    <h3 class="card-title">Los datos no podrán ser recuperados, confirma los datos</h3>
                </div>
                <form role="form">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nombre">* Folio</label>
                            <input type="text" class="form-control" id="nombre" placeholder="Nombre(s)" readonly="true">
                        </div>
                        <div class="form-group">
                            <label for="apellido">* Matricula</label>
                            <input type="text" class="form-control" id="apellido" placeholder="Clave de archivo" readonly="true">
                        </div>
                        <div class="form-group">
                            <label for="apellido2">* Fecha de expedición</label>
                            <input type="text" class="form-control" id="apellido2" placeholder="Ciclo de archivo" readonly="true">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-block"><b>Confirmar y eliminar</b></button>
                    </div>
                </form>
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
                    <h3 class="profile-username text-center">Información de archivo</h3>
                    <p class="text-muted text-center">Colegio de San Francisco</p>
                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Folio</b><a class="float-right">Juan Pablo</a>
                        </li>
                        <li class="list-group-item">
                            <b>Matricula</b><a class="float-right">Sanchez</a>
                        </li>
                        <li class="list-group-item">
                            <b>Fecha de expedición</b><a class="float-right">Aguilar</a>
                        </li>
                        <li class="list-group-item">
                            <b>Fecha de creación</b><a class="float-right">SAAJ910326HGTGN01</a>
                        </li>
                        <li class="list-group-item">
                            <b>Fecha de modificación</b><a class="float-right">Masculino</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection