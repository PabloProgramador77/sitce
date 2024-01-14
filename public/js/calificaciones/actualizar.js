$(document).ready(function(){
    $("#registrar").on('click', function(e){
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

        var datosForm={
            '_token':$("#token").val(),
            'id':$("#id").val(),
            'idAlumno':$("#idAlumno").val(),
            'calificacion':$("#calificacion").val(),
            'observacion':$("#observaciones").val(),
            'estatus':$("#estatus").val()
        }

        function alumno(){
            window.location.href='/alumnos/ver/'.$("#idAlumno").val();
        }

        if(datosForm!=""){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type:'POST',
                url:'/calificaciones/actualizar',
                data:datosForm,
                dataType:'json',
                encode:true
            }).done(function(respuesta){
                if(respuesta.exito){
                    Toast.fire({
                        icon:'success',
                        title: respuesta.error
                    });

                    setTimeout(alumno, 3000);
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
    });
});