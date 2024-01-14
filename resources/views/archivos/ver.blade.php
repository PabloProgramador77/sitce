@extends('welcome')
@section('contenido')
<div class="content-wrapper" style="min-height: 1302.13px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Datos de archivo</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="{{url('/archivos')}}">Archivos</a></li>
                        <li class="breadcrumb-item active">Datos de archivo</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="row p-2">
        <div class="col-md-8">
            <div class="card card-secondary">
                <div class="card-header">
                    <h3 class="card-title">Alumno del archivo</h3>
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
                                    <a href="{{url('/archivos/ver')}}" type="button" class="btn btn-primary" title="Información de archivo">
                                        <i class="fa-solid fa-circle-info"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-header">
                    <h3 class="card-title">Carrera(s) del archivo</h3>
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
                                    <a href="{{url('/archivos/ver')}}" type="button" class="btn btn-primary" title="Información de archivo">
                                        <i class="fa-solid fa-circle-info"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-header">
                    <h3 class="card-title">Asignaturas del archivo</h3>
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
                                    <a href="{{url('/archivos/ver')}}" type="button" class="btn btn-primary" title="Información de archivo">
                                        <i class="fa-solid fa-circle-info"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-header">
                    <h3 class="card-title">Responsable(s) del archivo</h3>
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