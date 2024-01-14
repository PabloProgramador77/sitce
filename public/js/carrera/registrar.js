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
            '_token':$("#token").val(),
            'nombre':$("#nombre").val(),
            'idCarrera':$("#id").val(),
            'clave':$("#clave").val(),
            'clavePlan':$("#clavePlan").val(),
            'rvoe':$("#rvoe").val(),
            'fechaRvoe':$("#fechaRvoe").val(),
            'periodo':$("#periodo").val(),
            'nivel':$("#nivelEstudios").val(),
            'calificacionMinima':$("#calificacionMinima").val(),
            'calificacionMaxima':$("#calificacionMaxima").val(),
            'calificacionAprobatoria':$("#calificacionAprobatoria").val()
        };

        if(datosForm!=""){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type:'POST',
                url:'/carreras/registrar',
                data:datosForm,
                dataType:'json',
                encode:true
            }).done(function(respuesta){
                if(respuesta.exito){
                    Toast.fire({
                        icon:'success',
                        title: respuesta.error
                    });

                    $("#nombre").val("");
                    $("#id").val("");
                    $("#clave").val("");
                    $("#periodo").val("default");
                    $("#nivelEstudios").val("default");
                    $("#rvoe").val("");
                    $("#fechaRvoe").val("");
                    $("#calificacionMinima").val("default");
                    $("#calificacionMaxima").val("default");
                    $("#calificacionAprobatoria").val("default");
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
                title:'Datos insuficientes para el registro.'
            });

            $("#registrar").attr('disabled', true);
        }
    });
});