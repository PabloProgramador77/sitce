@extends('welcome')
@section('contenido')
<div class="content-wrapper" style="min-height: 1302.13px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Eliminar carrera</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="{{url('/carreras')}}">Carreras</a></li>
                        <li class="breadcrumb-item active">Eliminar carrera</li>
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
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" value="{{$carrera->nombreCarrera}}" readonly="true">
                        </div>
                        <div class="form-group">
                            <label for="id">*ID</label>
                            <input type="text" class="form-control" id="id" value="{{$carrera->idCarrera}}" readonly="true">
                        </div>
                        <div class="form-group">
                            <label for="clave">Clave de Carrera</label>
                            <input type="text" class="form-control" id="clave" value="{{$carrera->claveCarrera}}" readonly="true">
                        </div>
                        <div class="form-group">
                            <label for="clavePlan">*Clave de Plan</label>
                            <input type="text" class="form-control" id="clavePlan" value="{{$carrera->clavePlan}}" readonly="true">
                        </div>
                        <div class="form-group">
                            <label for="rvoe">*RVOE</label>
                            <input type="text" class="form-control" id="rvoe" placeholder="RVOE" value="{{$carrera->rvoe}}" readonly="true">
                        </div>
                        <div class="form-group">
                            <label for="fechaRvoe">* Fecha de expedición de RVOE</label>
                            <input type="date" class="form-control datetimepicker-input" id="fechaRvoe" value="{{$carrera->fechaRvoe}}" readonly="true"/>
                        </div>
                        <div class="form-group">
                            <label for="clave">* Tipo de periodo</label>
                            <select class="custom-select" id="periodo" readonly="true">
                                <option value="{{$carrera->periodo->id}}">{{$carrera->periodo->tipoPeriodo}}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nivelEstudios">* Nivel de estudios</label>
                            <select class="custom-select" id="nivelEstudios" readonly="true">
                                <option value="{{$carrera->nivelEstudio->id}}">{{$carrera->nivelEstudio->descripcionEstudio}}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="calificacionMinima">* Calificación mínima</label>
                            <select class="custom-select" id="calificacionMinima" readonly="true">
                                <option value="{{$carrera->calificacionMinima}}">{{$carrera->calificacionMinima}}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="calificacionMaxima">* Calificación máxima</label>
                            <select class="custom-select" id="calificacionMaxima" readonly="true">
                            <option value="{{$carrera->calificacionMaxima}}">{{$carrera->calificacionMaxima}}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="calificacionAprobatoria">* Calificación mínima aprobatoria</label>
                            <select class="custom-select" id="calificacionAprobatoria" readonly="true">
                                <option value="{{$carrera->calificacionMinimaAprobatoria}}">{{$carrera->calificacionMinimaAprobatoria}}</option>
                            </select>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-block" id="eliminar"><b>Confirmar y eliminar</b></button>
                    </div>
                    <input type="hidden" name="idCarrera" id="idCarrera" value="{{$carrera->id}}">
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
                    <h3 class="profile-username text-center">Información de carrera</h3>
                    <p class="text-muted text-center">{{session()->get('nombreInstitucion')}}</p>
                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Nombre</b><a class="float-right">{{$carrera->nombreCarrera}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>ID Carrera</b><a class="float-right">{{$carrera->idCarrera}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Clave de Carrera</b><a class="float-right">{{$carrera->claveCarrera}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Clave de Plan</b><a class="float-right">{{$carrera->clavePlan}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Tipo de Periodo</b><a class="float-right">{{$carrera->periodo->tipoPeriodo}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Nivel de estudios</b><a class="float-right">{{$carrera->nivelEstudio->descripcionEstudio}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>RVOE</b><a class="float-right" id="numeroRvoe">{{$carrera->rvoe}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Fecha de expedición</b><a class="float-right" id="rvoeFecha">{{$carrera->fechaExpedicionRvoe}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Calificación mínima</b><a class="float-right">{{$carrera->calificacionMinima}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Calificación máxima</b><a class="float-right">{{$carrera->calificacionMaxima}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Calificación mínima aprobatoria</b><a class="float-right">{{$carrera->calificacionMinimaAprobatoria}}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="{{asset('js/sweetAlert.js')}}"></script>
<script src="{{asset('js/jquery-3.6.js')}}" type="text/javascript"></script>
<script src="{{asset('js/carrera/eliminar.js')}}" type="text/javascript"></script>
@endsection