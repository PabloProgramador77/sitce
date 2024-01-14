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
            'apellido':$("#apellido").val(),
            'apellido2':$("#apellido2").val(),
            'curp':$("#curp").val(),
            'cargo':$("#cargo").val(),
            'archivoCer':$("#cer").prop('files')[0],
            'archivoKey':$("#key").prop('files')[0],
            'passwordKey':$("#passwordKey").val()
        };

        if(datosForm!=""){
            $.ajax({
                type:'GET',
                url:'/responsables/registrar',
                data:datosForm,
                dataType:'json',
                encode:true
            }).done(function(respuesta){
                if(respuesta){
                    if(respuesta.exito){
                        Toast.fire({
                            icon:'success',
                            title:'Responsable registrado.'
                        });

                        $("#nombre").val("");
                        $("#apellido").val("");
                        $("#apellido2").val("");
                        $("#curp").val("");
                        $("#cargo").val("default");
                        $("#cer").val("");
                        $("#key").val("");
                        $("#passwordKey").val("");
                    }else{
                        Toast.fire({
                            icon:'warning',
                            title:'Registro interrumpido. Intenta de nuevo.'
                        });
                    }
                }else{
                    Toast.fire({
                        icon:'error',
                        title:'Error al realizar el registro.'
                    });
                }
            });
        }else{
            Toast.fire({
                icon:'error',
                title:'Datos insuficientes para el registro.'
            });
        }
    });
});