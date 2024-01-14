@extends('welcome')
@section('contenido')
<div class="content-wrapper" style="min-height: 1302.13px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Indice de archivos</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Inicio</a></li>
                        <li class="breadcrumb-item active">Archivos</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="row p-2">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title col-md-10"><b>Concentrado de archivos</b></h3>
                </div>
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Archivo</th>
                                <th>Folio</th>
                                <th>Fecha de expedición</th>
                                <th>Fecha de modificación</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($archivos as $archivo)
                                <tr>
                                    <td>{{$archivo->nombreArchivo}}</td>
                                    <td>{{$archivo->expedicion->folio}}</td>
                                    <td>{{$archivo->created_at}}</td>
                                    <td>{{$archivo->updated_at}}</td>
                                    <td>
                                        @if ($archivo->estatusArchivo=='Creado')
                                            <a href="https://buy.stripe.com/3csbJO6c67lpb9S6oq" target="_blank" type="button" class="btn btn-primary" title="Descargar Archivo">
                                                <i class="fas fa-shopping-cart"></i>
                                            </a>    
                                        @endif
                                        @if ($archivo->estatusArchivo=='Pagado')
                                            <a href="{{url('/xml/descargar')}}/{{$archivo->nombreArchivo}}" type="button" class="btn btn-primary" title="Descargar Archivo">
                                                <i class="fa-solid fa-file-arrow-down"></i>
                                            </a>
                                        @endif
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