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
                        <li class="breadcrumb-item active">Perfil</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="row p-2">
        <div class="col-md-4">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        @if ($institucion->avatarInstitucion=='Logo Indefinido')
                            <img class="profile-user-img img-fluid img-circle" src="{{asset('img/avatarEscuela.png')}}" alt="User profile picture">    
                        @else
                            <img class="profile-user-img img-fluid img-circle" src="{{url('/')}}/img/avatars/{{$institucion->avatarInstitucion}}" alt="User profile picture">
                        @endif
                    </div>
                    <h3 class="profile-username text-center">{{$institucion->nombreInstitucion}}</h3>
                    <p class="text-muted text-center">Campus {{$institucion->campus}}</p>
                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>ID Institución</b><a class="float-right">{{$institucion->idInstitucion}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>ID Campus</b><a class="float-right">{{$institucion->idCampus}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Entidad Federativa</b><a class="float-right">{{$institucion->entidad->nombreEntidad}}</a>
                        </li>
                    </ul>
                    <a href="{{url('/institucion/editar')}}" class="btn btn-primary btn-block"><b>Editar datos</b></a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-primary card-outline">
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
                            <b>Email</b><a class="float-right">{{$institucion->email}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Contraseña</b><a class="float-right">*********</a>
                        </li>
                        <li class="list-group-item">
                            <b>Última modificación</b><a class="float-right">{{$institucion->updated_at}}</a>
                        </li>
                    </ul>
                    <a href="{{url('/institucion/acceso')}}" class="btn btn-primary btn-block"><b>Editar acceso</b></a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        @if ($institucion->avatarInstitucion=='Logo Indefinido')
                            <img class="profile-user-img img-fluid img-circle" src="{{asset('img/avatarEscuela.png')}}" alt="User profile picture">    
                        @else
                            <img class="profile-user-img img-fluid img-circle" src="{{url('/')}}/img/avatars/{{$institucion->avatarInstitucion}}" alt="User profile picture">
                        @endif
                    </div>
                    <h3 class="profile-username text-center">Imagen de perfil</h3>
                    <p class="text-muted text-center">{{$institucion->nombreInstitucion}}</p>
                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Nombre de imagen</b><a class="float-right">{{$institucion->avatarInstitucion}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Tipo de imagen</b><a class="float-right">{{$institucion->tipoAvatarInstitucion}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Última modificación</b><a class="float-right">{{$institucion->updated_at}}</a>
                        </li>
                    </ul>
                    <a href="{{url('/institucion/avatar')}}" class="btn btn-primary btn-block"><b>Editar logo</b></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection