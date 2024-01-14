$(document).ready(function(){
    $("#registrar").on('click', function(e){
        e.preventDefault();

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
            'folio':$("#folio").val(),
            'certificacion':$("#certificacion").val(),
            'alumno':$("#alumno").val(),
            'id':$("#id").val(),
            '_token':$("#token").val()
        }

        if(datosForm!=""){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type:'POST',
                url:'/expediciones/actualizar',
                data:datosForm,
                dataType:'json',
                encode:true
            }).done(function(respuesta){
                if(respuesta.exito){
                    Toast.fire({
                        icon:'success',
                        title: respuesta.mensaje
                    });

                    $("#registrar").attr('disabled', true);
                }else{
                    Toast.fire({
                        icon:'warning',
                        title: respuesta.mensaje
                    });

                    $("#registrar").attr('disabled', true);
                }
            });
        }else{
            Toast.fire({
                icon:'error',
                title: 'Actualización no ejecutada por falta de datos.'
            });

            $("#registrar").attr('disabled', true);
        }
    });
});