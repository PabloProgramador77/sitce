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
                <form role="form" action="{{url('/responsables/actualizar', ['id'=>$responsable->id])}}" method="POST" novalidate enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nombre">*Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre(s)" value="{{$responsable->nombre}}">
                        </div>
                        <div class="form-group">
                            <label for="apellido">*Primer Apellido</label>
                            <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido paterno" value="{{$responsable->primerApellido}}">
                        </div>
                        <div class="form-group">
                            <label for="apellido2">Segundo Apellido</label>
                            <input type="text" class="form-control" id="apellido2" name="apellido2" placeholder="Apellido materno" value="{{$responsable->segundoApellido}}">
                        </div>
                        <div class="form-group">
                            <label for="curp">* CURP</label>
                            <input type="text" class="form-control" id="curp" name="curp" placeholder="CURP" value="{{$responsable->curp}}">
                        </div>
                        <div class="form-group">
                            <label>* Cargo</label>
                            <select class="custom-select" id="cargo" name="cargo">
                                <option value="{{$responsable->cargo->id}}">{{$responsable->cargo->descripcionCargo}}</option>
                                @foreach ($cargos as $cargo)
                                    @if ($cargo->descripcionCargo!=$responsable->cargo->descripcionCargo)
                                        <option value="{{$cargo->id}}">{{$cargo->descripcionCargo}}</option>
                                    @endif
                                @endforeach
                            </select>
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
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="{{asset('js/sweetAlert.js')}}"></script>
<script src="{{asset('js/jquery-3.6.js')}}" type="text/javascript"></script>
<script src="{{asset('js/responsable/verificarCurp.js')}}" type="text/javascript"></script>
<script src="{{asset('js/responsable/vistaPrevia.js')}}" type="text/javascript"></script>
<script src="{{asset('js/responsable/activarActualizacion.js')}}" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#registrar").attr('disabled', true);
    });
</script>
@endsection