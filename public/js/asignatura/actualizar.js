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
            'idAsignatura':$("#idAsignatura").val(),
            'nombre':$("#nombre").val(),
            'clave':$("#clave").val(),
            'ciclo':$("#ciclo").val(),
            'creditos':$("#creditos").val(),
            'tipoAsignatura':$("#tipoAsignatura").val(),
            'id':$("#id").val(),
            'carrera':$("#carrera").val()
        };

        if(datosForm!=""){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type:'POST',
                url:'/asignaturas/actualizar',
                data:datosForm,
                dataType:'json',
                encode:true
            }).done(function(respuesta){
                if(respuesta.exito){
                    Toast.fire({
                        icon:'success',
                        title: respuesta.error
                    });

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
                title:'Datos insuficientes para la actualización.'
            });

            $("#registrar").attr('disabled', true);
        }
    })
});