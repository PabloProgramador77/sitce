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

        if(datosForm!=""){
            $.ajax({
                type:'POST',
                url:'/institucion/verificarEmail',
                data:datosForm,
                dataType:'json',
                encode:true
            }).done(function(respuesta){
                if(respuesta.exito==false){
                    Toast.fire({
                        icon:'info',
                        title:'EMAIL no encontrado en el sistema.'
                    });

                    $("#email").val("");
                    $("#email").focus();
                }
            });
        }else{
            Toast.fire({
                icon:'error',
                title:'Datos insuficientes para la verificación de cuenta.'
            });

            $("#email").val("");
            $("#email").focus();
        }
    })
});