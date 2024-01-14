@extends('welcome')
@section('contenido')
<div class="content-wrapper" style="min-height: 1302.13px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Pagar archivo</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="{{url('/xml')}}">Archivos</a></li>
                        <li class="breadcrumb-item active">Pagar archivo</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="row p-2">
        <div class="col-md-8">
            <div class="card card-secondary">
                <div class="card-header">
                    <h3 class="card-title">Confirma los datos del archivo y pulsar continuar.</h3>
                </div>
                <section>
                  <div class="product">
                    <div class="description">
                      <h3 class="text-center fs-4 fw-semibold bg-info p-2">Archivo XML - {{$archivo->nombreArchivo}}</h3>
                      <h5 class="text-center fs-5 fw-bold bg-light border-bottom p-2">$363.00 mxn</h5>
                    </div>
                  </div>
                  <form action="{{url('/xml/pagar')}}/{{$archivo->id}}" method="POST">
                    @csrf
                    <button type="submit" id="checkout-button" class="btn btn-primary m-auto btn-block shadow">Continuar</button>
                  </form>
                </section>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-secondary">
                <div class="card-header">
                    <h3 class="card-title">Datos generales</h3>
                </div>
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" src="{{asset('img/avatarEscuela.png')}}" alt="User profile picture">
                    </div>
                    <h3 class="profile-username text-center">Información de archivo</h3>
                    <p class="text-muted text-center">{{session()->get('nombreInstitucion')}}</p>
                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Archivo</b><a class="float-right">{{$archivo->nombreArchivo}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Fecha de creación</b><a class="float-right">{{$archivo->created_at}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Fecha de modificación</b><a class="float-right">{{$archivo->updated_at}}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection