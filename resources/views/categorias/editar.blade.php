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
                    {{ $categoria->estado == 1 ? 'Disponible' : 'No Disponible' }}
                </td>
                <td>
                    <!-- Llama a la función mostrarEstadoCategoria del controlador -->
                    {!! $adminController->mostrarEstadoCategoria($categoria) !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
