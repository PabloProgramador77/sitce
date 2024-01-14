@extends('welcome')
@section('contenido')
<div class="content-wrapper" style="min-height: 1302.13px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Registro de alumno(s)</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="{{url('/alumnos')}}">Alumnos</a></li>
                        <li class="breadcrumb-item active">Nuevo alumno</li>
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
                <form role="form" id="formulario" novalidate>
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="numeroControl">*Número de control</label>
                            <input type="text" class="form-control" id="numeroControl" placeholder="Número de control / Matricula">
                        </div>
                        <div class="form-group">
                            <label for="nombre">*Nombre</label>
                            <input type="text" class="form-control" id="nombre" placeholder="Nombre(s)">
                        </div>
                        <div class="form-group">
                            <label for="apellido">* Primer apellido</label>
                            <input type="text" class="form-control" id="apellido" placeholder="Apellido paterno del alumno">
                        </div>
                        <div class="form-group">
                            <label for="apellido2">Segundo apellido</label>
                            <input type="text" class="form-control" id="apellido2" placeholder="Apellido materno del alumno">
                        </div>
                        <div class="form-group">
                            <label for="curp">* CURP</label>
                            <input type="text" class="form-control" id="curp" placeholder="CURP del alumno" required pattern="[A-Z0-9]{18,18}">
                        </div>
                        <div class="form-group">
                            <label for="genero">* Genero</label>
                            <select class="custom-select" id="genero">
                                <option value="default">--Elige el genero del alumno--</option>
                                @foreach ($generos as $genero)
                                    <option value="{{$genero->id}}">{{$genero->nombreGenero}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nacimiento">* Fecha de nacimiento</label>
                            <input type="date" class="form-control datetimepicker-input" id="nacimiento"/>
                        </div>
                        <div class="form-group">
                            <label for="carrera">* Carrera</label>
                            <select class="custom-select" id="carrera">
                                <option value="default">--Elige la carrera del alumno--</option>
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
<!--<script src="{{asset('js/jquery.validate.min.js')}}" type="text/javascript"></script>-->
<script src="{{asset('js/alumno/registrar.js')}}" type="text/javascript"></script>
<script src="{{asset('js/alumno/verificarNumeroControl.js')}}" type="text/javascript"></script>
<script src="{{asset('js/alumno/verificarCurp.js')}}" type="text/javascript"></script>
<!--<script src="{{asset('js/alumno/validarCurp.js')}}" type="text/javascript"></script>-->
<script type="text/javascript">
    $(document).ready(function(){
        $("#registrar").attr('disabled', true);
    });
</script>
@endsection