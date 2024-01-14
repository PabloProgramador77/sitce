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
            'id':$("#idCarrera").val(),
            'nombre':$("#nombre").val(),
            'idCarrera':$("#id").val(),
            'clave':$("#clave").val(),
            'clavePlan':$("#clavePlan").val(),
            'periodo':$("#periodo").val(),
            'nivel':$("#nivelEstudios").val(),
            'rvoe':$("#rvoe").val(),
            'fechaRvoe':$("#fechaRvoe").val(),
            'calificacionMinima':$("#calificacionMinima").val(),
            'calificacionMaxima':$("#calificacionMaxima").val(),
            'calificacionAprobatoria':$("#calificacionAprobatoria").val()
        };

        function carreras(){
            window.location.href='/carreras';
        }

        if(datosForm!=""){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type:'POST',
                url:'/carreras/actualizar',
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
                    setTimeout(carreras, 3000);
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
    });
});