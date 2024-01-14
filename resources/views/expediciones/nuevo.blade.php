@extends('welcome')
@section('contenido')
<div class="content-wrapper" style="min-height: 1302.13px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Registro de expedición</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="{{url('/expediciones')}}">Expediciones</a></li>
                        <li class="breadcrumb-item active">Nueva Expedición</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="row p-2">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title col-md-10">Campos con simbolo * son obligatorios</h3>
                </div>
                <form role="form">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="folio">*Folio</label>
                            <input type="text" class="form-control" id="folio" name="folio" placeholder="Folio de expedición">
                        </div>
                        <div class="form-group">
                            <label for="certificacion">* Tipo de certificación</label>
                            <select class="custom-select" id="certificacion" name="certificacion">
                                <option value="default">--Elige el tipo de certificación--</option>
                                @foreach ($certificaciones as $certificacion)
                                    <option value="{{$certificacion->id}}">{{$certificacion->tipoCertificacion}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="alumno">* Alumno</label>
                            <select class="custom-select" id="alumno" name="alumno">
                                <option value="default">--Elige el alumno para la expedición--</option>
                                @foreach ($alumnos as $alumno)
                                    <option value="{{$alumno->id}}">{{$alumno->nombre}} {{$alumno->primerApellido}} {{$alumno->segundoApellido}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-block" id="registrar"><b>Registrar</b></button>
                    </div>
                    <input type="hidden" name="token" id="token" value="{{csrf_token()}}">
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="{{asset('js/sweetAlert.js')}}"></script>
<script src="{{asset('js/jquery-3.6.js')}}" type="text/javascript"></script>
<script src="{{asset('js/expediciones/verificarFolio.js')}}" type="text/javascript"></script>
<script src="{{asset('js/expediciones/verificarAlumno.js')}}" type="text/javascript"></script>
<script src="{{asset('js/expediciones/agregar.js')}}" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#registrar").attr('disabled', true);
    });
</script> 
@endsection