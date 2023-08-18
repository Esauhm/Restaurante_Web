<link rel="stylesheet" href="/css/cardfood.css">
<link rel="stylesheet" href="/css/food.css">

@extends('layouts.app')

@section('content')
<div class="container pt-2">

  
    @guest
    <div class="text-center alert alert-info" role="alert">
            <h5>Debes iniciar sesión para agregar las promociones.</h5>
        </div>
        @endguest

    
    <div class="container pt-2 mt-3">
        <div class="products">
            @foreach($productos as $producto)
                @if($producto->estado == 1)
                    <div class="product">
                        <div class="image">
                          <img class="imgt" src="{{ $producto->image_url }}" alt=""> 
                        </div>
                        <div class="namePrice">
                            <h3>{{ $producto->nombre }}</h3>
                            <span>{{ "$ " . $producto->precio }}</span>
                        </div>
                        <p class="mb-5">{{ $producto->descripcion_prod }}</p>
                        @if(session('user'))
                            <form method="POST" action="{{ route('carrito.agregarProducto') }}">
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
                        @endif
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
@endsection