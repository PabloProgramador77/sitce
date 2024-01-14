$(document).ready(function(){
    $("#nombre").change(function(){
        var html;

        html=$("#nombre").val();
        $("#nombreResponsable").text(html)
    });

    $("#apellido").change(function(){
        var html;

        html=$("#apellido").val();
        $("#apellidoResponsable").text(html)
    });

    $("#apellido2").change(function(){
        var html;

        html=$("#apellido2").val();
        $("#apellido2Responsable").text(html)
    });

    $("#curp").change(function(){
        var html;

        html=$("#curp").val();
        $("#curpResponsable").text(html)
    });

    $("#cargo").change(function(){
        var html;

        html=$("#cargo").val();
        $("#cargoResponsable").text(html)
    });
});