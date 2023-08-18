<?php

namespace App\Http\Controllers;

    use App\Models\Producto;
    use App\Models\pedido;
    use App\Models\detallepedido;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use Illuminate\Support\Facades\Session;
    

    // Crear un nuevo Pedido
    class PedidoController extends Controller
    {
        public function procesarPedido(Request $request)
        {
            // Definimos nuestro carrito
            $carrito = $request->session()->get('carrito', []);

            // Crear un nuevo Pedido
            $pedido = new Pedido();
            $pedido->total_pagar = $request->input('total_pagar');
            $pedido->fecha_pedido = now();
            $pedido->id_usuario = auth()->user()->id;
            $pedido->id_estado_pedido = $request->input('id_estado_pedido');
            $pedido->ubicacion = $request->input('direccion_envio');
            $pedido->save();

            // Crear los detalles de pedido para cada producto en el carrito
            foreach ($carrito as $item) {
                $detallePedido = new DetallePedido();
                $detallePedido->id_pedido = $pedido->id;
                $detallePedido->id_producto = $item['producto']->id_producto;
                $detallePedido->cantidad = $item['cantidad']; // Asignar la cantidad del producto del carrito

                $detallePedido->save(); // Guardar el detalle de pedido en la base de datos
            }

            // Vaciar el carrito
            $request->session()->forget('carrito');

            // Redirigir y mostrar mensajes según el resultado
            if ($pedido->id === null) {
                $request->session()->flash('error_pedido', 'No se pudo procesar el pedido, por favor inténtelo de nuevo.');
                return redirect()->route('pago.efectivo');
            } else {
                $request->session()->flash('success_pedido', '¡El pedido se ha creado exitosamente!');
                $id_usuario = auth()->user()->id;
                $fecha = $request->input('fecha_pedido', date('Y-m-d'));
                $id_estado = $request->input('id_estado', '');

                
            
                $pedidoModel = new Pedido();
                $pedidos = $pedidoModel->obtenerPedidosPorUsuario($id_usuario, $fecha, $id_estado);
            

                return view('Usuario.Pedido', ['pedidos' => $pedidos]);
            }
        }


        public function procesarPedidoT(Request $request)
        {
            // Definimos nuestro carrito
            $carrito = $request->session()->get('carrito', []);

            

            // Crear un nuevo Pedido
            $pedido = new Pedido();
            $pedido->total_pagar = $request->input('total_pagar');
            $pedido->fecha_pedido = now();
            $pedido->id_usuario = auth()->user()->id;
            $pedido->id_estado_pedido = $request->input('id_estado_pedido');
            $pedido->ubicacion = $request->input('direccion_envio');
            $pedido->save();

            // Crear los detalles de pedido para cada producto en el carrito
            foreach ($carrito as $item) {
                $detallePedido = new DetallePedido();
                $detallePedido->id_pedido = $pedido->id;
                $detallePedido->id_producto = $item['producto']->id_producto;
                $detallePedido->cantidad = $item['cantidad']; // Asignar la cantidad del producto del carrito

                $detallePedido->save(); // Guardar el detalle de pedido en la base de datos
            }

            // Vaciar el carrito
            $request->session()->forget('carrito');

            // Redirigir y mostrar mensajes según el resultado
            if ($pedido->id === null) {
                $request->session()->flash('error_pedido', 'No se pudo procesar el pedido, por favor inténtelo de nuevo.');
                return redirect()->route('pago.efectivo');
            } else {
                $request->session()->flash('success_pedido', '¡El pedido se ha creado exitosamente!');
                $id_usuario = auth()->user()->id;
                $fecha = $request->input('fecha_pedido', date('Y-m-d'));
                $id_estado = $request->input('id_estado', '');

                
            
                $pedidoModel = new Pedido();
                $pedidos = $pedidoModel->obtenerPedidosPorUsuario($id_usuario, $fecha, $id_estado);
            

                return view('Usuario.Pedido', ['pedidos' => $pedidos]);
            }
        }



        
    }
    






