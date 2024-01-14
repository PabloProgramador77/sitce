$(document).ready(function(){
    $("#idCampus").change(function(){
        var datosForm={
            '_token':$("#token").val(),
            'idCampus':$("#idCampus").val()
        };

        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 5000,
            timerProgressBar: true,
            didOpen: (toast) => {
              toast.addEventListener('mouseenter', Swal.stopTimer)
              toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });

        if(datosForm!="" && $("#token").val()!=""){
            $.ajax({
                type:'POST',
                url:'/institucion/verificarCampus',
                data:datosForm,
                dataType:'json',
                encode:true
            }).done(function(respuesta){
                if(respuesta.exito){
                    Toast.fire({
                        icon:'error',
                        title: respuesta.error
                    });

                    $("#idCampus").val("");
                    $("#idCampus").focus();
                    $("#actualizar").attr('disabled', true);
                }else{
                    Toast.fire({
                        icon:'info',
                        title: respuesta.error
                    });

                    $("#actualizar").attr('disabled', false);
                }
            });
        }else{
            Toast.fire({
                icon:'error',
                title:'Datos insuficientes para la verificación de RVOE.'
            });

            $("#idCampus").val("");
            $("#idCampus").focus();
            $("#actualizar").attr('disabled', true);
        }
    })
});