$(document).ready(function(){
    $("#cobrarArchivo").on('click', function(e){
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

        //e.preventDefault();
        //console.log('ID Archivo XML: '+e.target.parentNode.dataset['archivoid']);
        $.ajax({
            type:'POST',
            url:'/xml/cobrar',
            data:{
                'id':e.target.parentNode.dataset['archivoid'],
                '_token':$("#token").val()
            },
            dataType:'json',
            encode: true
        }).done(function(respuesta){
            if(respuesta.exito==false){
                Toast.fire({
                    icon:'warning',
                    title:respuesta.mensaje
                });
            }
        })

    });
});