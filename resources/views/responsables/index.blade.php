@extends('welcome')
@section('contenido')
<div class="content-wrapper" style="min-height: 1302.13px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Indice de responsables</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Inicio</a></li>
                        <li class="breadcrumb-item active">Responsables</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="row p-2">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title col-md-10"><b>Concentrado de responsables</b></h3>
                    <a href="{{url('/responsables/nuevo')}}" type="button" class="btn btn-primary">Nuevo Responsable</a>
                </div>
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#ID</th>
                                <th>Nombre</th>
                                <th>PrimerApellido</th>
                                <th>Segundo Apellido</th>
                                <th>Cargo</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($responsables as $responsable)
                                <tr>
                                    <td>{{$responsable->id}}</td>
                                    <td>{{$responsable->nombre}}</td>
                                    <td>{{$responsable->primerApellido}}</td>
                                    <td>{{$responsable->segundoApellido}}</td>
                                    <td>{{$responsable->cargo->descripcionCargo}}</td>
                                    <td>
                                        <a href="{{url('/responsables/editar/')}}/{{$responsable->id}}" type="button" class="btn btn-primary" title="Editar responsable">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <a href="{{url('/responsables/eliminar')}}/{{$responsable->id}}" type="button" class="btn btn-danger" title="Eliminar responsable">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                        <!--<a href="{{url('/responsables/ver')}}/{{$responsable->id}}" type="button" class="btn btn-secondary" title="Información de responsable">
                                            <i class="fa-solid fa-circle-info"></i>
                                        </a>-->
                                        <a href="{{url('/responsables/claves')}}/{{$responsable->id}}" type="button" class="btn btn-warning" title="Archivos clave de responsable">
                                            <i class="fa-solid fa-file-signature"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="{{asset('js/sweetAlert.js')}}"></script>
<script src="{{asset('js/jquery-3.6.js')}}" type="text/javascript"></script>
<script src="{{asset('js/responsable/initResponsables.js')}}" type="text/javascript"></script>
@endsection