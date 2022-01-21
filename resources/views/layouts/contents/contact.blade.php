<!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <span>Contacto</span>
          <h2>Contacto</h2>
          <p>Aquí le dejamos nuestro formulario de contacto.</p>
        </div>

        <div class="row d-flex justify-content-center" data-aos="fade-up">

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-envelope"></i>
              <h3>Envíenos un correo
              </h3>
              <p>deltrace@protonmail.com</p>
            </div>
          </div>

        </div>

        <div class="row d-flex justify-content-center" data-aos="fade-up">
          <div class="col-lg-6">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Tu nombre" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Tu correo" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Asunto" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Escribe aquí tu mensaje..." required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Procesando</div>
                <div class="error-message"></div>
                <div class="sent-message">Tu mensaje ha sido enviado, muchas gracias por contactar on nosotros.</div>
              </div>
              <div class="text-center"><button type="submit">Enviar mensaje</button></div>
            </form>
          </div>

        </div>

      </div>
    </section>
    <!-- End Contact Section -->