$(document).ready(function(){
    $("#registrar").on('click', function(e){
        e.preventDefault();

        var datosForm={
            '_token':$("#token").val(),
            'nombre':$("#nombre").val(),
            'idInstitucion':$("#idInstitucion").val(),
            'entidad':$("#entidad").val(),
            'email':$("#email").val(),
            'password':$("#password").val(),
            'terminos':$("#terminos").val()
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
            window.location.href='/login';
        }

        if($("#terminos").is(':checked')){
            if(datosForm!="" && $("#token").val()!=""){
                $.ajax({
                    type:'POST',
                    url:'/institucion/registrar',
                    data:datosForm,
                    dataType:'json',
                    encode:true
                }).done(function(respuesta){
                    if(respuesta.exito){
                        Toast.fire({
                            icon:'success',
                            title:respuesta.error
                        });

                        $("#nombre").val("");
                        $("#idInstitucion").val("");
                        $("#entidad").val("default");
                        $("#email").val("");
                        $("#password").val("");
                        $("#confirmarPassword").val("");
                        $("#terminos").checked('false');
                        $("#registrar").attr('disabled', true);

                        setTimeout(login, 5000);
                    }else{
                        Toast.fire({
                            icon:'error',
                            title: respuesta.error
                        });
                        $("#registrar").attr('disabled', true);
                    }
                });
            }else{
                Toast.fire({
                    icon:'error',
                    title:'Faltan datos para el registro. Intenta de nuevo.'
                });

                $("#registrar").attr('disabled', true);
            }
        }else{
            Toast.fire({
                icon:'warning',
                title:'Debes leer los terminos de privacidad.'
            });

            $("#registrar").attr('disabled', true);
        }
    });
});