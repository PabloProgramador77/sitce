$(document).ready(function(){
    $("#idAsignatura").change(function(){
        var html;

        html=$("#idAsignatura").val();
        $("#asignaturaId").text(html);
    });

    $("#nombre").change(function(){
        var html;

        html=$("#nombre").val();
        $("#nombreAsignatura").text(html);
    });

    $("#clave").change(function(){
        var html;

        html=$("#clave").val();
        $("#claveAsignatura").text(html);
    });

    $("#ciclo").change(function(){
        var html;

        html=$("#ciclo").val();
        $("#cicloAsignatura").text(html);
    });

    $("#creditos").change(function(){
        var html;

        html=$("#creditos").val();
        $("#creditosAsignatura").text(html);
    });

    $("#tipoAsignatura").change(function(){
        var html;

        html=$("#tipoAsignatura").val();
        $("#asignaturaTipo").text(html);
    });
});