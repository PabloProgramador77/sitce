$(document).ready(function(){
    $("#numeroControl").change(function(){
        var html;

        html=$("#numeroControl").val();
        $("#numeroControlAlumno").text(html);
    });

    $("#nombre").change(function(){
        var html;

        html=$("#nombre").val();
        $("#nombreAlumno").text(html);
    });

    $("#apellido").change(function(){
        var html;

        html=$("#apellido").val();
        $("#primerApellido").text(html);
    });

    $("#apellido2").change(function(){
        var html;

        html=$("#apellido2").val();
        $("#segundoApellido").text(html);
    });

    $("#curp").change(function(){
        var html;

        html=$("#curp").val();
        $("#curpAlumno").text(html);
    });

    $("#genero").change(function(){
        var html;

        html=$("#genero").val();
        $("#generoAlumno").text(html);
    });

    $("#nacimiento").change(function(){
        var html;

        html=$("#nacimiento").val();
        $("#fechaNacimientoAlumno").text(html);
    });

    $("#carrera").change(function(){
        var html;

        html=$("#carrera").val();
        $("#carreraAlumno").text(html);
    });
});