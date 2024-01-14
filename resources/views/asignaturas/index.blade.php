@extends('welcome')
@section('contenido')
<div class="content-wrapper" style="min-height: 1302.13px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Indice de asignaturas</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Inicio</a></li>
                        <li class="breadcrumb-item active">asignaturas</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="row p-2">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title col-md-10"><b>Concentrado de asignaturas</b></h3>
                    <a href="{{url('/asignaturas/nuevo')}}" type="button" id="nuevo" class="btn btn-primary">Nueva Asignatura</a>
                </div>
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#ID</th>
                                <th>Nombre</th>
                                <th>Clave</th>
                                <th>Carrera</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($asignaturas as $asignatura)
                                <tr>
                                    <td>{{$asignatura->idAsignatura}}</td>
                                    <td>{{$asignatura->nombreAsignatura}}</td>
                                    <td>{{$asignatura->claveAsignatura}}</td>
                                    <td>{{$asignatura->carrera->nombreCarrera}}</td>
                                    <td>
                                        <a href="{{url('/asignaturas/editar')}}/{{$asignatura->id}}" type="button" class="btn btn-primary" title="Editar Asignatura">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <a href="{{url('/asignaturas/eliminar')}}/{{$asignatura->id}}" type="button" class="btn btn-danger" title="Eliminar Asignatura">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                        <!--<a href="{{url('/asignaturas/ver')}}/{{$asignatura->id}}" type="button" class="btn btn-secondary" title="Información de Asignatura">
                                            <i class="fa-solid fa-circle-info"></i>
                                        </a>-->
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
<script src="{{asset('js/asignatura/initAsignaturas.js')}}" type="text/javascript"></script>
@endsection