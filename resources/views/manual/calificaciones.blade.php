<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SITCE</title>
        <!--Fonts & Styles-->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" href="{{asset('js/app.js')}}">
        <link rel="stylesheet" href="{{asset('css/adminlte.min.css')}}">
        <script src="https://kit.fontawesome.com/00b567f7fc.js" crossorigin="anonymous"></script>
        <link href="{{asset('js/jquery-3.6.js')}}">
        <link rel="stylesheet" href="{{asset('js/sweetAlert.js')}}">
    </head>
    <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
        <nav class="navbar navbar-expand-lg bg-light border-bottom">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">S.I.T.C.E.</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link disabled" aria-current="page" href="#">Inicio</a>
                        <a class="nav-link" href="{{url('/registro')}}">Registrarme</a>
                        <a class="nav-link" href="{{url('/login')}}">Iniciar sesión</a>
                    </div>
                </div>
            </div>
        </nav>
        <div class="container col-xxl-8 px-4 py-5">
            <h3 class="text-center fs-2 fw-semibold p-1 border-bottom bg-white">Manual de Usuario - Gestión de calificaciones</h3>
            <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                <div class="col-10 col-sm-8 col-lg-6">
                    <!--<img src="../img/calificaciones.jpg" class="d-block mx-lg-auto img-fluid" width="700" height="500" loading="lazy">-->
                    <video src="" controls="true" width="650" height="400"></video>
                </div>
                <div class="col-lg-6">
                    <h1 class="display-5 fw-bold lh-1 mb-3">Registro de calificaciones</h1>
                    <p class="lead">Reproduce el video a continuación, para conocer el proceso de registro de calificaciones en la plataforma.</p>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                    <i class="fas fa-video"></i>
                    </div>
                </div>
            </div>
            <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                <div class="col-10 col-sm-8 col-lg-6">
                    <!--<img src="../img/calificaciones.jpg" class="d-block mx-lg-auto img-fluid" width="700" height="500" loading="lazy">-->
                    <video src="" controls="true" width="650" height="400"></video>
                </div>
                <div class="col-lg-6">
                    <h1 class="display-5 fw-bold lh-1 mb-3">Actualización de calificaciones</h1>
                    <p class="lead">Reproduce el video a continuación, para conocer el proceso de actualización de calificaciones en la plataforma.</p>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                    <i class="fas fa-video"></i>
                    </div>
                </div>
            </div>
            <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                <div class="col-10 col-sm-8 col-lg-6">
                    <!--<img src="../img/calificaciones.jpg" class="d-block mx-lg-auto img-fluid" width="700" height="500" loading="lazy">-->
                    <video src="" controls="true" width="650" height="400"></video>
                </div>
                <div class="col-lg-6">
                    <h1 class="display-5 fw-bold lh-1 mb-3">Consulta de calificaciones</h1>
                    <p class="lead">Reproduce el video a continuación, para conocer el proceso de consulta de calificaciones en la plataforma.</p>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                    <i class="fas fa-video"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
                <div class="col-md-4 d-flex align-items-center">
                    <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
                        <img src="../img/logopp.jpg" alt="Logo PabloProgramador" width="55px" height="55px">
                    </a>
                    <span class="mb-3 mb-md-0 text-muted">© 2022 PabloProgramador</span>
                </div>
                <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
                    <li class="ms-3"><a class="text-muted" href="#"><i class="fab fa-instagram-square"></i></a></li>
                    <li class="ms-3"><a class="text-muted" href="#"><i class="fab fa-facebook"></i></a></li>
                </ul>
            </footer>
        </div>
    </body>
</html>