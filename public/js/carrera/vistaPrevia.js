$(document).ready(function(){
    $("#nombre").change(function(){
        var html;

        html=$("#nombre").val();
        $("#nombreCarrera").text(html);
    });

    $("#idCarrera").change(function(){
        var html;

        html=$("#idCarrera").val();
        $("#carreraId").text(html);
    });

    $("#clave").change(function(){
        var html;

        html=$("#clave").val();
        $("#claveCarrera").text(html);
    });

    $("#clavePlan").change(function(){
        var html;

        html=$("#clavePlan").val();
        $("#planClave").text(html);
    });

    $("#periodo").change(function(){
        var html;

        html=$("#periodo").val();
        $("#tipoPeriodo").text(html);
    });

    $("#nivelEstudios").change(function(){
        var html;

        html=$("#nivelEstudios").val();
        $("#nivelEstudio").text(html);
    });

    $("#calificacionMinima").change(function(){
        var html;

        html=$("#calificacionMinima").val();
        $("#califMinima").text(html);
    });

    $("#calificacionMaxima").change(function(){
        var html;

        html=$("#calificacionMaxima").val();
        $("#califMaxima").text(html);
    });

    $("#calificacionAprobatoria").change(function(){
        var html;

        html=$("#calificacionAprobatoria").val();
        $("#califAprobatoria").text(html);
    });

    $("#rvoe").change(function(){
        var html;

        html=$("#rvoe").val();
        $("#numeroRvoe").text(html);
    });

    $("#fechaRvoe").change(function(){
        var html;

        html=$("#fechaRvoe").val();
        $("#rvoeFecha").text(html);
    });
});