$(document).ready(function(){
    $("#nombre").change(function(){
        if($("#nombre").val()!=""){
            $("#registrar").attr('disabled', false);
        }
    });

    $("#apellido").change(function(){
        if($("#apellido").val()!=""){
            $("#registrar").attr('disabled', false);
        }
    });

    $("#apellido2").change(function(){
        if($("#apellido2").val()!=""){
            $("#registrar").attr('disabled', false);
        }
    });

    $("#genero").change(function(){
        if($("#genero").val()!=""){
            $("#registrar").attr('disabled', false);
        }
    });

    $("#nacimiento").change(function(){
        if($("#nacimiento").val()!=""){
            $("#registrar").attr('disabled', false);
        }
    });

    $("#carrera").change(function(){
        if($("#carrera").val()!=""){
            $("#registrar").attr('disabled', false);
        }
    });
});