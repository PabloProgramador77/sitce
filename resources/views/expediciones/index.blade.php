@extends('welcome')
@section('contenido')
<div class="content-wrapper" style="min-height: 1302.13px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Indice de expediciones</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Inicio</a></li>
                        <li class="breadcrumb-item active">Expediciones</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="row p-2">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title col-md-10"><b>Concentrado de expediciones</b></h3>
                    <a href="{{url('/expediciones/nuevo')}}" type="button" class="btn btn-primary">Nueva Expedición</a>
                </div>
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Folio</th>
                                <th>Matricula</th>
                                <th>Tipo de certificación</th>
                                <th>Fecha de expedición</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($expediciones as $expedicion)
                                <tr>
                                    <td>{{$expedicion->folio}}</td>
                                    <td>{{$expedicion->alumno->numeroControl}}</td>
                                    <td>{{$expedicion->certificacion->tipoCertificacion}}</td>
                                    <td>{{$expedicion->created_at}}</td>
                                    <td>
                                        <a href="{{url('/expediciones/editar')}}/{{$expedicion->id}}" type="button" class="btn btn-primary" title="Editar Expedición">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <a href="{{url('/expediciones/ver')}}/{{$expedicion->id}}" type="button" class="btn btn-info" title="Información de Expedición">
                                            <i class="fa-solid fa-circle-info"></i>
                                        </a>
                                        <a href="{{url('/xml/nuevo')}}/{{$expedicion->id}}" role="button" type="button" class="btn btn-secondary" title="Crear archivo XML">
                                            <i class="fas fa-file"></i>
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
@endsection