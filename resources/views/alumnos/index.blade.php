@extends('welcome')
@section('contenido')
<div class="content-wrapper" style="min-height: 1302.13px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Indice de alumnos</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Inicio</a></li>
                        <li class="breadcrumb-item active">Alumnos</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="row p-2">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title col-md-10"><b>Concentrado de alumnos</b></h3>
                    <a href="{{url('/alumnos/nuevo')}}" type="button" class="btn btn-primary">Nuevo Alumno</a>
                </div>
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Matricula</th>
                                <th>Nombre</th>
                                <th>Primer Apellido</th>
                                <th>Segundo Apellido</th>
                                <th>CURP</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($alumnos as $alumno)
                                <tr>
                                    <td>{{$alumno->numeroControl}}</td>
                                    <td>{{$alumno->nombre}}</td>
                                    <td>{{$alumno->primerApellido}}</td>
                                    <td>{{$alumno->segundoApellido}}</td>
                                    <td>{{$alumno->curp}}</td>
                                    <td>
                                        <a href="{{url('/alumnos/editar')}}/{{$alumno->id}}" type="button" class="btn btn-primary" title="Editar Alumno">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <a href="{{url('/alumnos/eliminar')}}/{{$alumno->id}}" type="button" class="btn btn-danger" title="Eliminar Alumno">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                        <a href="{{url('/alumnos/ver')}}/{{$alumno->id}}" type="button" class="btn btn-secondary" title="Información de Alumno">
                                            <i class="fa-solid fa-circle-info"></i>
                                        </a>
                                        <a href="{{url('/alumnos/calificaciones')}}/{{$alumno->id}}" type="button" class="btn btn-warning" title="Calificaciones">
                                            <i class="fa-solid fa-file-signature"></i>
                                        </a>
                                        <!--<a href="{{url('/alumnos/imagenes')}}/{{$alumno->id}}" type="button" class="btn btn-success" title="Imagenes">
                                            <i class="fa-solid fa-image"></i>
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
<script src="{{asset('js/alumno/initAlumnos.js')}}" type="text/javascript"></script>
@endsection