@extends('layouts.app')

@php
    use App\Http\Controllers\Admincontroller;
    use App\Models\Categoria; // Asegúrate de importar el modelo correcto
    
    $adminController = new Admincontroller();
@endphp

@section('content')
<div class="container">
    <h1 class="mt-5">Listado de categorias</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th style="display:none;">#</th>
                <th>Descripción</th>
                <th>Estado</th>
                <th>Editar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categorias as $categoria)
            <tr>
                <td>{{ $categoria->descripcion }}</td>
                <td>
                    <!-- Mostrar estado actual -->
                    {!! $adminController->mostrarEstadoCategoria($categoria) !!}    
                </td>
                <td>
                <form method="post" action="{{ route('categorias.show', ['id_categoria' => $categoria->id_categoria]) }}">
                @csrf
                <button type="submit" class="btn btn-primary">Editar</button>
                </form>
                    
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
