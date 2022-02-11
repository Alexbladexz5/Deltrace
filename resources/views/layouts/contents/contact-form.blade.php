<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
    <div class="container">
        <div class="section-title">
            <span class="no_selection">Contacto</span>
            <h2>Contacto</h2>
        </div>
      <div class="col-lg-6 mx-auto">
        <form role="form" class="php-email-form" id="php-email-form">
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
            <textarea class="form-control" id="message" name="message" rows="5" placeholder="Introduce tu mensaje" required></textarea>
          </div>
          <div class="my-3">
            <div class="loading">Procesando
            </div>
            <div class="error-message"></div>
            <div class="sent-message">Tu mensaje ha sido enviado. ¡Muchas gracias!</div>
          </div>
          <div class="text-center"><button class="contactformButton" id="submitButton">Enviar mensaje</button></div>
        </form>
      </div>
    </div>
  </div>
</section>
<!-- End Contact Section -->