@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="pt-3" style="color: #c43f3f;">Mis pedidos</h1>

    <hr>
    @if(session('success_pedido'))
        <div class="alert alert-success" role="alert">
            {{ session('success_pedido') }}
        </div>
    @endif

    <div class="row">
        <form class="mb-5" method="post" action="{{ route('usuario.pedidos') }}">
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
                    <button type="submit" class="btn btn-primary">Filtrar Pedidos</button>
                </div>
            </div>
        </form>

        <div class="col-md-12">
            @if(empty($pedidos))
                <p>No tienes pedidos activos en este momento</p>
            @else
                <table class="table table-striped table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Ver</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pedidos as $pedido)
                            <tr>
                                <td>{{ $pedido->id }}</td>
                                <td>{{ $pedido->fecha_pedido }}</td>
                                <td>{{ $pedido->id_estado_pedido }}</td>
                                <td>
                                    <form method="post" action="{{ route('admin.detallePedido') }}">
                                        @csrf
                                        <input type="hidden" name="id_pedido" value="{{ $pedido->id }}">
                                        <button type="submit" class="btn btn-info">Ver Detalle</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
@endsection
