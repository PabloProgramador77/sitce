@extends('welcome')
@section('contenido')
<div class="content-wrapper" style="min-height: 1302.13px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Indice de carreras</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Inicio</a></li>
                        <li class="breadcrumb-item active">Carreras</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="row p-2">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title col-md-10"><b>Concentrado de carreras</b></h3>
                    <a href="{{url('/carreras/nuevo')}}" type="button" class="btn btn-primary">Nueva Carrera</a>
                </div>
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#ID</th>
                                <th>Nombre</th>
                                <th>Clave</th>
                                <th>Tipo de Periodo</th>
                                <th>Nivel de estudios</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($carreras as $carrera)
                                <tr>
                                    <td>{{$carrera->idCarrera}}</td>
                                    <td>{{$carrera->nombreCarrera}}</td>
                                    <td>{{$carrera->claveCarrera}}</td>
                                    <td>{{$carrera->periodo->tipoPeriodo}}</td>
                                    <td>{{$carrera->nivelEstudio->descripcionEstudio}}</td>
                                    <td>
                                        <a href="{{url('/carreras/editar')}}/{{$carrera->id}}" type="button" class="btn btn-primary" title="Editar carrera">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <a href="{{url('/carreras/eliminar')}}/{{$carrera->id}}" type="button" class="btn btn-danger" title="Eliminar carrera">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                        <!--<a href="{{url('/carreras/ver')}}/{{$carrera->id}}" type="button" class="btn btn-secondary" title="Información de carrera">
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
@endsection