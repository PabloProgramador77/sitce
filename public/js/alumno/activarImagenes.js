$(document).ready(function(){
    $("#fotografia").change(function(){
        if($("#fotografia").val()!=""){
            $("#registrar").attr('disabled', false);
        }
    });

    $("#firma").change(function(){
        if($("#firma").val()!=""){
            $("#registrar").attr('disabled', false);
        }
    });
});