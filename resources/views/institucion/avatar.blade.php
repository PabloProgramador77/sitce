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
                        <li class="breadcrumb-item active">Editar imagen</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="row p-2">
        <div class="col-md-8">
            <div class="card card-secondary">
                <div class="card-header">
                    <h3 class="card-title">Edición de imagen</h3>
                </div>
                <form role="form" action="{{url('/institucion/actualizarAvatar')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="avatar">Imagen de perfil</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="avatar" name="avatar">
                                    <label class="custom-file-label" for="avatar">Elegir imagen</label>
                                </div>
                            </div>
                        </div>  
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-block" id="cargar"><b>Cargar</b></button>
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
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('js/jquery-3.6.js')}}" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#cargar").attr('disabled', true);
    });

    $("#avatar").change(function(){
        if($("#avatar").val()!=""){
            $("#cargar").attr('disabled', false);
        }else{
            $("#cargar").attr('disabled', true);
        }
    });
</script>
@endsection