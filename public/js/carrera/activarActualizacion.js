$(document).ready(function(){
    $("#nombre").change(function(){
        $("#registrar").attr('disabled', false);
    });

    $("#idCarrera").change(function(){
        $("#registrar").attr('disabled', false);
    });

    $("#clave").change(function(){
        $("#registrar").attr('disabled', false);
    });

    $("#clavePlan").change(function(){
        $("#registrar").attr('disabled', false);
    });

    $("#periodo").change(function(){
        $("#registrar").attr('disabled', false);
    });

    $("#nivelEstudios").change(function(){
        $("#registrar").attr('disabled', false);
    });

    $("#calificacionMinima").change(function(){
        $("#registrar").attr('disabled', false);
    });

    $("#calificacionMaxima").change(function(){
        $("#registrar").attr('disabled', false);
    });

    $("#calificacionAprobatoria").change(function(){
        $("#registrar").attr('disabled', false);
    });
});