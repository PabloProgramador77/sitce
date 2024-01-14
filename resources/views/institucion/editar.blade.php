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
                        <li class="breadcrumb-item active">Editar perfil</li>
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
                            <label for="nombre">*Nombre</label>
                            <input type="text" class="form-control" id="nombre" placeholder="Nombre de la institucion" value="{{$institucion->nombreInstitucion}}">
                        </div>
                        <div class="form-group">
                            <label for="campus">*Nombre de Campus</label>
                            <input type="text" class="form-control" id="campus" placeholder="Nombre del campus" value="{{$institucion->campus}}">
                        </div>
                        <div class="form-group">
                            <label for="id">*ID</label>
                            <input type="text" class="form-control" id="idInstitucion" placeholder="Clave de 6 dígitos" value="{{$institucion->idInstitucion}}">
                        </div>
                        <div class="form-group">
                            <label for="rvoe">*ID Campus</label>
                            <input type="text" class="form-control" id="idCampus" placeholder="ID Campus" value="{{$institucion->idCampus}}">
                        </div>
                        <div class="form-group">
                            <label>*Entidad Federativa</label>
                            <select class="custom-select" id="entidadFederativa">
                                <option value="{{$institucion->entidad->id}}">{{$institucion->entidad->nombreEntidad}}</option>
                                @foreach ($entidades as $entidad)
                                    @if ($entidad->nombreEntidad!=$institucion->entidad->nombreEntidad)
                                        <option value="{{$entidad->id}}">{{$entidad->nombreEntidad}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-block" id="registrar"><b>Actualizar</b></button>
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
                    <h3 class="profile-username text-center">{{$institucion->nombreInstitucion}}</h3>
                    <p class="text-muted text-center">Campus {{$institucion->campus}}</p>
                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>ID</b><a class="float-right" id="InstitucionId">{{$institucion->idInstitucion}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>ID Campus</b><a class="float-right" id="campusId">{{$institucion->idCampus}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Campus</b><a class="float-right" id="nombreCampus">{{$institucion->campus}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Entidad Federativa</b><a class="float-right" id="edo">{{$institucion->entidad->nombreEntidad}}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="{{asset('js/sweetAlert.js')}}"></script>
<script src="{{asset('js/jquery-3.6.js')}}" type="text/javascript"></script>        
<script src="{{asset('js/institucion/actualizar.js')}}" type="text/javascript"></script>
<script src="{{asset('js/institucion/vistaPrevia.js')}}" type="text/javascript"></script>
<script src="{{asset('js/institucion/verificarId.js')}}" type="text/javascript"></script>
<script src="{{asset('js/institucion/verificarCampus.js')}}" type="text/javascript"></script>
<script src="{{asset('js/institucion/activarActualizacion.js')}}" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#registrar").attr('disabled', true);
    });
</script>
@endsection