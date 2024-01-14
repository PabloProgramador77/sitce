$(document).ready(function(){
    $("#idInstitucion").change(function(){
        var datosForm={
            '_token':$("#token").val(),
            'idInstitucion':$("#idInstitucion").val()
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
                url:'/institucion/verificarId',
                data:datosForm,
                dataType:'json',
                encode:true
            }).done(function(respuesta){
                if(respuesta.exito){
                    Toast.fire({
                        icon:'warning',
                        title: respuesta.error
                    });

                    $("#idInstitucion").val("");
                    $("#idInstitucion").focus();
                    $("#registrar").attr('disabled', true);
                }else{
                    Toast.fire({
                        icon:'info',
                        title: respuesta.error
                    });

                    $("#registrar").attr('disabled', false);
                }
            });
        }else{
            Toast.fire({
                icon:'error',
                title:'Faltan datos para la verificación de ID.'
            });

            $("#idInstitucion").val("");
            $("#idInstitucion").focus();
            $("#registrar").attr('disabled', true);
        }
    })
});