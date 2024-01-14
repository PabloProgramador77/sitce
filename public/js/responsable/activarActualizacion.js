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

    $("#curp").change(function(){
        if($("#curp").val()!=""){
            $("#registrar").attr('disabled', false);
        }
    });

    $("#cargo").change(function(){
        if($("#cargo").val()!=""){
            $("#registrar").attr('disabled', false);
        }
    });

    $("#archivoCer").change(function(){
        if($("#archivoCer").val()!=""){
            $("#registrar").attr('disabled', false);
        }
    });

    $("#archivoKey").change(function(){
        if($("#archivoKey").val()!=""){
            $("#registrar").attr('disabled', false);
        }
    });
});