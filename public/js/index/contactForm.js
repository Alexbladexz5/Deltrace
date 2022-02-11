function validateForm() {

    if ($("#php-contact-form").length > 0) {
        $("#php-contact-form").validate({
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
    let datos = {
        name:$("#name").val(),
        email:$("#email").val(),
        message:$("#message").val(),
    }

    var info = JSON.stringify(datos);
    
    $.ajax({
                    url: "/contact",
                    type: "post",
                    data: info,
                    headers: { 
                        'X-CSRF-TOKEN': $('input[name="_token"]').val()
                    },
                    contentType: "application/json",
                    success: function(response) {
                        $('#submit').html('Submit');
                        $("#submit").attr("disabled", false);
                        alert('El formulario ha sido enviado correctamente');
                        // $('#php-email-form').trigger("reset");
                    },
                    error: function(response){
                        console.log(response)
                        alert("Error al enviar el correo")
                    }
                });

})