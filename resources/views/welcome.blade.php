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
    <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
        <div class="wrapper">
            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="{{url('/manual')}}" class="nav-link" target="_blank" role="button">Manual de Usuario</a>
                    </li>
                </ul>
                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/institucion/logout')}}" role="button" style="color: red;">
                        Cerrar Sesión <i class="fas fa-sign-out-alt"></i>
                        </a>
                    </li>
                </ul>
            </nav>
            <aside class="main-sidebar sidebar-dark-primary elevation-4" >
                <!-- Brand Logo -->
                <a href="{{url('/')}}" class="brand-link">
                <img src="{{asset('img/logo.jpg')}}" alt="" class="brand-image img-circle elevation-3">
                <!--<span class="brand-text font-weight-light text-center fs-6">v 1.0.2 - Marzo 2023</span>-->
                </a>

                <!-- Sidebar -->
                <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="info">
                        <a href="{{url('/')}}" class="d-block">{{session()->get('nombreInstitucion')}}</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="{{url('/perfil')}}" class="nav-link">
                                <i class="fa-solid fa-school-flag"></i>
                                <p>Perfil Institucional</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/ciclos')}}" class="nav-link">
                                <i class="far fa-calendar-alt"></i>
                                <p>Ciclos escolares</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/carreras')}}" class="nav-link">
                                <i class="fa-solid fa-graduation-cap"></i>
                                <p>Carreras</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/responsables')}}" class="nav-link">
                                <i class="fa-solid fa-chalkboard-user"></i>
                                <p>Responsables</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/asignaturas')}}" class="nav-link">
                                <i class="fa-solid fa-book-bookmark"></i>
                                <p>Asignaturas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/alumnos')}}" class="nav-link">
                                <i class="fa-solid fa-user-graduate"></i>
                                <p>Alumnos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/xml')}}" class="nav-link">
                                <i class="fa-solid fa-file"></i>
                                <p>Archivos XML</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/expediciones')}}" class="nav-link">
                                <i class="fa-solid fa-signature"></i>
                                <p>Expediciones</p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        @yield('contenido')
        </div>
        <footer class="main-footer">
            <strong>Copyright © <?php date('Y') ?>XMLTECA - <a href="https://pabloprogramador.com.mx" target="_blank">PabloProgramador</a>.</strong>
            Todos los derechos reservados.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.0.2 - Marzo 2023
            </div>
        </footer>
    </body>
</html>
