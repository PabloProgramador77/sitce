@extends('welcome')
@section('contenido')
<div class="content-wrapper" style="min-height: 1302.13px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Eliminación de expedición</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="{{url('/expediciones')}}">Expediciones</a></li>
                        <li class="breadcrumb-item active">Eliminar Expedición</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="row p-2">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title col-md-10">Los datos no podrán ser recuperados una vez eliminados./h3>
                </div>
                <form role="form">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="folio">*Folio</label>
                            <input type="text" class="form-control" id="folio" name="folio" placeholder="Folio de expedición" value="{{$expedicion->folio}}" readonly="true">
                        </div>
                        <div class="form-group">
                            <label for="certificacion">* Tipo de certificación</label>
                            <select class="custom-select" id="certificacion" name="certificacion" readonly="true">
                                <option value="{{$expedicion->certificacion->id}}">{{$expedicion->certificacion->tipoCertificacion}}</option>
                                
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="alumno">* Alumno</label>
                            <select class="custom-select" id="alumno" name="alumno" readonly="true">
                                <option value="{{$expedicion->alumno->id}}">{{$expedicion->alumno->nombre}} {{$expedicion->alumno->primerApellido}} {{$expedicion->alumno->segundoApellido}}</option>
                                
                            </select>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-block" id="eliminar"><b>Eliminar</b></button>
                    </div>
                    <input type="hidden" name="token" id="token" value="{{csrf_token()}}">
                    <input type="hidden" name="id" id="id" value="{{$expedicion->id}}">
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="{{asset('js/sweetAlert.js')}}"></script>
<script src="{{asset('js/jquery-3.6.js')}}" type="text/javascript"></script>
<script src=""></script>
@endsection