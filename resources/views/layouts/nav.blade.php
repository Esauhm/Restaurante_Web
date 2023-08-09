
<nav class="navbar navbar-expand-lg bg-light navbar-fixed">

    <div class="container">
        <a class="navbar-brand" href="">PupuSA</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


        <!-- Opciones del menu -->
        <div class="offcanvas offcanvas-start half-screen" tabindex="-1" id="navbarNav"
            aria-labelledby="navbarNavLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="navbarNavLabel">Menú</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="offcanvas-body justify-content-between">
                <ul class="navbar-nav align-middle">
                    <li class="nav-item">
                        <a class="nav-link" href="">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Food">Comida</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Home/Nosotros">Nosotros</a>
                    </li>

                    <li>
                        <a class="nav-link" href="Home/promociones">Promociones</a>

                  
                    @if (Route::has('login'))
                    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                        @auth
                       <div class="collapse navbar-collapse" id="navbarScroll">
                            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll"
                                style="--bs-scroll-height: 100px;">

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class="fa-regular fa-user"></i> <span></span> Usuario
                                    </a>
                                    <ul class="dropdown-menu">
                                     <p>{{ auth()->user()->name }}</p>
                                        <a class="dropdown-item" href="Usuario/perfil">
                                            <i class="fas fa-user"></i> Mi perfil
                                        </a>
                                        <a class="dropdown-item" href="Usuario/pedido">
                                            <i class="fas fa-clipboard-list"></i> Mis pedidos
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="Auth/logout">      
                                                                                 
                                            <a href="{{ route('logout') }}"
                                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                {{ __('Cerrar sesion') }}  <i class="fa-solid fa-sign-out"></i>
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                style="display: none;">
                                                @csrf
                                            </form>
                                        </a>
                                    </ul>
                                </li>

                            </ul>

                        </div>

                        @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

                        @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                        @endif
                        @endauth
                    </div>

                    @endif
                </ul>
            </div>
        </div>
    </div>
</nav>