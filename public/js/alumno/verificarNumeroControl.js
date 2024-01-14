$(document).ready(function(){
    $("#numeroControl").change(function(e){

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

        var datosForm={
            '_token':$("#token").val(),
            'numeroControl':$("#numeroControl").val()
        };

        if(datosForm!=""){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type:'POST',
                url:'/alumnos/verificarNumeroControl',
                data:datosForm,
                dataType:'json',
                encode:true
            }).done(function(respuesta){
                if(respuesta.exito){
                    Toast.fire({
                        icon:'warning',
                        title: respuesta.error
                    });

                    $("#numeroControl").val("");
                    $("#numeroControl").focus();
                    $("#registrar").attr('disabled', true);
                }else{
                    Toast.fire({
                        icon: 'info',
                        title: respuesta.error
                    });

                    $("#registrar").attr('disabled', false);
                }
            });
        }else{
            Toast.fire({
                icon:'error',
                title:'Datos insuficientes para la verificación.'
            });

            $("#numeroControl").val("");
            $("#numeroControl").focus();
            $("#registrar").attr('disabled', true);
        }
    });
});