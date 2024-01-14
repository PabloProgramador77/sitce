$(document).ready(function(){
    $("#rvoe").change(function(){
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
            'rvoe':$("#rvoe").val()
        };

        if(datosForm!=""){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type:'POST',
                url:'/carreras/verificarRvoe',
                data:datosForm,
                dataType:'json',
                encode:true
            }).done(function(respuesta){
                if(respuesta.exito){
                    Toast.fire({
                        icon:'error',
                        title: respuesta.error
                    });

                    $("#registrar").attr('disabled', true);
                    $("#rvoe").val("");
                    $("#rvoe").focus();
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
                title:'Datos insuficientes para la verificación de RVOE.'
            });

            $("#rvoe").val("");
            $("#rvoe").focus();

            $("#registrar").attr('disabled', true);
        }
    });
});