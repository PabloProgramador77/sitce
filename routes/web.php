<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InstitucionController;
use App\Http\Controllers\CarreraController;
use App\Http\Controllers\ResponsableController;
use App\Http\Controllers\AsignaturaController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\CalificacionesController;
use App\Http\Controllers\ExpedicionController;
use App\Http\Controllers\ArchivoController;
use App\Http\Controllers\CicloController;

Route::get('/', 'App\Http\Controllers\InstitucionController@index');

Route::get('/login', function(){
    return view('login');
});

Route::get('/recuperacion', function(){
    return view('recuperacion');
});

/*Rutas de Institución */
Route::get('/perfil', 'App\Http\Controllers\InstitucionController@show');
Route::get('/registro', 'App\Http\Controllers\InstitucionController@create');
Route::get('/institucion/editar', 'App\Http\Controllers\InstitucionController@edit');
Route::get('/institucion/acceso', 'App\Http\Controllers\InstitucionController@acceso');
Route::get('/institucion/avatar', 'App\Http\Controllers\InstitucionController@avatar');
Route::get('/institucion/plan', 'App\Http\Controllers\InstitucionController@plan');
Route::post('/institucion/registrar', 'App\Http\Controllers\InstitucionController@registrar');
Route::post('/institucion/verificarId', 'App\Http\Controllers\InstitucionController@verificarId');
Route::post('/institucion/verificarEmail', 'App\Http\Controllers\InstitucionController@verificarEmail');
Route::post('/institucion/verificarCampus', 'App\Http\Controllers\InstitucionController@verificarCampus');
Route::post('/institucion/login', 'App\Http\Controllers\InstitucionController@login');
Route::get('/institucion/logout', 'App\Http\Controllers\InstitucionController@logout');
Route::post('/institucion/actualizarPerfil', 'App\Http\Controllers\InstitucionController@update');
Route::post('/institucion/actualizarAcceso', 'App\Http\Controllers\InstitucionController@actualizarAcceso');
Route::post('/institucion/actualizarAvatar', 'App\Http\Controllers\InstitucionController@actualizarAvatar');
Route::post('/institucion/recuperar', 'App\Http\Controllers\InstitucionController@recuperar');
/*Fin de rutas de institución */

/*Rutas de carrears */
Route::get('/carreras', 'App\Http\Controllers\CarreraController@index');
Route::get('/carreras/nuevo', 'App\Http\Controllers\CarreraController@create');
Route::post('/carreras/registrar', 'App\Http\Controllers\CarreraController@store');
Route::get('/carreras/editar/{id}', 'App\Http\Controllers\CarreraController@edit');
Route::post('/carreras/actualizar', 'App\Http\Controllers\CarreraController@update');
Route::get('/carreras/eliminar/{id}', 'App\Http\Controllers\CarreraController@destroy');
Route::post('/carreras/borrar', 'App\Http\Controllers\CarreraController@borrar');
Route::get('/carreras/ver/{id}', 'App\Http\Controllers\CarreraController@show');
Route::post('/carreras/verificarId', 'App\Http\Controllers\CarreraController@verificarId');
Route::post('/carreras/verificarClave', 'App\Http\Controllers\CarreraController@verificarClave');
Route::post('/carreras/verificarRvoe', 'App\Http\Controllers\CarreraController@verificarRvoe');
/*Fin de rutas de carreras */

/*Rutas de responsables */
Route::get('/responsables', 'App\Http\Controllers\ResponsableController@index');
Route::get('/responsables/nuevo', 'App\Http\Controllers\ResponsableController@create');
Route::post('/responsables/registrar', 'App\Http\Controllers\ResponsableController@store');
Route::post('/responsables/verificarCurp', 'App\Http\Controllers\ResponsableController@verificarCurp');
Route::get('/responsables/editar/{id}', 'App\Http\Controllers\ResponsableController@edit');
Route::post('/responsables/actualizar/{id}', 'App\Http\Controllers\ResponsableController@update')->name('/responsables/actualizar');
Route::get('/responsables/eliminar/{id}', 'App\Http\Controllers\ResponsableController@destroy');
Route::post('/responsables/borrar', 'App\Http\Controllers\ResponsableController@borrar');
Route::get('/responsables/ver/{id}', 'App\Http\Controllers\ResponsableController@show');
Route::get('/responsables/claves/{id}', 'App\Http\Controllers\ResponsableController@mostrarClaves');
Route::post('/responsables/actualizarClaves/{id}', 'App\Http\Controllers\ResponsableController@actualizar')->name('/responsables/actualizarClaves');
Route::post('/responsables/init', 'App\Http\Controllers\ResponsableController@init');
/*Fin de rutas de responsables */

/*Rutas de asignaturas */
Route::get('/asignaturas', 'App\Http\Controllers\AsignaturaController@index');
Route::get('/asignaturas/nuevo', 'App\Http\Controllers\AsignaturaController@create');
Route::post('/asignaturas/registrar', 'App\Http\Controllers\AsignaturaController@store');
Route::post('/asignaturas/verificarId', 'App\Http\Controllers\AsignaturaController@verificarId');
Route::post('/asignaturas/verificarClave', 'App\Http\Controllers\AsignaturaController@verificarClave');
Route::get('/asignaturas/editar/{id}', 'App\Http\Controllers\AsignaturaController@edit');
Route::post('/asignaturas/actualizar', 'App\Http\Controllers\AsignaturaController@update');
Route::get('/asignaturas/eliminar/{id}', 'App\Http\Controllers\AsignaturaController@destroy');
Route::post('/asignaturas/borrar', 'App\Http\Controllers\AsignaturaController@borrar');
Route::get('/asignaturas/ver/{id}', 'App\Http\Controllers\AsignaturaController@show');
Route::post('/asignaturas/init', 'App\Http\Controllers\AsignaturaController@init');
/*Fin de rutas de asignaturas */

/*Rutas de alumnos */
Route::get('/alumnos', 'App\Http\Controllers\AlumnoController@index');
Route::get('/alumnos/nuevo', 'App\Http\Controllers\AlumnoController@create');
Route::post('/alumnos/registrar', 'App\Http\Controllers\AlumnoController@store');
Route::get('/alumnos/editar/{id}', 'App\Http\Controllers\AlumnoController@edit');
Route::post('/alumnos/actualizar', 'App\Http\Controllers\AlumnoController@update');
Route::get('/alumnos/eliminar/{id}', 'App\Http\Controllers\AlumnoController@destroy');
Route::post('/alumnos/borrar', 'App\Http\Controllers\AlumnoController@borrar');
Route::post('/alumnos/verificarNumeroControl', 'App\Http\Controllers\AlumnoController@verificarNumeroControl');
Route::post('/alumnos/verificarCurp', 'App\Http\Controllers\AlumnoController@verificarCurp');
Route::get('/alumnos/ver/{id}', 'App\Http\Controllers\AlumnoController@show');
Route::post('/alumnos/init', 'App\Http\Controllers\AlumnoController@init');
Route::get('/alumnos/calificaciones/{id}', 'App\Http\Controllers\AlumnoController@calificaciones');
Route::get('/alumnos/imagenes/{id}', 'App\Http\Controllers\AlumnoController@obtenerImagenes');
Route::post('/alumnos/actualizarImagenes/{id}', 'App\Http\Controllers\AlumnoController@cargarImagenes')->name('/alumnos/actualizarImagenes');
/*Fin de rutas de alumnos */

/*Rutas de archivos */
Route::get('/xml', 'App\Http\Controllers\ArchivoController@index');
Route::get('/xml/nuevo/{id}', 'App\Http\Controllers\ArchivoController@store');
Route::get('/xml/descargar/{nombre}', 'App\Http\Controllers\ArchivoController@descargar');
/*Fin de rutas de archivos */

/**Rutas de expediciones */
Route::get('/expediciones', 'App\Http\Controllers\ExpedicionController@index');
Route::get('/expediciones/nuevo', 'App\Http\Controllers\ExpedicionController@create');
Route::post('/expediciones/registrar', 'App\Http\Controllers\ExpedicionController@store');
Route::get('/expediciones/editar/{id}', 'App\Http\Controllers\ExpedicionController@edit');
Route::post('/expediciones/actualizar', 'App\Http\Controllers\ExpedicionController@update');
Route::get('/expediciones/ver/{id}', 'App\Http\Controllers\ExpedicionController@show');
Route::post('/expediciones/verificarFolio', 'App\Http\Controllers\ExpedicionController@verificarFolio');
Route::post('/expediciones/verificarAlumno', 'App\Http\Controllers\ExpedicionController@verificarAlumno');
/**Fin de rutas de expediciones */

/*Rutas de calificaciones */
Route::post('/calificaciones/asignar/{idAlumno}/{idAsignatura}', 'App\Http\Controllers\CalificacionesController@store')->name('/calificaciones/asignar');
Route::get('/calificaciones/editar/{id}', 'App\Http\Controllers\CalificacionesController@edit');
Route::post('/calificaciones/actualizar', 'App\Http\Controllers\CalificacionesController@update');
/*Fin de rutas de calificaciones */

/*Rutas de ciclos */
Route::get('/ciclos', 'App\Http\Controllers\CicloController@index');
Route::get('/ciclos/nuevo', 'App\Http\Controllers\CicloController@create');
Route::post('/ciclos/registrar', 'App\Http\Controllers\CicloController@store');
Route::get('/ciclos/editar/{id}', 'App\Http\Controllers\CicloController@edit');
Route::post('/ciclos/actualizar', 'App\Http\Controllers\CicloController@update');
Route::post('/ciclos/verificar', 'App\Http\Controllers\CicloController@verificar');
/*Fin de rutas de ciclos */