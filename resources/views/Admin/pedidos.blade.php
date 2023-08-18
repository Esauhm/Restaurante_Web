@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Pedidos por Fecha</h1>
    <form method="post" action="{{ route('admin.pedidos') }}">
        @csrf

        <div class="row">
            <div class="form-group col-md-4">
                <label for="fecha_pedido" class="mb-2">Fecha:</label>
                <input type="date" class="form-control" id="fecha_pedido" name="fecha_pedido" >
            </div>
            <div class="form-group col-md-4">
                <label for="id_estado" class="mb-2">Estado:</label>
                <select id="id_estado" name="id_estado" class="form-control">
                    <option value="">Todos</option>
                    <option value="1">En proceso</option>
                    <option value="2">Finalizado</option>
                    <option value="3">Cancelado</option>
                </select>
            </div>
            <div class="form-group col-md-4  mt-4">
                <button type="submit" class="btn btn-primary">Filtrar</button>
            </div>
        </div>
    </form>

    <hr>

    <div class="table-container">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Total a Pagar</th>
                    <th>Fecha del Pedido</th>
                    <th>Estado</th>
                    <th>Ver</th>
                    <th>Modificar estado</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pedidos as $pedido)
                <tr>
                    <td>{{ $pedido->id_pedido }}</td>
                    <td>{{ $pedido->total_pagar }}</td>
                    <td>{{ $pedido->fecha_pedido }}</td>
                    <td>{{ $pedido->Estado }}</td>
                    <td>
                        <form method="post" action="{{ route('detalle.pedido') }}">
                            @csrf
                            <input type="hidden" name="id_pedido" value="{{ $pedido->id_pedido }}">
                            <button type="submit" class="btn btn-info">Ver Detalle</button>
                        </form>
                    </td>
                    <td class="text-center col-2">
                        <form method="post" action="{{ route('admin.cambiarEstado') }}">
                            @csrf
                            <div class="form-group">
                                <label for="id_estado2">Estado:</label>
                                <select id="id_estado2" name="id_estado2" class="form-control">
                                    <option value="1">En proceso</option>
                                    <option value="2">Finalizado</option>
                                    <option value="3">Cancelado</option>
                                </select>
                            </div>
                            <input type="hidden" name="id_pedido" value="{{ $pedido->id_pedido }}">
                            <button type="submit" class="btn btn-success btn-sm">Cambiar estado</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
