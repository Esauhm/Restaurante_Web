@php
    use App\Http\Controllers\Admincontroller;

    
    $adminController = new Admincontroller();
@endphp

@extends('layouts.app')
@section('content')
<div class="container">
  <h1 class="mt-5">Listado de Productos</h1>
  <div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th style="display:none;" scope="col">#</th>
          <th scope="col">Nombre</th>
          <th scope="col">Precio</th>
          <th scope="col">Descripción</th>
          <th scope="col">Categoría</th>
          <th scope="col">Imagen</th>
          <th scope="col">Estado</th>
          <th scope="col">Editar</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($productos as $producto)
        <tr>
          <th style="display:none;" scope="row">{{ $producto->id_producto }}</th>
          <td>{{ $producto->nombre }}</td>
          <td>{{ $producto->precio }}</td>
          <td>{{ $producto->descripcion_prod }}</td>
          <td>{{ $producto->categoria}}</td>
          <td>
            <img src="{{ $producto->image_url }}" alt="Imagen del producto" width="100">
          </td> 
          <td>
          {!! $adminController->mostrarEstadoProducto($producto) !!}    
          </td>
          <td>
            <form action="{{route('producto.editar')}}">
              @csrf
              <input type="hidden" name="id_producto" value="{{ $producto->id_producto   }}">
              <button type="submit" class="btn btn-primary">Editar</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection