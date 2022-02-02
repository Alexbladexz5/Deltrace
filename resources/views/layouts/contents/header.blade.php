<!-- ======= Header ======= -->

<link src="{{ asset('css/index/header.css')}}" rel="stylesheet">
  <header id="header" class="d-flex align-items-center">
    <div id="nav-header" class="container d-flex align-items-center justify-content-between">
    
      <h1 class="logo"><a href="{{route('index')}}">Deltrace</a></h1>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Inicio</a></li>
          <li><a class="nav-link scrollto" href="#services">Funciones</a></li>
          <li><a class="nav-link scrollto" href="#pricing">Pricing</a></li>
          <li><a class="nav-link scrollto" href="#team">Equipo</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contacto</a></li>
          @if(Auth::user())
          <li class="dropdown"><a href="#"><span>{{Auth::user()->name}}</span><i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="{{route('app.profile')}}">Perfil</a></li>
              <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar sesión</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
              </form>
            </ul>
          </li>
          @else
          <li><a class="nav-link scrollto" href="login">Iniciar sesión</a></li>
          @endif
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
      <!-- .navbar -->
    </div>
  </header>
  <!-- End Header -->