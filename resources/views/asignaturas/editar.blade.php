@extends('welcome')
@section('contenido')
<div class="content-wrapper" style="min-height: 1302.13px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edición de asignatura</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="{{url('/asignaturas')}}">Asignaturas</a></li>
                        <li class="breadcrumb-item active">Editar asignatura</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="row p-2">
        <div class="col-md-8">
            <div class="card card-secondary">
                <div class="card-header">
                    <h3 class="card-title">Edición de datos generales</h3>
                </div>
                <form role="form">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="idAsignatura">* ID</label>
                            <input type="text" class="form-control" id="idAsignatura" placeholder="ID de asignatura" value="{{$asignatura->idAsignatura}}">
                        </div>
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" placeholder="Nombre de asignatura" value="{{$asignatura->nombreAsignatura}}">
                        </div>
                        <div class="form-group">
                            <label for="clave">Clave</label>
                            <input type="text" class="form-control" id="clave" placeholder="Clave de asignatura" value="{{$asignatura->claveAsignatura}}">
                        </div>
                        <div class="form-group">
                            <label for="ciclo">* Ciclo</label>
                            <input type="text" class="form-control" id="ciclo" placeholder="Ciclo de asignatura" value="{{$asignatura->ciclo}}">
                        </div>
                        <div class="form-group">
                            <label for="creditos">* Creditos</label>
                            <input type="text" class="form-control" id="creditos" placeholder="Creditos de asignatura" value="{{$asignatura->creditos}}">
                        </div>
                        <div class="form-group">
                            <label>* Tipo de asignatura</label>
                            <select class="custom-select" id="tipoAsignatura">
                                <option value="{{$asignatura->tipoAsignatura->id}}">{{$asignatura->tipoAsignatura->tipoAsignatura}}</option>
                                @foreach ($tipoAsignatura as $tipo)
                                    @if ($tipo->tipoAsignatura!=$asignatura->tipoAsignatura->tipoAsignatura)
                                        <option value="{{$tipo->id}}">{{$tipo->tipoAsignatura}}</option>    
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>* Plan de estudio</label>
                            <select class="custom-select" id="carrera">
                                <option value="{{$asignatura->carrera->id}}">{{$asignatura->carrera->nombreCarrera}}</option>
                                @foreach ($carreras as $carrera)
                                    @if ($carrera->nombreCarrera!=$asignatura->carrera->nombreCarrera)
                                        <option value="{{$carrera->id}}">{{$carrera->nombreCarrera}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-block" id="registrar"><b>Actualizar</b></button>
                    </div>
                    <input type="hidden" name="id" id="id" value="{{$asignatura->id}}">
                    <input type="hidden" name="token" id="token" value="{{csrf_token()}}">
                </form>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-secondary">
                <div class="card-header">
                    <h3 class="card-title">Vista previa</h3>
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
<script src="{{asset('js/asignatura/verificarId.js')}}" type="text/javascript"></script>
<script src="{{asset('js/asignatura/verificarClave.js')}}" type="text/javascript"></script>
<script src="{{asset('js/asignatura/actualizar.js')}}" type="text/javascript"></script>
<script src="{{asset('js/asignatura/vistaPrevia.js')}}" type="text/javascript"></script>
<script src="{{asset('js/asignatura/activarActualizacion.js')}}" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#registrar").attr('disabled', true);
    });
</script>
@endsection