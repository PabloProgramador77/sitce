@extends('welcome')
@section('contenido')
<div class="content-wrapper" style="min-height: 1302.13px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Perfil Institucional</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="{{url('/perfil')}}">Perfil</a></li>
                        <li class="breadcrumb-item active">Editar acceso</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="row p-2">
        <div class="col-md-8">
            <div class="card card-secondary">
                <div class="card-header">
                    <h3 class="card-title">Edición de datos de acceso</h3>
                </div>
                <form role="form">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nombre">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Correo electrónico de acceso" value="{{$institucion->email}}">
                        </div>
                        <div class="form-group">
                            <label for="campus">Contraseña</label>
                            <input type="password" class="form-control" id="password" placeholder="Contraseña de acceso" value="{{$institucion->password}}">
                        </div>
                        <div class="form-group">
                            <label for="clave">Confirmar contraseña</label>
                            <input type="password" class="form-control" id="confirmarPassword" placeholder="Confirma la nueva contraseña en caso de haber escrito una nueva.">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-block" id="actualizar"><b>Actualizar</b></button>
                    </div>
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
                        @if ($institucion->avatarInstitucion=='Logo Indefinido')
                            <img class="profile-user-img img-fluid img-circle" src="{{asset('img/avatarEscuela.png')}}" alt="User profile picture">    
                        @else
                            <img class="profile-user-img img-fluid img-circle" src="{{url('/')}}/img/avatars/{{$institucion->avatarInstitucion}}" alt="User profile picture">
                        @endif
                    </div>
                    <h3 class="profile-username text-center">Perfil de acceso</h3>
                    <p class="text-muted text-center">{{$institucion->nombreInstitucion}}</p>
                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Email</b><a class="float-right" id="emailInstitucion">{{$institucion->email}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Contraseña</b><a class="float-right">*********</a>
                        </li>
                        <li class="list-group-item">
                            <b>Última modificación</b><a class="float-right">{{$institucion->updated_at}}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="{{asset('js/sweetAlert.js')}}"></script>
<script src="{{asset('js/jquery-3.6.js')}}" type="text/javascript"></script> 
<script src="{{asset('js/institucion/actualizarAcceso.js')}}" type="text/javascript"></script>
<script src="{{asset('js/institucion/confirmarPassword.js')}}" type="text/javascript"></script>
<script src="{{asset('js/institucion/vistaPrevia.js')}}" type="text/javascript"></script>
<script src="{{asset('js/institucion/verificarEmail.js')}}" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#actualizar").attr('disabled', true);
    });
</script>
@endsection