@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mt-5">Editar categoría</h1>
    <form method="post" action="{{ route('categorias.update', ['id_categoria' => $categoria->id_categoria]) }}">
        @csrf
        <input type="hidden" name="id_categoria" value="{{ $categoria->id_categoria }}">
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{ $categoria->descripcion }}">
        </div>
        <div class="form-group">
            <label for="estado">Estado:</label>
            <select class="form-control" id="estado" name="estado" required>
                <option value="1" {{ ($categoria->estado == 1) ? 'selected' : '' }}>Disponible</option>
                <option value="2" {{ ($categoria->estado == 2) ? 'selected' : '' }}>No disponible</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
