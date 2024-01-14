<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>XMLTeca</title>
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
    <body class="login-page bg-light">
      <div class="login-box">
        <div class="login-logo">
          <!--<a href="{{url('/login')}}" class="fs-4 fw-bold"><b>XMLTECA</b></a>
          <p class="fs-6 fw-normal">v 1.0.2</p>-->
        </div>
        <div class="card shadow-lg rounded">
          <div class="card-body login-card-body">
            <p class="login-box-msg fs-5 fw-bold my-0">Inicio de Sesión</p>
            <img src="{{asset('img/logo.jpg')}}" alt="Logo XMLTeca" class="w-50 d-block mx-auto my-0">
            <form novalidate>
              @csrf
              <div class="input-group mb-3">
                <input type="email" id="email" class="form-control" placeholder="Correo electrónico">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                  </div>
                </div>
              </div>
          <div class="input-group mb-3">
            <input type="password" id="password" class="form-control" placeholder="Contraseña">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <button type="submit" class="btn btn-success btn-block fw-bold" id="entrar">Iniciar sesión</button>
            </div>
          </div>
          <input type="hidden" name="token" id="token" value="{{csrf_token()}}">
        </form>
        <div class="social-auth-links text-center mb-3">
          <p class="text-center fs-6 fw-normal text-secondary">- Otras opciones -</p>
          <a href="{{url('/registro')}}" class="btn btn-block btn-secondary">
            <i class="fa-solid fa-address-card"></i> No tengo cuenta
          </a>
        </div>
        <p class="fs-6 fw-normal text-center text-secondary">v 1.0.2</p>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="{{asset('js/sweetAlert.js')}}"></script>
  <script src="{{asset('js/jquery-3.6.js')}}" type="text/javascript"></script>    
  <script src="{{asset('js/institucion/verificarLogin.js')}}" type="text/javascript"></script>
  <script src="{{asset('js/institucion/iniciarSesion.js')}}" type="text/javascript"></script>
  </body>
</html>
