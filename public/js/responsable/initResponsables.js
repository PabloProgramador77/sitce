$(document).ready(function(){
    var datosForm={
        '_token':$("#token").val()
    }

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

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function carreras(){
        window.location.href="/carreras";
    }

    $.ajax({
        type:'POST',
        url:'/responsables/init',
        data: datosForm,
        dataType:'json',
        encode: true
    }).done(function(respuesta){
        if(!respuesta.exito){
            Toast.fire({
                icon:'error',
                title: respuesta.error
            });

            $("#nuevo").attr('disabled', true);
            setTimeout(carreras, 3000);
        }
    });
});