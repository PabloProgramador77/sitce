@extends('welcome')
@section('contenido')
<div class="content-wrapper" style="min-height: 1302.13px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Plan de pago</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="{{url('/perfil')}}">Perfil</a></li>
                        <li class="breadcrumb-item active">Editar plan</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="row p-2">
        <div class="col-md-8">
            <div class="card card-secondary">
                <div class="card-header">
                    <h3 class="card-title">Edición de plan de pago</h3>
                </div>
                <form role="form">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nombre">Plan actual</label>
                            <input type="text" class="form-control" id="nombre" placeholder="Nombre de la institucion" value="{{session()->get('planInstitucion')}}" readonly="true">
                        </div>
                        <div class="row">
                            <label >Elige el nuevo plan</label>
                            
                            <div class="col-6">
                                <div class="card mb-4 rounded-3 shadow-sm">
                                    <div class="card-header py-3 bg-light">
                                        <h4 class="my-0 fw-normal">Básico</h4>
                                    </div>
                                    <div class="card-body">
                                        <h1 class="card-title pricing-card-title">$7,199.00<small class="text-muted fw-light">/mxn por XML</small></h1>
                                        <ul class="list-unstyled mt-3 mb-4"><br>
                                            <li><i class="fas fa-square"></i> Almacenamiento ilimitado</li>
                                            <li><i class="fas fa-square"></i> Descarga previo pago</li>
                                        </ul>
                                        <!--<a href="/institucion/actualizarPlan/Basico" role="button" class="w-100 btn btn-lg btn-outline-primary">Iniciar Plan Básico</a>-->
                                    </div>
                                </div>
                            </div>
                            
                            
                            <!--<div class="col-6">
                                <div class="card mb-4 rounded-3 shadow-sm border-info">
                                    <div class="card-header py-3 bg-info">
                                        <h4 class="my-0 fw-normal">Profesional</h4>
                                    </div>
                                    <div class="card-body">
                                        <h1 class="card-title pricing-card-title">$10,140<small class="text-muted fw-light">/mxn mensuales</small></h1>
                                        <ul class="list-unstyled mt-3 mb-4">
                                            <li><i class="fas fa-square"></i> XML ilimitados</li>
                                            <li><i class="fas fa-square"></i> Almacenamiento ilimitado</li>
                                            <li><i class="fas fa-square"></i> Descargas ilimitadas</li>
                                        </ul>
                                        <a href="/institucion/actualizarPlan/Profesional" role="button" class="w-100 btn btn-lg btn-primary">Iniciar Plan Profesional</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="card mb-4 rounded-3 shadow border-primary">
                                    <div class="card-header py-3 bg-primary border-primary">
                                        <h4 class="my-0 fw-normal">Ilimitado</h4>
                                    </div>
                                    <div class="card-body">
                                        <h1 class="card-title pricing-card-title">$93,600<small class="text-muted fw-light">/mxn único pago</small></h1>
                                        <ul class="list-unstyled mt-3 mb-4">
                                            <li><i class="fas fa-square"></i> XML ilimitados</li>
                                            <li><i class="fas fa-square"></i> Almacenamiento ilimitado</li>
                                            <li><i class="fas fa-square"></i> Descarga ilimitadas</li>
                                            <li><i class="fas fa-square"></i> Soporte técnico</li>
                                            <li><i class="fas fa-square"></i> Actualizaciones ilimitadas</li>
                                        </ul>
                                        <a href="https://buy.stripe.com/7sIaFKeICaxBb9ScMN" target="_blank" role="button" class="w-100 btn btn-lg btn-primary">Iniciar Plan Ilimitado</a>
                                    </div>
                                </div>
                            </div>-->

                        </div>
                    </div>
                    <input type="hidden" name="token" id="token" value="{{csrf_token()}}">
                </form>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-secondary">
                <div class="card-header">
                    <h3 class="card-title">Vista previa</h3>
                </div>
                <div class="card-body box-profile">
                    <div class="text-center">
                        @if ($institucion->avatarInstitucion=='Logo Indefinido')
                            <img class="profile-user-img img-fluid img-circle" src="{{asset('img/avatarEscuela.png')}}" alt="User profile picture">    
                        @else
                            <img class="profile-user-img img-fluid img-circle" src="{{url('/')}}/img/avatars/{{$institucion->avatarInstitucion}}" alt="User profile picture">
                        @endif
                    </div>
                    <h3 class="profile-username text-center">{{$institucion->nombreInstitucion}}</h3>
                    <p class="text-muted text-center">Campus {{$institucion->campus}}</p>
                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>ID</b><a class="float-right" id="InstitucionId">{{$institucion->idInstitucion}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>ID Campus</b><a class="float-right" id="campusId">{{$institucion->idCampus}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Campus</b><a class="float-right" id="nombreCampus">{{$institucion->campus}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Entidad Federativa</b><a class="float-right" id="edo">{{$institucion->entidad->nombreEntidad}}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="{{asset('js/sweetAlert.js')}}"></script>
<script src="{{asset('js/jquery-3.6.js')}}" type="text/javascript"></script>        
<script src="{{asset('js/institucion/actualizar.js')}}" type="text/javascript"></script>
<script src="{{asset('js/institucion/vistaPrevia.js')}}" type="text/javascript"></script>
<script src="{{asset('js/institucion/verificarId.js')}}" type="text/javascript"></script>
<script src="{{asset('js/institucion/verificarCampus.js')}}" type="text/javascript"></script>
<script src="{{asset('js/institucion/activarActualizacion.js')}}" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#registrar").attr('disabled', true);
    });
</script>
@endsection