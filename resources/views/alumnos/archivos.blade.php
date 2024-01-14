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
                        <li class="breadcrumb-item active">Imagenes de alumno</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="row p-2">
        <div class="col-md-8">
            <div class="card card-secondary">
                <div class="card-header">
                    <h3 class="card-title">Carga de imagenes</h3>
                </div>
                <form role="form" action="{{url('/alumnos/actualizarImagenes', ['id'=>$alumno->id])}}" method="POST" novalidate enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="fotografia">Fotografía de alumno</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="fotografia" name="fotografia" value="{{url('img/alumnos')}}/{{$alumno->fotografia}}">
                                    <label class="custom-file-label" for="archivoCer">{{$alumno->fotografia}}</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="firma">Firma autografa</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="firma" name="firma" value="{{url('img/alumnos')}}/{{$alumno->firmaAutografa}}">
                                    <label class="custom-file-label" for="archivoKey">{{$alumno->firmaAutografa}}</label>
                                </div>
                            </div>
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
<script src="{{asset('js/alumno/activarImagenes.js')}}" type="text/javascript"></script>
<script>
    $(document).ready(function(){
        $("#registrar").attr('disabled', true);
    })
</script>
@endsection