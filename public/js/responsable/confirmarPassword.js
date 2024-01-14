$(document).ready(function(){
    $("#confirmarPasswordKey").change(function(){
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

        if($("#passwordKey").val()!=$("#confirmarPasswordKey").val()){
            Toast.fire({
                icon:'warning',
                title:'Las contraseñas no coinciden. Intenta de nuevo.'
            });

            $("#passwordKey").val("");
            $("#confirmarPasswordKey").val("");

            $("#passwordKey").focus();
            $("#registrar").attr('disabled', true);
        }else{
            $("#registrar").attr('disabled', false);
        }
    });
});