
<link rel="stylesheet" href="/css/cardfood.css">
<link rel="stylesheet" href="/css/food.css">

@extends('layouts.app')

@section('content')
<div class="container pt-2">

    <div class="row">
        <h1 class="text-center mt-3" style="color: #c43f3f;">Listado de productos</h1>

        <form method="GET" action="{{ route('food.index') }}" class="mb-4 form-inline col">
            <div class="form-group d-flex">
                <label for="categoria" class="sr-only">Categoría:</label>
                <select name="categoria" class="form-control">
                    <option value="">Todas las categorías</option>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id_categoria }}">{{ $categoria->descripcion }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-primary ms-2 ml-2 ml-auto">Filtrar</button>
            </div>
        </form>
    </div>

    @guest
    <!-- Código para agregar al carrito -->
    <div class="text-center alert alert-info" role="alert">
        <h5>Debes iniciar sesión para agregar productos al carrito.</h5>
    </div>
    @endguest

    <div class="container pt-2">
        <div class="products">
            @foreach ($productos as $producto)
                @if ($producto->estado == 1)
                    <div class="product">
                        <div class="image">
                       <!--     {{-- <img class="imgt" src="{{ $producto->getImageUrl() }}" alt=""> --}}-->
                        </div>
                        <div class="namePrice">
                            <h3>{{ $producto->nombre }}</h3>
                            <span>{{ "$ " . $producto->precio }}</span>
                        </div>
                        <p class="mb-5">{{ $producto->descripcion_prod }}</p>
                        @auth
                            <form method="POST" action="{{ route('carrito.agregar') }}">
                                @csrf
                                <input type="hidden" name="id_producto" value="{{ $producto->id_producto }}">
                                <div class="bay">
                                    <div style="display: flex; align-items: center;">
                                        <div class="stars">
                                            <input type="number" name="cantidad" value="1" min="1" max="10">
                                        </div>
                                        <button type="submit">Agregar al carrito</button>
                                    </div>
                                </div>
                            </form>
                        @endauth
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
@endsection
