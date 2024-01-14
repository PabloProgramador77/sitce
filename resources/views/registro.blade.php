<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>SITCE</title>
        <!--Fonts & Styles-->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" href="{{asset('js/app.js')}}">
        <link rel="stylesheet" href="{{asset('css/adminlte.min.css')}}">
        <meta name="csrf-token" content="{{csrf_token()}}">
        <!--Fontawesome-->
        <script src="https://kit.fontawesome.com/00b567f7fc.js" crossorigin="anonymous"></script>
    </head>
    <body class="register-page">
        <div class="register-box">
            <div class="register-logo">
                <a href="{{url('/login')}}"><b>S.I.G.C.E.</b></a>
                <p class="fs-5 fw-semibold">Sistema Gestor de Certificados Eléctronicos</p>
            </div>
            <div class="card">
                <div class="card-body register-card-body">
                    <p class="login-box-msg">Registro de IPES</p>
                    <form novalidate>
                        @csrf
                        <div class="input-group mb-3">
                            <input type="text" id="nombre" class="form-control" placeholder="Nombre Institucional">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" id="idInstitucion" class="form-control" placeholder="ID Institucion">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fa-solid fa-binary"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <select class="custom-select" id="entidad">
                                <option value="default">--Elige la entidad federativa de tu institución--</option>
                                @foreach ($entidades as $entidad)
                                    <option value="{{$entidad->id}}">{{$entidad->nombreEntidad}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <input type="email" id="email" class="form-control" placeholder="Correo electrónico">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" id="password" class="form-control" placeholder="Contraseña" >
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" id="confirmarPassword" class="form-control" placeholder="Confirma contraseña">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="terminos" value="agree">
                                    <label for="agreeTerms">Leí los
                                        <a href="#">terminos</a>
                                    </label>
                                </div>
                            </div>
                        <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block" id="registrar">Registrar</button>
                    </div>
                </div>
                <input type="hidden" name="token" id="token" value="{{csrf_token()}}">
            </form>
            <div class="social-auth-links text-center mb-3">
                <p>- Otras opciones -</p>
                <a href="{{url('/login')}}" class="btn btn-block btn-secondary">
                    <i class="fa-solid fa-right-to-bracket"></i> Ya tengo cuenta
                </a>
            </div>
        </div>
        </div>
        </div>
        <script type="text/javascript" src="{{asset('js/sweetAlert.js')}}"></script>
        <script src="{{asset('js/jquery-3.6.js')}}" type="text/javascript"></script>
        <script src="{{asset('js/institucion/agregar.js')}}" type="text/javascript"></script>
        <script src="{{asset('js/institucion/verificarId.js')}}" type="text/javascript"></script>
        <script src="{{asset('js/institucion/verificarEmail.js')}}" type="text/javascript"></script>
        <script src="{{asset('js/institucion/confirmarPassword.js')}}" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $("#registrar").attr('disabled', true);
            });
        </script>
    </body>
</html>
