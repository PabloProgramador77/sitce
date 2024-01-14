$(document).ready(function(){
    $("#nombre").change(function(){
        if($("#nombre").val()!=""){
            var html;
            html=$("#nombre").val();
            $("#nombreciclo").text(html);
        }
    });
});