@extends('welcome')
@section('contenido')
<div class="content-wrapper" style="min-height: 1302.13px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edición de alumno</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="{{url('/alumnos')}}">Alumnos</a></li>
                        <li class="breadcrumb-item active">Editar alumno</li>
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
                            <label for="numeroControl">*Número de control</label>
                            <input type="text" class="form-control" id="numeroControl" placeholder="Número de control / Matricula" value="{{$alumno->numeroControl}}">
                        </div>
                        <div class="form-group">
                            <label for="nombre">*Nombre</label>
                            <input type="text" class="form-control" id="nombre" placeholder="Nombre(s)" value="{{$alumno->nombre}}">
                        </div>
                        <div class="form-group">
                            <label for="apellido">* Primer apellido</label>
                            <input type="text" class="form-control" id="apellido" placeholder="Apellido paterno del alumno" value="{{$alumno->primerApellido}}">
                        </div>
                        <div class="form-group">
                            <label for="apellido2">Segundo apellido</label>
                            <input type="text" class="form-control" id="apellido2" placeholder="Apellido materno del alumno" value="{{$alumno->segundoApellido}}">
                        </div>
                        <div class="form-group">
                            <label for="curp">* CURP</label>
                            <input type="text" class="form-control" id="curp" placeholder="CURP del alumno" value="{{$alumno->curp}}">
                        </div>
                        <div class="form-group">
                            <label for="genero">* Genero</label>
                            <select class="custom-select" id="genero">
                                <option value="{{$alumno->genero->id}}">{{$alumno->genero->nombreGenero}}</option>
                                @foreach ($generos as $genero)
                                    @if ($genero->nombreGenero!=$alumno->genero->nombreGenero)
                                        <option value="{{$genero->id}}">{{$genero->nombreGenero}}</option>    
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nacimiento">* Fecha de nacimiento</label>
                            <input type="date" class="form-control datetimepicker-input" id="nacimiento" value="{{$alumno->fechaNacimiento}}"/>
                        </div>
                        <div class="form-group">
                            <label for="carrera">* Carrera</label>
                            <select class="custom-select" id="carrera">
                                <option value="{{$alumno->carrera->id}}">{{$alumno->carrera->nombreCarrera}}</option>
                                @foreach ($carreras as $carrera)
                                    @if ($carrera->nombreCarrera!=$alumno->carrera->nombreCarrera)
                                        <option value="{{$carrera->id}}">{{$carrera->nombreCarrera}}</option>    
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-block" id="registrar"><b>Actualizar</b></button>
                    </div>
                    <input type="hidden" name="id" id="id" value="{{$alumno->id}}">
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
                        @if ($alumno->fotografia!="avatarAlumno.png")
                            <img class="profile-user-img img-fluid img-circle" src="{{asset('img/alumnos')}}/{{$alumno->fotografia}}" alt="Fotografía alumno">    
                        @else
                            <img class="profile-user-img img-fluid img-circle" src="{{asset('img/alumnos/avatarAlumno.png')}}" alt="Fotografía alumno">
                        @endif
                    </div>
                    <h3 class="profile-username text-center">Información de alumno</h3>
                    <p class="text-muted text-center">{{session()->get('nombreInstitucion')}}</p>
                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Número de control</b><a class="float-right" id="numeroControlAlumno">{{$alumno->numeroControl}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Nombre</b><a class="float-right" id="nombreAlumno">{{$alumno->nombre}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Primer apellido</b><a class="float-right" id="primerApellido">{{$alumno->primerApellido}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Segundo apellido</b><a class="float-right" id="segundoApellido">{{$alumno->segundoApellido}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>CURP</b><a class="float-right" id="curpAlumno">{{$alumno->curp}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Genero</b><a class="float-right" id="generoAlumno">{{$alumno->genero->nombreGenero}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Fecha de nacimiento</b><a class="float-right" id="fechaNacimientoAlumno">{{$alumno->fechaNacimiento}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Carrera</b><a class="float-right" id="carreraAlumno">{{$alumno->carrera->nombreCarrera}}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="{{asset('js/sweetAlert.js')}}"></script>
<script src="{{asset('js/jquery-3.6.js')}}" type="text/javascript"></script>
<script src="{{asset('js/alumno/actualizar.js')}}" type="text/javascript"></script>
<script src="{{asset('js/alumno/vistaPrevia.js')}}" type="text/javascript"></script>
<script src="{{asset('js/alumno/verificarNumeroControl.js')}}" type="text/javascript"></script>
<script src="{{asset('js/alumno/verificarCurp.js')}}" type="text/javascript"></script>
<script src="{{asset('js/alumno/activarActualizacion.js')}}" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#registrar").attr('disabled', true);
    });
</script>
@endsection