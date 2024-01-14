@extends('welcome')
@section('contenido')
<div class="content-wrapper" style="min-height: 1302.13px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Registro de asignatura(s)</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="{{url('/asignaturas')}}">Asignaturas</a></li>
                        <li class="breadcrumb-item active">Nueva asignatura</li>
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
                            <label for="idAsignatura">* ID</label>
                            <input type="text" class="form-control" id="idAsignatura" placeholder="Ciclo de asignatura" required>
                        </div>
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" placeholder="Nombre(s)" >
                        </div>
                        <div class="form-group">
                            <label for="clave">Clave</label>
                            <input type="text" class="form-control" id="clave" placeholder="Clave de asignatura" >
                        </div>
                        <div class="form-group">
                            <label for="creditos">* Creditos</label>
                            <input type="text" class="form-control" id="creditos" placeholder="Ciclo de asignatura" required>
                        </div>
                        <div class="form-group">
                            <label>* Tipo de asignatura</label>
                            <select class="custom-select" id="tipoAsignatura" required>
                                <option value="default">--Elige el tipo de asignatura--</option>
                                @foreach ($tipoAsignatura as $tipo)
                                    <option value="{{$tipo->id}}">{{$tipo->tipoAsignatura}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>* Plan de estudio</label>
                            <select class="custom-select" id="carrera" required>
                                <option value="default">--Elige el plan de estudio--</option>
                                @foreach ($carreras as $carrera)
                                    <option value="{{$carrera->id}}">{{$carrera->nombreCarrera}}</option>
                                @endforeach
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
<script src="{{asset('js/asignatura/registrar.js')}}" type="text/javascript"></script>
<!--<script src="{{asset('js/asignatura/verificarId.js')}}" type="text/javascript"></script>
<script src="{{asset('js/asignatura/verificarClave.js')}}" type="text/javascript"></script>-->
@endsection