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

        function perfil(){
            window.location.href='/perfil';
        }

        var datosForm={
            '_token':$("#token").val(),
            'nombre':$("#nombre").val(),
            'campus':$("#campus").val(),
            'idInstitucion':$("#idInstitucion").val(),
            'idCampus':$("#idCampus").val(),
            'idEntidadFederativa':$("#entidadFederativa").val()
        };

        if(datosForm!="" && $("#token").val()!=""){
            $.ajax({
                type:'POST',
                url:'/institucion/actualizarPerfil',
                data:datosForm,
                dataType:'json',
                encode:true
            }).done(function(respuesta){
                if(respuesta.exito){
                    Toast.fire({
                        icon:'success',
                        title: respuesta.error
                    });

                    $("#actualizar").attr('disabled', true);
                    setTimeout(perfil, 5000);
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
                title:'Datos insuficientes para la actualización.'
            });
        }
    })
});