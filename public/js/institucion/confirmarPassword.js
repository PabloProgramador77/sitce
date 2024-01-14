$(document).ready(function(){
    $("#confirmarPassword").change(function(){
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

        if($("#confirmarPassword").val()!=$("#password").val()){
            Toast.fire({
                icon:'warning',
                title:'La contraseña no coincide. Intenta de nuevo.'
            });

            $("#confirmarPassword").val("");
            $("#password").val("");
            $("#password").focus();
            $("#registrar").attr('disabled', true);
        }else{
            $("#registrar").attr('disabled', false);
        }
    });
});