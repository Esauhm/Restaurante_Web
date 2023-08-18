@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-5">Pedido de {{ $usuario->name }} fecha: {{ $pedido->fecha_pedido }}</h1>

    <div class="row">
        <div class="col-md-6">
            <h3>Lugar de envío: {{ $pedido->ubicacion }}</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Nombre del producto</th>
                        <th>Cantidad</th>
                        <th>Precio Unitario</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detallesPedido as $detalle)
                        <tr>
                            <td>{{ $detalle->nombre }}</td>
                            <td>{{ $detalle->cantidad }}</td>
                            <td>{{ $detalle->precio }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @if (isset($_SESSION["user_type"]) && $_SESSION["user_type"] == "admin")
        <hr>
        <form method="post" action="{{ URL::to('Admin/CambiarEstado') }}">
            @csrf
            <div class="form-group">
                <label for="id_estado2">Estado:</label>
                <select id="id_estado2" name="id_estado2" class="form-control">
                    <option value="1">En proceso</option>
                    <option value="2">Finalizado</option>
                    <option value="3">Cancelado</option>
                </select>
            </div>
            <input type="hidden" name="id_pedido" value="{{ $pedido->IdPedido }}">
            <button type="submit" class="btn btn-success btn-sm">Cambiar estado</button>
        </form>
    @endif
    <hr>
    <a href="#" onclick="window.print()" class="btn btn-primary btn-sm">Imprimir Pedido</a>
</div>
@endsection
