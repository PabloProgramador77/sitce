@extends('welcome')
@section('contenido')
<div class="content-wrapper" style="min-height: 1302.13px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Registro de carrera(s)</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="{{url('/carreras')}}">Carreras</a></li>
                        <li class="breadcrumb-item active">Nueva Carrera</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="row p-2">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title col-md-10">Campos con simbolo * son obligatorios</h3>
                </div>
                <form role="form">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" placeholder="Nombre de la carrera">
                        </div>
                        <div class="form-group">
                            <label for="id">*ID</label>
                            <input type="text" class="form-control" id="id" placeholder="ID de la carrera">
                        </div>
                        <div class="form-group">
                            <label for="clave">Clave de Carrera</label>
                            <input type="text" class="form-control" id="clave" placeholder="Clave de la carrera">
                        </div>
                        <div class="form-group">
                            <label for="clavePlan">*Clave de Plan</label>
                            <input type="text" class="form-control" id="clavePlan" placeholder="Clave de la carrera">
                        </div>
                        <div class="form-group">
                            <label for="rvoe">*RVOE</label>
                            <input type="text" class="form-control" id="rvoe" placeholder="RVOE">
                        </div>
                        <div class="form-group">
                            <label for="fechaRvoe">* Fecha de expedición de RVOE</label>
                            <input type="date" class="form-control datetimepicker-input" id="fechaRvoe"/>
                        </div>
                        <div class="form-group">
                            <label for="clave">* Tipo de periodo</label>
                            <select class="custom-select" id="periodo">
                                <option value="default">--Elige el tipo de periodo--</option>
                                @foreach ($periodos as $periodo)
                                    <option value="{{$periodo->id}}">{{$periodo->tipoPeriodo}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nivelEstudios">* Nivel de estudios</label>
                            <select class="custom-select" id="nivelEstudios">
                                <option value="default">--Elige el nivel de estudios--</option>
                                @foreach ($nivelEstudios as $nivel)
                                    <option value="{{$nivel->id}}">{{$nivel->descripcionEstudio}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="calificacionMinima">* Calificación mínima</label>
                            <select class="custom-select" id="calificacionMinima">
                                <option value="default">--Elige la calificación mínima--</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="calificacionMaxima">* Calificación máxima</label>
                            <select class="custom-select" id="calificacionMaxima">
                                <option value="default">--Elige la calificación máxima--</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="calificacionAprobatoria">* Calificación mínima aprobatoria</label>
                            <select class="custom-select" id="calificacionAprobatoria">
                                <option value="default">--Elige la calificación mínima aprobatoria--</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-block" id="registrar"><b>Registrar</b></button>
                    </div>
                    <input type="hidden" name="token" id="token" value="{{csrf_token()}}">
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="{{asset('js/sweetAlert.js')}}"></script>
<script src="{{asset('js/jquery-3.6.js')}}" type="text/javascript"></script>
<script src="{{asset('js/carrera/registrar.js')}}" type="text/javascript"$()></script>   
<script src="{{asset('js/carrera/verificarId.js')}}" type="text/javascript"></script>
<script src="{{asset('js/carrera/verificarClave.js')}}" type="text/javascript"></script>
<script src="{{asset('js/carrera/verificarRvoe.js')}}" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#registrar").attr('disabled', true);
    });
</script> 
@endsection