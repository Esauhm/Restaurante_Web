@extends('layouts.app')
@section('content')
<div class="container">
  <h1 class="mt-5">Agregar categoria</h1>
  <form class="mt-5" method="post" action="{{ route('categorias.agregar') }}">
    @csrf
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion" value="">
            </div>    
            <label for="estado">Estado:</label>
                <select class="form-control" id="estado" name="estado" required>
                    <option value="1">Disponible</option>
                    <option value="2">No disponible</option>
                </select>
                <button type="submit" class="btn btn-primary">Agregar categoria</button>

            </div>
  </form>
</div>
@endsection
