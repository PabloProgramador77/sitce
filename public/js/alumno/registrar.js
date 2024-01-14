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

        if($("#numeroControl").val()!="" && $("#nombre").val()!="" && $("#apellido").val()!="" && $("#curp").val()!="" && $("#genero").val()!='default' && $("#nacimiento").val()!="" && $("#carrera").val()!='default'){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type:'POST',
                url:'/alumnos/registrar',
                data:{
                    '_token':$("#token").val(),
                    'numeroControl':$("#numeroControl").val(),
                    'nombre':$("#nombre").val(),
                    'primerApellido':$("#apellido").val(),
                    'segundoApellido':$("#apellido2").val(),
                    'curp':$("#curp").val(),
                    'genero':$("#genero").val(),
                    'fechaNacimiento':$("#nacimiento").val(),
                    'carrera':$("#carrera").val()
                },
                dataType:'json',
                encode:true
            }).done(function(respuesta){
                if(respuesta.exito){
                    Toast.fire({
                        icon:'success',
                        title: respuesta.error
                    });

                    $("#numeroControl").val("");
                    $("#nombre").val("");
                    $("#apellido").val("");
                    $("#apellido2").val("");
                    $("#curp").val("");
                    $("#genero").val("default");
                    $("#nacimiento").val("");
                    $("#carrera").val("default");
                    $("#registrar").attr('disabled', true);
                }else{
                    Toast.fire({
                        icon:'warning',
                        title: respuesta.error
                    });
                    
                    $("#registrar").attr('disabled', true);
                }
            });
        }else{
            Toast.fire({
                icon:'error',
                title:'Datos insuficientes para el registro. Completa el formulario.'
            });

            $("#registrar").attr('disabled', true);
        }
    });
});