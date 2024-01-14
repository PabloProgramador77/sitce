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
            'nombre':$("#nombre").val(),
            'id':$("#id_ciclo").val(),
            '_token':$("#token").val()
        }

        $.ajax({
            type:'POST',
            url:'/ciclos/actualizar',
            data:datosForm,
            dataType:'json',
            encode:true
        }).done(function(respuesta){
            if(respuesta.exito){
                Toast.fire({
                    icon:'success',
                    title: respuesta.mensaje
                });

                $("#registrar").attr('disabled', true);
            }else{
                Toast.fire({
                    icon:'warning',
                    title: respuesta.mensaje
                });

                $("#registrar").attr('disabled', true);
            }
        });
    });
});