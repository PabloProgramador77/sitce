@extends('welcome')
@section('contenido')
<div class="content-wrapper" style="min-height: 1302.13px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Eliminar asignatura</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="{{url('/asignaturas')}}">Asignaturas</a></li>
                        <li class="breadcrumb-item active">Eliminar asignatura</li>
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
                            <label for="idAsignatura">* ID</label>
                            <input type="text" class="form-control" id="idAsignatura" readonly="true" value="{{$asignatura->idAsignatura}}">
                        </div>
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" readonly="true" value="{{$asignatura->nombreAsignatura}}">
                        </div>
                        <div class="form-group">
                            <label for="clave">Clave</label>
                            <input type="text" class="form-control" id="clave" readonly="true" value="{{$asignatura->claveAsignatura}}">
                        </div>
                        <div class="form-group">
                            <label for="ciclo">* Ciclo</label>
                            <input type="text" class="form-control" id="ciclo" readonly="true" value="{{$asignatura->ciclo}}">
                        </div>
                        <div class="form-group">
                            <label for="creditos">* Creditos</label>
                            <input type="text" class="form-control" id="creditos" readonly="true" value="{{$asignatura->creditos}}">
                        </div>
                        <div class="form-group">
                            <label>* Tipo de asignatura</label>
                            <select class="custom-select" id="tipoAsignatura" readonly="true">
                                <option value="{{$asignatura->tipoAsignatura->id}}">{{$asignatura->tipoAsignatura->tipoAsignatura}}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>* Plan de estudio</label>
                            <select class="custom-select" id="carrera" readonly="true">
                                <option value="{{$asignatura->carrera->id}}">{{$asignatura->carrera->nombreCarrera}}</option>
                            </select>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-block" id="eliminar"><b>Confirmar y eliminar</b></button>
                    </div>
                    <input type="hidden" name="id" id="id" value="{{$asignatura->id}}">
                    <input type="hidden" name="token" id="token" value="{{csrf_token()}}">
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
<script type="text/javascript" src="{{asset('js/sweetAlert.js')}}"></script>
<script src="{{asset('js/jquery-3.6.js')}}" type="text/javascript"></script>
<script src="{{asset('js/asignatura/eliminar.js')}}" type="text/javascript"></script>
@endsection