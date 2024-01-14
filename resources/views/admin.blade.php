<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>XMLTeca</title>
        <!--Fonts & Styles-->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" href="{{asset('js/app.js')}}">
        <link rel="stylesheet" href="{{asset('css/adminlte.min.css')}}">
        <meta name="csrf-token" content="{{csrf_token()}}">
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
          <a href="{{url('/login')}}"><b>XMLTeca</b></a>
          <p class="fs-5 fw-semibold">Sistema Tramitador de Certificados Eléctronicos</p>
        </div>
        <div class="card">
          <div class="card-body login-card-body">
            <p class="login-box-msg">Inicio de sesión administrativo</p>
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
              <button type="submit" class="btn btn-primary btn-block" id="entrar">Iniciar sesión</button>
            </div>
          </div>
          <input type="hidden" name="token" id="token" value="{{csrf_token()}}">
        </form>

        <div class="social-auth-links text-center mb-3">
          <p>- Otras opciones -</p>
          <a href="{{url('/registro')}}" class="btn btn-block btn-primary">
            <i class="fa-solid fa-address-card"></i> No tengo cuenta
          </a>
          <a href="{{url('/recuperacion')}}" class="btn btn-block btn-danger">
            <i class="fa-solid fa-unlock"></i> Olvide mi contraseña
          </a>
          </div>
      </div>
    </div>
  </div>
    <script type="text/javascript" src="{{asset('js/sweetAlert.js')}}"></script>
    <script src="{{asset('js/jquery-3.6.js')}}" type="text/javascript"></script>    
</body>
</html>
