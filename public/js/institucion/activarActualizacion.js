$(document).ready(function(){
    $("#nombre").change(function(){
        $("#registrar").attr('disabled', false);
    });

    $("#campus").change(function(){
        $("#registrar").attr('disabled', false);
    });

    $("#entidadFederativa").change(function(){
        $("#registrar").attr('disabled', false);
    });
});