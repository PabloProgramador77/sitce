$(document).ready(function(){
    $("#certificacion").change(function(){
        if($("#certificacion").val()!=""){
            $("#registrar").attr('disabled', false);
        }
    });
});