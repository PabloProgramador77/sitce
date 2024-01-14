<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{csrf_token()}}">
        <title>SITCE</title>
        <!--Fonts & Styles-->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" href="{{asset('js/app.js')}}">
        <link rel="stylesheet" href="{{asset('css/adminlte.min.css')}}">
        <!--Fontawesome-->
        <script src="https://kit.fontawesome.com/00b567f7fc.js" crossorigin="anonymous"></script>
        <!--JQuery-->
        <link href="{{asset('js/jquery-3.6.js')}}">
        <!--SweetAlert-->
        <link rel="stylesheet" href="{{asset('js/sweetAlert.js')}}">
    </head>
    <body class="login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="{{url('/login')}}"><b>S.I.T.C.E.</b></a>
                <p class="fs-5 fw-semibold">Sistema Tramitador de Certificados Eléctronicos</p>
            </div>
            <!-- /.login-logo -->
            <div class="card">
                <div class="card-body login-card-body">
                <p class="login-box-msg">¿Olvidates tu contraseña de acceso? Obten una nueva en el correo electrónico con el que te registraste.</p>

                <form novalidate>
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" id="email" class="form-control" placeholder="Correo electrónico" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" id="recuperar" class="btn btn-primary btn-block">Solicitar nueva contraseña</button>
                        </div>
                    </div>
                    <input type="hidden" name="token" id="token" value="{{csrf_token()}}">
                </form>

                <div class="social-auth-links text-center mb-3">
                    <p>- Otras opciones -</p>
                    <a href="{{url('/login')}}" class="btn btn-block btn-primary">
                        <i class="fa-solid fa-right-to-bracket"></i> Ya tengo cuenta
                    </a>
                    <a href="{{url('/registro')}}" class="btn btn-block btn-danger">
                        <i class="fa-solid fa-address-card"></i> No tengo cuenta
                    </a>
                </div>
                </div>
                <!-- /.login-card-body -->
            </div>
        </div>
        <script type="text/javascript" src="{{asset('js/sweetAlert.js')}}"></script>
        <script src="{{asset('js/jquery-3.6.js')}}" type="text/javascript"></script>
        <script src="{{asset('js/institucion/verificarLogin.js')}}" type="text/javascript"></script>
        <script src="{{asset('js/institucion/recuperar.js')}}" type="text/javascript"></script>
    </body>
</html>
