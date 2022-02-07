<!-- ======= Services Section ======= -->
<section id="services" class="services">
    <div class="container">

        <div class="section-title">
            <span class="no_selection">Funciones</span>
            <h2>Funciones</h2>
            <p>Aquí encontrareís un resumen de las funciones de nuestro proyecto</p>
        </div>
        <div class="row">
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-file"></i></div>
              <h4><a>Panel de administración</a></h4>
              <p>Desde nuestro panel de administración se puede gestionar cualquier aspecto referente a los usuarios,las rutas y los puntos de entrega</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="150">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-world"></i></div>
              <h4><a href="{{route('app')}}">Cálculo de rutas</a></h4>
              <p>Realiza tus cálculos de rutas para encontrar la más rápida incluyendo tantas paradas como necesites.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="300">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-tachometer"></i></div>
              <h4><a>Velocidad</a></h4>
              <p>El tiempo de resolución para encontrar la ruta más rápida es inferior a "INTRODUCIR TIEMPO PROMEDIO
              DE CÁLCULO DE RUTA" segundos</p>
            </div>
          </div>
        </div>

    </div>

    </div>

    @include('layouts.contents.cta')

</section>
<!-- End Services Section -->
