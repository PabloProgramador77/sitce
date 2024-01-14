$(document).ready(function(){
    $("#curp").change(function(){
        var datosForm={
            '_token':$("#token").val(),
            'curp':$("#curp").val()
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

        if(datosForm!=""){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type:'POST',
                url:'/responsables/verificarCurp',
                data:datosForm,
                dataType:'json',
                encode:true
            }).done(function(respuesta){
                if(respuesta.exito){
                    Toast.fire({
                        icon: 'error',
                        title: respuesta.error
                    });

                    $("#curp").val("");
                    $("#curp").focus();
                    $("#registrar").attr('disabled', true);
                }else{
                    Toast.fire({
                        icon:'info',
                        title: respuesta.error
                    });

                    $("#registrar").attr('disabled', false);
                }
            });
        }else{
            Toast.fire({
                icon:'error',
                title:'Datos insuficientes para verificar CURP.'
            });

            $("#curp").val("");
            $("#curp").focus();
            $("#registrar").attr('disabled', true);
        }
    });
});