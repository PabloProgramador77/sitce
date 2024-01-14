$(document).ready(function(){
    $("#folio").change(function(){
        if($("#folio").val()!=""){
            var datosForm={
                'folio':$("#folio").val(),
                '_token':$("#token").val()
            }

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
                    url:'/expediciones/verificarFolio',
                    data:datosForm,
                    dataType:'json',
                    encode:true
                }).done(function(respuesta){
                    if(respuesta.exito){
                        Toast.fire({
                            icon:'warning',
                            title: respuesta.mensaje
                        });

                        $("#folio").val("");
                        $("#folio").focus();
                        $("#registrar").attr('disabled', true);
                    }else{
                        Toast.fire({
                            icon:'info',
                            title: respuesta.mensaje
                        });

                        $("#registrar").attr('disabled', false);
                    }
                });
            }else{
                Toast.fire({
                    icon:'error',
                    title:'Datos no suficientes para la verificación.'
                });

                $("#registrar").attr('disabled', true);
            }
        }
    });
});