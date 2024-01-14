$(document).ready(function(){
    $("#eliminar").on('click', function(e){
        e.preventDefault();

        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
              toast.addEventListener('mouseenter', Swal.stopTimer)
              toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });

        function asignaturas(){
            window.location.href='/asignaturas';
        }

        var datosForm={
            '_token':$("#token").val(),
            'id':$("#id").val()
        };

        if(datosForm!=""){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type:'POST',
                url:'/asignaturas/borrar',
                data:datosForm,
                dataType:'json',
                encode:true
            }).done(function(respuesta){
                if(respuesta.exito){
                    Toast.fire({
                        icon:'success',
                        title: respuesta.error
                    });

                    setTimeout(asignaturas, 3000);
                }else{
                    Toast.fire({
                        icon:'warning',
                        title: respuesta.error
                    });
                }
            });
        }else{
            Toast.fire({
                icon:'error',
                title:'Datos insuficientes para el borrado. Intente de nuevo.'
            });
        }
    });
});