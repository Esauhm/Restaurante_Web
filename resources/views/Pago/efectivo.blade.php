@include('layouts.header')
<div class="container mt-5">
    <h2>Resumen del pedido</h2>
    @if (session('error_pedido'))
        <div class="alert alert-danger" role="alert">
            {{ session('error_pedido') }}
        </div>
    @endif
    @php
        session()->forget(['error_pedido', 'success_pedido']);
    @endphp
    <form action="{{ route('pedido.procesarPedido') }}" method="POST">

        <div class="d-flex flex-row justify-content-between align-items-start">
            <div class="flex-fill mr-3">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Precio unitario</th>
                                <th>Precio total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $total = 0;
                            @endphp
                            @foreach ($carrito as $item)
                                <tr>
                                    <td>{{ $item['producto']->nombre }}</td>
                                    <td>{{ $item['cantidad'] }}</td>
                                    <td>${{ number_format($item['producto']->precio, 2) }}</td>
                                    <td>${{ number_format($item['producto']->precio * $item['cantidad'], 2) }}</td>
                                </tr>
                                @php
                                    $total += $item['producto']->precio * $item['cantidad']; // Acumular el total
                                @endphp
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3" class="text-right font-weight-bold">TOTAL A PAGAR:</td>
                                <td class="font-weight-bold">${{ number_format($total, 2) }}</td>
                                <input type="hidden" name="total_pagar" value="{{ number_format($total, 2) }}">
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

        </div>
        <div class="flex-fill col-md-6 mt-4 ">
            <h2>Ingrese la dirección de envío</h2>
            <div class="mb-3">
                <label for="direccion_envio" class="form-label">Dirección de envío:</label>
                <input type="text" class="form-control" name="direccion_envio" id="direccion_envio" required>
            </div>
            <button class="btn btn-success" type="submit" require>Procesar pago en efectivo</button>
            <input type="hidden" name="id_estado_pedido" value="1">
        </div>
    </form>
</div>
