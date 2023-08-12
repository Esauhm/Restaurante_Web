<?php

namespace App\Http\Controllers;

    use App\Models\Producto;
    use App\Models\pedido;
    use App\Models\detallepedido;
    use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
            $detallePedido->setIdPedido($pedido->getIdPedido());
            $detallePedido->setIdProducto($item['producto']->getIdProducto());
            $detallePedido->setCantidad($item['cantidad']);
            $detallePedido->guardarDetallePedido();
        }

        // Vaciar el carrito
        $request->session()->forget('carrito');

        // Redirigir y mostrar mensajes según el resultado
        if ($pedido->getIdPedido() === null) {
            $request->session()->flash('error_pedido', 'No se pudo procesar el pedido, por favor inténtelo de nuevo.');
            return redirect()->route('pago.efectivo');
        } else {
            $request->session()->flash('success_pedido', '¡El pedido se ha creado exitosamente!');
            $id_usuario = auth()->user()->id;
            $fecha = $pedido->getFechaPedido();
            $id_estado = $pedido->getIdEstadoPedido();

            $pedidoModel = new Pedido();
            $pedidos = $pedidoModel->obtenerPedidosPorUsuario($id_usuario, $fecha, $id_estado);

            return view('Usuario.Pedido', ['pedidos' => $pedidos]);
        }
    }
        public function procesarPedidoT()
        {
                // Definimos nuestro carrito 
                $carrito = isset($_SESSION['carrito']) ? $_SESSION['carrito'] : array();
                
                // Validar campos de la tarjeta de crédito
                $nombreTitular = isset($_POST['nombre']) ? trim($_POST['nombre']) : '';
                $numTarjeta = isset($_POST['numero']) ? str_replace(' ', '', trim($_POST['numero'])) : '';
                $cvv = isset($_POST['cvv']) ? trim($_POST['cvv']) : '';
                $ubicacion = isset($_POST['ubicacion']) ? trim($_POST['ubicacion']) : '';
              
                $mes = $_POST['mes'];
                $anio = $_POST['anio'];
                $fechaVencimiento = $mes . '/' . substr($anio, -2);


                if (empty($nombreTitular) || !preg_match('/^[a-zA-Z ]+$/', $nombreTitular)) {
                    $_SESSION['error_pedido'] = 'Ingrese un nombre válido para el titular de la tarjeta';
                    $this->renderView("pago/tarjeta", array('carrito' => $carrito));
                    exit();
                }
            
                if (empty($numTarjeta) || !preg_match('/^\d{16}$/', $numTarjeta)) {
                    $_SESSION['error_pedido'] = 'Ingrese un número de tarjeta de crédito válido';
                    $this->renderView("pago/tarjeta", array('carrito' => $carrito));
                    exit();
                }
            
                if (empty($fechaVencimiento) || !preg_match('/^(0[1-9]|1[0-2])\/([0-9]{2})$/', $fechaVencimiento)) {
                    $_SESSION['error_pedido'] = 'Ingrese una fecha de vencimiento válida (MM/AA)';
                    $this->renderView("pago/tarjeta", array('carrito' => $carrito));
                    exit();
                } else {
                    $mes = substr($fechaVencimiento, 0, 2);
                    $anio = '20' . substr($fechaVencimiento, -2);
                    $fechaActual = new DateTime();
                    $fechaIngresada = new DateTime($anio . '-' . $mes . '-01');
                    if ($fechaIngresada < $fechaActual) {
                        $_SESSION['error_pedido'] = 'Ingrese una fecha de vencimiento válida (mayor a la actual)';
                        $this->renderView("pago/tarjeta", array('carrito' => $carrito));
                        exit();
                    }
                }
            
                if (empty($cvv) || !preg_match('/^\d{3,4}$/', $cvv)) {
                    $_SESSION['error_pedido'] = 'Ingrese un código de seguridad (CVV) válido';
                    $this->renderView("pago/tarjeta", array('carrito' => $carrito));
                    exit();
                }
            
                if (empty($ubicacion)) {
                    $_SESSION['error_pedido'] = 'Ingrese una dirección de envío válida';
                    $this->renderView("pago/tarjeta", array('carrito' => $carrito));
                    exit();
                }
                
                    // Crear un nuevo Pedido
                    $pedido = new Pedido();
                    $pedido->setTotalPagar($_POST['total_pagar']); // Asignar el total a pagar del formulario
                    $pedido->setFechaPedido(date('Y-m-d')); // Asignar la fecha actual como fecha del pedido
                    $pedido->setIdUsuario($_SESSION["user_id"]); // Asignar el ID de usuario obtenido de la sesión
                    $pedido->setIdEstadoPedido($_POST['id_estado_pedido']);
                    $pedido->setUbicacion($_POST['ubicacion']);
                    $pedido->guardar();
            
                    // Crear los detalles de pedido para cada producto en el carrito
                    foreach ($carrito as $item) {
                        $detallePedido = new DetallePedido();
                        $detallePedido->setIdPedido($pedido->getIdPedido()); // Asignar el ID del pedido creado
                        $detallePedido->setIdProducto($item['producto']->getIdProducto()); // Asignar el ID del producto del carrito
                        $detallePedido->setCantidad($item['cantidad']); // Asignar la cantidad del producto del carrito
            
                        $detallePedido->guardarDetallePedido(); // Guardar el detalle de pedido en la base de datos
                    }
                  // Redirigir al home y vaciar el carrito
                  if ($pedido->getIdPedido() === null) {
                    $_SESSION['error_pedido'] = 'No se pudo procesar el pedido, por favor inténtelo de nuevo.';
                    $this->renderView("pago/tarjeta", array('carrito' => $carrito));
                } else {
                        $_SESSION['carrito'] = array();
                        $_SESSION['success_pedido'] = '¡El pedido se ha creado exitosamente!';
                        $id_usuario = $_SESSION["user_id"];
                        $fecha = isset($_POST['fecha_pedido']) ? $_POST['fecha_pedido'] : date('Y-m-d');
                        $id_estado = isset($_POST['id_estado']) ? $_POST['id_estado'] : '';
                    

                        $pedido = new Pedido();
                        $pedidos = $pedido->obtenerPedidosPorUsuario($id_usuario, $fecha, $id_estado);
                        $this->RenderView("Usuario/Pedido",['pedidos' => $pedidos]);

                    }

    
            // Redirigir al home y vaciar el carrito
            exit();
        }
    }
    






