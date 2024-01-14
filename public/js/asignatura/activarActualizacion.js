$(document).ready(function(){
    $("#idAsignatura").change(function(){
        if($("#idAsignatura")!=""){
            $("#registrar").attr('disabled', false);
        }
    });

    $("#nombre").change(function(){
        if($("#nombre")!=""){
            $("#registrar").attr('disabled', false);
        }
    });

    $("#clave").change(function(){
        if($("#clave")!=""){
            $("#registrar").attr('disabled', false);
        }
    });

    $("#ciclo").change(function(){
        if($("#ciclo")!=""){
            $("#registrar").attr('disabled', false);
        }
    });

    $("#credito").change(function(){
        if($("#creditos")!=""){
            $("#registrar").attr('disabled', false);
        }
    });

    $("#tipoAsignatura").change(function(){
        if($("#tipoAsignatura")!=""){
            $("#registrar").attr('disabled', false);
        }
    });

    $("#carrera").change(function(){
        if($("#carrera")!=""){
            $("#registrar").attr('disabled', false);
        }
    });
});