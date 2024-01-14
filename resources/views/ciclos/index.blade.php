@extends('welcome')
@section('contenido')
<div class="content-wrapper" style="min-height: 1302.13px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Indice de ciclos</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Inicio</a></li>
                        <li class="breadcrumb-item active">Ciclos</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="row p-2">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title col-md-10"><b>Concentrado de ciclos</b></h3>
                    <a href="{{url('/ciclos/nuevo')}}" type="button" class="btn btn-primary">Nuevo Ciclo</a>
                </div>
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#ID</th>
                                <th>Ciclo</th>
                                <th>Fecha de modificación</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ciclos as $ciclo)
                                <tr>
                                    <td>{{$ciclo->id}}</td>
                                    <td>{{$ciclo->nombreCiclo}}</td>
                                    <td>{{$ciclo->updated_at}}</td>
                                    <td>
                                        <a href="{{url('/ciclos/editar')}}/{{$ciclo->id}}" type="button" class="btn btn-primary" title="Editar ciclo">
                                            <i class="fa-solid fa-pen-to-square"></i>
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