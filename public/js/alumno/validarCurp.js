$(document).ready(function(){
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
    
    $("#curp").change(function(){
        $("#curp").validate({
            rules:{
                required: true,
                minlength: 18,
                maxlength: 18
            },
            messages:{
                required: Toast.fire({
                    icon:'warning',
                    title:'CURP obligatorio'
                }),
                minlength: Toast.fire({
                    icon:'warning',
                    title:'Mínimo son 18 caracteres en el CURP.'
                }),
                maxlength: Toast.fire({
                    icon:'warning',
                    title:'Máximo de caracteres excedido.'
                })
            }
        });
    })
});