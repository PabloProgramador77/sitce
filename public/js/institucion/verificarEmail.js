$(document).ready(function(){
    $("#email").change(function(){
        var datosForm={
            '_token':$("#token").val(),
            'email':$("#email").val()
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
                url:'/institucion/verificarEmail',
                data:datosForm,
                dataType:'json',
                encode:true
            }).done(function(respuesta){
                if(respuesta.exito){
                    Toast.fire({
                        icon:'error',
                        title: respuesta.error
                    });

                    $("#email").val("");
                    $("#email").focus();
                    $("#registrar").attr('disabled', true);
                }else{
                    Toast.fire({
                        icon:'info',
                        title: respuesta.error
                    });

                    $("#registrar").attr('disabled', false);
                    $("#actualizar").attr('disabled', false);
                }
            });
        }else{
            Toast.fire({
                icon:'error',
                title:'Faltan datos para la verificación de correo electrónico.'
            });

            $("#email").val("");
            $("#email").focus();
        }
    })
});