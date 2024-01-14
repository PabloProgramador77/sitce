$(document).ready(function(){
    $("#nombre").change(function(){
        var html;

        html=$("#nombre").val();
        $(".profile-username").text(html);
    });

    $("#campus").change(function(){
        var html;

        html=$("#campus").val();
        $("#nombreCampus").text(html);
    });

    $("#idInstitucion").change(function(){
        var html;

        html=$("#idInstitucion").val();
        $("#InstitucionId").text(html);
    });

    $("#idCampus").change(function(){
        var html;

        html=$("#idCampus").val();
        $("#campusId").text(html);
    });

    $("#entidadFederativa").change(function(){
        var html;

        html=$("#entidadFederativa").val();
        $("#edo").text(html);
    });

    $("#email").change(function(){
        var html;

        html=$("#email").val();
        $("#emailInstitucion").text(html);
    });
});