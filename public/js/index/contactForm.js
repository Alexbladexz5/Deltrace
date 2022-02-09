function validateForm() {

    if ($("#ajax-contact-form").length > 0) {
        $("#ajax-contact-form").validate({
            rules: {
                name: {
                    required: true,
                    maxlength: 50
                },
                email: {
                    required: true,
                    maxlength: 50,
                    email: true,
                },
                subject: {
                    required: true,
                    maxlength: 100
                },
                description: {
                    required: true,
                    maxlength: 300
                },
            },
            messages: {
                name: {
                    required: "Introduce un nombre por favor.",
                    maxlength: "La longitud máxima del nombre son 50 caracteres."
                },
                email: {
                    required: "Introduce un correo por favor.",
                    email: "Introduce un correo válido por favor.",
                    maxlength: "La longitud máxima del correo son 50 caracteres.",
                },
                subject: {
                    required: "Introduce un asunto por favor.",
                    maxlength: "La longitud máxima del asunto son 100 caracteres."
                },
                description: {
                    required: "Introduce una descripción por favor.",
                    maxlength: "La longitud máxima del mensaje son 300 caracteres."
                },
            },
            submitHandler: function(form) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $('#submit').html('Por favor espere...');
                $("#submit").attr("disabled", true);
                
            }
        })
    }
}

const button = document.getElementById("submitButton")
button.addEventListener('click', elemento => {
    elemento.preventDefault()
    let dato = {
        name:$("#name").val(),
        email:$("#email").val(),
        msg:$("#msg").val()
    }
    $.ajax({
                    url: "/contact",
                    type: "POST",
                    data: dato,
                    contentType: "application/json",
                    success: function(response) {
                        $('#submit').html('Submit');
                        $("#submit").attr("disabled", false);
                        alert('El formulario ha sido enviado correctamente');
                        document.getElementById("ajax-contact-form").reset();
                    },
                    error: function(response){
                        alert("Error a chuparla")
                    }
                });

})