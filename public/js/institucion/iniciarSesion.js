$(document).ready(function(){
    $("#entrar").on('click', function(e){
        e.preventDefault();

        var datosForm={
            '_token':$("#token").val(),
            'email':$("#email").val(),
            'password':$("#password").val()
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

        function login(){
            window.location.href='/';
        }

        if(datosForm!=""){
            $.ajax({
                type:'POST',
                url:'/institucion/login',
                data:datosForm,
                dataType:'json',
                encode:true
            }).done(function(respuesta){
                if(respuesta.exito){
                    Toast.fire({
                        icon:'success',
                        title:'¡Bienvenido! Un gusto tenerte de vuelta. Espera un momento.'
                    });

                    setTimeout(login, 5000);
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
                title:'Datos insuficientes para iniciar sesión.'
            });

            $("#email").val("");
            $("#password").val("");
        }
    });
});