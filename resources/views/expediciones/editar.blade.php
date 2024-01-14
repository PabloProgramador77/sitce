@extends('welcome')
@section('contenido')
<div class="content-wrapper" style="min-height: 1302.13px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edición de expedición</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="{{url('/expediciones')}}">Expediciones</a></li>
                        <li class="breadcrumb-item active">Editar Expedición</li>
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
                            <input type="text" class="form-control" id="folio" name="folio" placeholder="Folio de expedición" value="{{$expedicion->folio}}">
                        </div>
                        <div class="form-group">
                            <label for="certificacion">* Tipo de certificación</label>
                            <select class="custom-select" id="certificacion" name="certificacion">
                                <option value="{{$expedicion->certificacion->id}}">{{$expedicion->certificacion->tipoCertificacion}}</option>
                                @foreach ($certificaciones as $certificacion)
                                    @if ($certificacion->id!=$expedicion->certificacion->id)
                                        <option value="{{$certificacion->id}}">{{$certificacion->tipoCertificacion}}</option>    
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="alumno">* Alumno</label>
                            <select class="custom-select" id="alumno" name="alumno">
                                <option value="{{$expedicion->alumno->id}}">{{$expedicion->alumno->nombre}} {{$expedicion->alumno->primerApellido}} {{$expedicion->alumno->segundoApellido}}</option>
                                @foreach ($alumnos as $alumno)
                                    @if ($alumno->id!=$expedicion->alumno->id)
                                        <option value="{{$alumno->id}}">{{$alumno->nombre}} {{$alumno->primerApellido}} {{$alumno->segundoApellido}}</option>    
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-block" id="registrar"><b>Actualizar</b></button>
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
<script src="{{asset('js/expediciones/verificarFolio.js')}}" type="text/javascript"></script>
<script src="{{asset('js/expediciones/verificarAlumno.js')}}" type="text/javascript"></script>
<script src="{{asset('js/expediciones/actualizar.js')}}" type="text/javascript"></script>
<script src="{{asset('js/expediciones/activarActualizacion.js')}}" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#registrar").attr('disabled', true);
    });
</script> 
@endsection