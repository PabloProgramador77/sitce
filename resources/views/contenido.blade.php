@extends('welcome')
@section('contenido')
<div class="content-wrapper" >
  <div class="content-header">
    <div class="container-fluid">
      <div class="row rounded bg-white p-5">
        <h5 class="text-center text-primary">¡Bienvenido!</h5>
        <p class="fs-6 fw-normal">XMLTECA es una plataforma dedicada a la creación y administración de archivos XML, la cual 
          tiene como objetivo apoyar y agilizar la administración e integración de los datos de los estudiantes egresados en un archivo XML de forma segura. 
          Con el mismo, el personal de control 
          escolar podrá llevar a cabo el trámite del certificado electrónico de sus egresados ante la SEP y la DGP.
        </p>
        <p class="fs-6 fw-normal">Actualmente XMLTECA es capaz de administrar todos los aspectos y datos necesarios para la creación del archivo XML, como lo son:</p>
        <ul class="px-5">
          <li class="fs-6 fw-bold">Alumnos</li>
          <li class="fs-6 fw-bold">Asignaturas</li>
          <li class="fs-6 fw-bold">Carreras</li>
          <li class="fs-6 fw-bold">Ciclos escolares</li>
          <li class="fs-6 fw-bold">Calificaciones</li>
          <li class="fs-6 fw-bold">Responsables de firma</li>
          <li class="fs-6 fw-bold">Expediciones</li>
          <li class="fs-6 fw-bold">Archivos XML</li>
        </ul>
        <p class="fs-6 fw-normal">Se esta trabajando en actualizaciones para la mejora de la plataforma. Muy pronto llegarán. </p>
      </div>
    </div>
  </div>
</div>
@endsection