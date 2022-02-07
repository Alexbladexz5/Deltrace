<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
    <div class="container">
        <div class="section-title">
            <span class="no_selection">Contacto</span>
            <h2>Contacto</h2>
        </div>
      <div class="col-lg-6 mx-auto">
        <form action="{{route('contact.store')}}" method="post" role="form" class="php-email-form">
          @csrf
          <div id="res"></div>
          <div class="row">
            <div class="col-md-6 form-group">
              <input type="text" name="name" class="form-control" id="name" placeholder="Introduce tu nombre" required>
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
              <input type="email" class="form-control" name="email" id="email" placeholder="Introduce tu email" required>
            </div>
          </div>
          <div class="form-group mt-3">
            <textarea class="form-control" name="msg" rows="5" placeholder="Introduce tu mensaje" required></textarea>
          </div>
          <div class="my-3">
            <div class="loading">Procesando
            </div>
            <div class="error-message"></div>
            <div class="sent-message">Tu mensaje ha sido enviado. ¡Muchas gracias!</div>
          </div>
          <div class="text-center"><button type="submit">Enviar mensaje</button></div>
        </form>
      </div>
    </div>
  </div>
</section>
{{--<script>
        $(document).ready(function(){
            $("#contact-frm").submit(function(e){
                e.preventDefault();
                let url = $(this).attr('action');
                $("#btn").attr('disabled', true);
                $.post(url, 
                {
                    '_token': $("#token").val(),
                    email: $("#email").val(),
                    name: $("#name").val(),
                    message: $("#msg").val()
                }, 
                function (response) {
                    if(response.code == 400){
                        $("#btn").attr('disabled', false);
                        let error = '<span class="alert alert-danger">'+response.msg+'</span>';
                        $("#res").html(error);
                    }else if(response.code == 200){
                        $("#btn").attr('disabled', false);
                        let success = '<span class="alert alert-success">'+response.msg+'</span>';
                        $("#res").html(success);
                    }
                });
                
                
            })
        })
    </script>--}}
<!-- End Contact Section -->