@extends('layouts.app')
@section('content')

<div class="container">
    <h1 class="mt-5">Actualizar Producto</h1>
    <form method="post" enctype="multipart/form-data" action="{{ route('actualizar.producto') }}">
        @csrf
        <input type="hidden" name="id" value="{{ $producto->id_producto }}">
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $producto->nombre}}">
        </div>
        <div class="form-group">
            <label for="precio">Precio</label>
            <input type="text" class="form-control" id="precio" name="precio" value="{{ $producto->precio }}">
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion">{{ $producto->descripcion_prod }}</textarea>
        </div>
        <div class="form-group">
            <label for="categoria">Categoría:</label>
            <select class="form-control" id="categoria" name="categoria" required>
                @foreach($categorias as $categoria)
                    @php $selected = ($categoria->id_categoria == $producto->categoria) ? 'selected' : ''; @endphp
                    <option value="{{ $categoria->id_categoria }}" {{ $selected }}>{{ $categoria->descripcion }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="estado">Estado:</label>
            <select class="form-control" id="estado" name="estado" required>
                <option value="1" {{ ($producto->estado == 1) ? 'selected' : '' }}>Disponible</option>
                <option value="2" {{ ($producto->estado == 2) ? 'selected' : '' }}>No disponible</option>
            </select>
        </div>
        <div class="form-group row mb-3">
            <label for="image_url" class="col-sm-3 col-form-label"><i class="fas fa-image"></i> Subir imagen:</label>
            <div class="col-sm-9">
                <!-- Mostrar la imagen actual 
                <img src="{{ $producto->image_url }}" alt="Imagen del Producto" style="max-width: 25%;">-->
                
                <!-- Input para actualizar la imagen -->
                <input type="file" class="form-control" id="image_url" name="image_url" accept="image/*" value="{{$producto->image_url}}">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection