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
                $.ajax({
                    url: "/contact",
                    type: "POST",
                    data: $('#ajax-contact-form').serialize(),
                    success: function(response) {
                        $('#submit').html('Submit');
                        $("#submit").attr("disabled", false);
                        alert('El formulario ha sido enviado correctamente');
                        document.getElementById("ajax-contact-form").reset();
                    }
                });
            }
        })
    }
}