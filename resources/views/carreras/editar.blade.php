@extends('welcome')
@section('contenido')
<div class="content-wrapper" style="min-height: 1302.13px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edición de carrera</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="{{url('/carreras')}}">Carreras</a></li>
                        <li class="breadcrumb-item active">Editar carrera</li>
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
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" placeholder="Nombre de la carrera" value="{{$carrera->nombreCarrera}}">
                        </div>
                        <div class="form-group">
                            <label for="id">*ID</label>
                            <input type="text" class="form-control" id="id" placeholder="ID de la carrera" value="{{$carrera->idCarrera}}">
                        </div>
                        <div class="form-group">
                            <label for="clave">Clave de Carrera</label>
                            <input type="text" class="form-control" id="clave" placeholder="Clave de la carrera" value="{{$carrera->claveCarrera}}">
                        </div>
                        <div class="form-group">
                            <label for="clavePlan">*Clave de Plan</label>
                            <input type="text" class="form-control" id="clavePlan" placeholder="Clave de la carrera" value="{{$carrera->clavePlan}}">
                        </div>
                        <div class="form-group">
                            <label for="rvoe">*RVOE</label>
                            <input type="text" class="form-control" id="rvoe" placeholder="RVOE" value="{{$carrera->rvoe}}">
                        </div>
                        <div class="form-group">
                            <label for="fechaRvoe">* Fecha de expedición de RVOE</label>
                            <input type="date" class="form-control datetimepicker-input" id="fechaRvoe" value="{{$carrera->fechaExpedicionRvoe}}"/>
                        </div>
                        <div class="form-group">
                            <label for="clave">* Tipo de periodo</label>
                            <select class="custom-select" id="periodo">
                                <option value="{{$carrera->periodo->id}}">{{$carrera->periodo->tipoPeriodo}}</option>
                                @foreach ($periodos as $periodo)
                                    @if ($carrera->periodo->tipoPeriodo!=$periodo->tipoPeriodo)
                                        <option value="{{$periodo->id}}">{{$periodo->tipoPeriodo}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nivelEstudios">* Nivel de estudios</label>
                            <select class="custom-select" id="nivelEstudios">
                                <option value="{{$carrera->nivelEstudio->id}}">{{$carrera->nivelEstudio->descripcionEstudio}}</option>
                                @foreach ($nivelEstudios as $nivel)
                                    @if ($carrera->nivelEstudio->descripcionEstudio!=$nivel->descripcionEstudio)
                                        <option value="{{$nivel->id}}">{{$nivel->descripcionEstudio}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="calificacionMinima">* Calificación mínima</label>
                            <select class="custom-select" id="calificacionMinima">
                                <option value="{{$carrera->calificacionMinima}}">{{$carrera->calificacionMinima}}</option>
                                @for($i=1; $i<=10; $i++)
                                    @if ($carrera->calificacionMinima!=$i)
                                        <option value="{{$i}}">{{$i}}</option>    
                                    @endif
                                @endfor
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="calificacionMaxima">* Calificación máxima</label>
                            <select class="custom-select" id="calificacionMaxima">
                            <option value="{{$carrera->calificacionMaxima}}">{{$carrera->calificacionMaxima}}</option>
                                @for($i=1; $i<=10; $i++)
                                    @if ($carrera->calificacionMaxima!=$i)
                                        <option value="{{$i}}">{{$i}}</option>    
                                    @endif
                                @endfor
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="calificacionAprobatoria">* Calificación mínima aprobatoria</label>
                            <select class="custom-select" id="calificacionAprobatoria">
                                <option value="{{$carrera->calificacionMinimaAprobatoria}}">{{$carrera->calificacionMinimaAprobatoria}}</option>
                                @for($i=1; $i<=10; $i++)
                                    @if ($carrera->calificacionMinimaAprobatoria!=$i)
                                        <option value="{{$i}}">{{$i}}</option>    
                                    @endif
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-block" id="registrar"><b>Actualizar</b></button>
                    </div>
                    <input type="hidden" name="idCarrera" id="idCarrera" value="{{$carrera->id}}">
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
                    <h3 class="profile-username text-center">Información de carrera</h3>
                    <p class="text-muted text-center">{{session()->get('nombreInstitucion')}}</p>
                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Nombre</b><a class="float-right" id="nombreCarrera">{{$carrera->nombreCarrera}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>ID Carrera</b><a class="float-right" id="carreraId">{{$carrera->idCarrera}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Clave de Carrera</b><a class="float-right" id="claveCarrera">{{$carrera->claveCarrera}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Clave de Plan</b><a class="float-right" id="planClave">{{$carrera->clavePlan}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Tipo de Periodo</b><a class="float-right" id="tipoPeriodo">{{$carrera->periodo->tipoPeriodo}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Nivel de estudios</b><a class="float-right" id="nivelEstudio">{{$carrera->nivelEstudio->descripcionEstudio}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>RVOE</b><a class="float-right" id="numeroRvoe">{{$carrera->rvoe}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Fecha de expedición</b><a class="float-right" id="rvoeFecha">{{$carrera->fechaExpedicionRvoe}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Calificación mínima</b><a class="float-right" id="califMinima">{{$carrera->calificacionMinima}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Calificación máxima</b><a class="float-right" id="califMaxima">{{$carrera->calificacionMaxima}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Calificación mínima aprobatoria</b><a class="float-right" id="califAprobatoria">{{$carrera->calificacionMinimaAprobatoria}}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('js/sweetAlert.js')}}" type="text/javascript"></script>
<script src="{{asset('js/jquery-3.6.js')}}" type="text/javascript"></script>
<script src="{{asset('js/carrera/actualizar.js')}}" type="text/javascript"></script>
<script src="{{asset('js/carrera/verificarClave.js')}}" type="text/javascript"></script>
<script src="{{asset('js/carrera/verificarId.js')}}" type="text/javascript"></script>
<script src="{{asset('js/carrera/vistaPrevia.js')}}" type="text/javascript"></script>
<script src="{{asset('js/carrera/activarActualizacion.js')}}" type="text/javascript"></script>
<script src="{{asset('js/carrera/verificarRvoe.js')}}" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#registrar").attr('disabled', true);
    });
</script>
@endsection