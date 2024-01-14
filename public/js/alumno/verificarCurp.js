$(document).ready(function(){
    $("#curp").change(function(e){

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

        if($("#curp").val()!=null && $("#curp").val()!=""){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type:'POST',
                url:'/alumnos/verificarCurp',
                data:{
                    '_token':$("#token").val(),
                    'curp':$("#curp").val()
                },
                dataType:'json',
                encode:true
            }).done(function(respuesta){
                if(respuesta.exito){
                    Toast.fire({
                        icon:'warning',
                        title: respuesta.error
                    });

                    $("#curp").val("");
                    $("#curp").focus();
                    $("#registrar").attr('disabled', true);
                }else{
                    Toast.fire({
                        icon:'info',
                        title: respuesta.error
                    })

                    $("#registrar").attr('disabled', false);
                }
            });
        }else{
            Toast.fire({
                icon:'error',
                title:'CURP invalido. Intente de nuevo.'
            });

            $("#curp").focus();
            $("#registrar").attr('disabled', true);
        }
    });
});