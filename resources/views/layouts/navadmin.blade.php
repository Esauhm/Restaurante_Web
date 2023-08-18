<nav class="navbar navbar-expand-lg bg-light mb-3 navbar-fixed">
    <div class="container">
        <a class="navbar-brand">Administrador</a>
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

     
                <li class="nav-item"><a class="nav-link" href="{{route('users.list')}}">Administrar usuarios</a></li> 

               

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="promocionesDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Promociones
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="promocionesDropdown">

                            {{-- <li><a class="dropdown-item" href="{{ route('admin.promocionesA') }}">Agregar promoción</a></li> --}}

                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="productosDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Productos
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="productosDropdown">
                         <li><a class="dropdown-item" href="{{ route('admin.productos') }}">Ver productos</a></li> 
                           <li><a class="dropdown-item" href="{{ route('productos.add') }}">Agregar producto</a></li> 
                            {{-- <li><a class="dropdown-item" href="{{ route('admin.productoE') }}">Editar producto</a></li> --}}
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="categoriasDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Categorias
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="categoriasDropdown">
                             <li><a class="dropdown-item" href="{{ route('categorias.create') }}">Agregar categoria</a></li>
                            <li><a class="dropdown-item" href="{{ route('categorias.editar') }}">Editar categoria</a></li> 
                        </ul>
                    </li>

                    <li>
                        <div class="collapse navbar-collapse" id="navbarScroll">
                            <ul class="navbar-nav ms-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-regular fa-user"></i> <span>{{ auth()->user()->name }}</span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li class="dropdown-item">
                                            <a class="dropdown-link" href="{{ route('usuario.perfil') }}">
                                                <i class="fas fa-user"></i> Mi perfil
                                            </a>
                                        </li>
                                        <li class="dropdown-item">
                                            <a class="dropdown-link" href="Usuario/pedido">
                                                <i class="fas fa-clipboard-list"></i> Mis pedidos
                                            </a>
                                        </li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li class="dropdown-item">
                                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                {{ __('Cerrar sesión') }} <i class="fa-solid fa-sign-out"></i>
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>

                        <li >
                            <a class="nav-link dropdown-toggle" href="#"  role="button"
                            data-bs-toggle="dropdown" aria-expanded="false" onclick="event.preventDefault(); document.getElementById('pedido-form').submit();">
                                <i class="fas fa-clipboard-list"></i> Atender Pedidos
                            </a>
                            
                            <form id="pedido-form" action="{{ route('admin.pedidos') }}" method="POST" style="display: none;">
                                @csrf
                                <input type="date" class="form-control" id="fecha_pedido" name="fecha_pedido">
                                <select id="id_estado" name="id_estado" class="form-control">
                                    <option value="">Todos</option>
                                    <option value="1">En proceso</option>
                                    <option value="2">Finalizado</option>
                                    <option value="3">Cancelado</option>
                                </select>
                            </form>
                        
                        </li> 
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>


