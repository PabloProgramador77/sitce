@extends('welcome')
@section('contenido')
<div class="content-wrapper" style="min-height: 1302.13px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Registro de responsable(s)</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="{{url('/responsables')}}">Responsables</a></li>
                        <li class="breadcrumb-item active">Nuevo responsable</li>
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
                <form novalidate role="form" enctype="multipart/form-data" action="{{url('/responsables/registrar')}}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nombre">*Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre(s)">
                        </div>
                        <div class="form-group">
                            <label for="apellido">*Primer Apellido</label>
                            <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido paterno">
                        </div>
                        <div class="form-group">
                            <label for="apellido2">Segundo Apellido</label>
                            <input type="text" class="form-control" id="apellido2" name="apellido2" placeholder="Apellido materno">
                        </div>
                        <div class="form-group">
                            <label for="curp">* CURP</label>
                            <input type="text" class="form-control" id="curp" name="curp" placeholder="CURP">
                        </div>
                        <div class="form-group">
                            <label>* Cargo</label>
                            <select class="custom-select" id="cargo" name="cargo">
                                <option value="default">--Elige el cargo del responsable--</option>
                                @foreach ($cargos as $cargo)
                                    <option value="{{$cargo->id}}">{{$cargo->descripcionCargo}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="cer">* Clave pública (.CER)</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="archivoCer" name="archivoCer">
                                    <label class="custom-file-label" for="cer">Seleccionar archivo</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="key">* Clave privada (.KEY)</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="archivoKey" name="archivoKey">
                                    <label class="custom-file-label" for="key">Seleccionar archivo</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="passwordKey">* Contraseña de clave privada</label>
                            <input type="password" class="form-control" id="passwordKey" name="passwordKey" placeholder="Contraseña para descifrar la clave privada">
                        </div>
                        <div class="form-group">
                            <label for="passwordKey">* Confirmar contraseña de clave privada</label>
                            <input type="password" class="form-control" id="confirmarPasswordKey" name="passwordKey" placeholder="Contraseña para descifrar la clave privada">
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
<script src="{{asset('js/responsable/verificarCurp.js')}}" type="text/javascript"></script>
<script src="{{asset('js/responsable/confirmarPassword.js')}}" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#registrar").attr('disabled', true);
    });
</script>
@endsection