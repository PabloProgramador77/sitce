$(document).ready(function(){
    $("#recuperar").on('click', function(e){
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
            'email':$("#email").val(),
            '_token':$("#token").val()
        }

        function login(){
            window.location.href='/login';
        }

        if(datosForm!=""){
            $.ajax({
                type:'POST',
                url:'/institucion/recuperar',
                data: datosForm,
                dataType:'json',
                encode: true
            }).done(function(respuesta){
                if(respuesta.exito){
                    Toast.fire({
                        icon:'success',
                        title: respuesta.mensaje
                    });

                    $("#recuperar").attr('disabled', true);
                    setTimeout(login, 5000);
                }else{
                    Toast.fire({
                        icon: 'error',
                        title: respuesta.mensaje
                    });
                }
            });
        }
    });
});