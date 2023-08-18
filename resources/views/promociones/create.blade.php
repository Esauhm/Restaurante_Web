@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="mt-5">
        <i class="fas fa-plus-circle"></i> Guardar Promoción
    </h1>
    <form class="mt-5" action="{{ route('productos.create') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="es_promocion" value="1">
        <div class="form-group row mb-3">
            <label for="titulo" class="col-sm-2 col-form-label">
                <i class="fas fa-signature"></i> Título:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="titulo" name="nombre" required>
            </div>
        </div>

        <div class="form-group mb-3">
            <label for="descripcion"><i class="fas fa-align-left"></i> Descripción:</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="4" cols="50" required></textarea>
        </div>

        <div class="form-group row mb-3">
            <label for="imagen" class="col-sm-3 col-form-label"><i class="fas fa-image"></i> Imagen:</label>
            <div class="col-sm-9">
                <input type="file" class="form-control" id="imagen" name="image_url" accept="image/*" required>
            </div>
        </div>

        <div class="form-group row mb-3">
            <label for="precio" class="col-sm-3 col-form-label"><i class="fas fa-dollar-sign"></i> Precio:</label>
            <div class="col-sm-9">
                <input type="number" class="form-control" id="precio" name="precio" step="0.01" min="0" required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3"><i class="fas fa-plus-circle"></i> Guardar
        promoción</button>
    </form>
</div>
@endsection