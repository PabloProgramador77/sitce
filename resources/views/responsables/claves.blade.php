@extends('welcome')
@section('contenido')
<div class="content-wrapper" style="min-height: 1302.13px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edición de responsable</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="{{url('/responsables')}}">Responsables</a></li>
                        <li class="breadcrumb-item active">Editar responsable</li>
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
                <form role="form" action="{{url('/responsables/actualizarClaves', ['id'=>$responsable->id])}}" method="POST" novalidate enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="cer">* Clave pública (.CER)</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="archivoCer" name="archivoCer" value="{{url('archivos')}}/{{$responsable->archivoCer}}">
                                    <label class="custom-file-label" for="archivoCer">{{$responsable->archivoCer}}</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="key">* Clave privada (.KEY)</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="archivoKey" name="archivoKey" value="{{url('archivos')}}/{{$responsable->archivoKey}}">
                                    <label class="custom-file-label" for="archivoKey">{{$responsable->archivoKey}}</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="passwordKey">* Contraseña de clave privada</label>
                            <input type="password" class="form-control" id="passwordKey" name="passwordKey" placeholder="Contraseña para descifrar la clave privada" value="{{$responsable->passwordKey}}">
                        </div>
                        <div class="form-group">
                            <label for="passwordKey">* Confirmar contraseña de clave privada</label>
                            <input type="password" class="form-control" id="confirmarPasswordKey" name="passwordKey" placeholder="Contraseña para descifrar la clave privada" value="{{$responsable->passwordKey}}">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-block" id="registrar"><b>Actualizar</b></button>
                    </div>
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
                    <h3 class="profile-username text-center">Información de responsable</h3>
                    <p class="text-muted text-center">{{session()->get('nombreInstitucion')}}</p>
                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Nombre</b><a class="float-right" id="nombreResponsable">{{$responsable->nombre}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Primer apellido</b><a class="float-right" id="apellidoResponsable">{{$responsable->primerApellido}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Segundo apellido</b><a class="float-right" id="apellido2Responsable">{{$responsable->segundoApellido}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>CURP</b><a class="float-right" id="curpResponsable">{{$responsable->curp}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Cargo</b><a class="float-right" id="cargoResponsable">{{$responsable->cargo->descripcionCargo}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Última modificación</b><a class="float-right">{{$responsable->updated_at}}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="{{asset('js/sweetAlert.js')}}"></script>
<script src="{{asset('js/jquery-3.6.js')}}" type="text/javascript"></script>
<script src="{{asset('js/responsable/confirmarPassword.js')}}" type="text/javascript"></script>
<script src="{{asset('js/responsable/activarActualizacion.js')}}" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#registrar").attr('disabled', true);
    });
</script>
@endsection