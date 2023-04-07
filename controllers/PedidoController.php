<?php

    // Incluir las clases necesarias
    require_once 'models/producto.php';
    require_once 'models/pedido.php';
    require_once 'models/detallepedido.php';

    // Crear un nuevo Pedido
    class PedidoController  extends Controller{
        public function procesarPedido()
        {
            //defininimos nuestro carrito 
            $carrito = isset($_SESSION['carrito']) ? $_SESSION['carrito'] : array();

            // Crear un nuevo Pedido
            $pedido = new Pedido();
            $pedido->setTotalPagar($_POST['total_pagar']); // Asignar el total a pagar del formulario
            $pedido->setFechaPedido(date('Y-m-d')); // Asignar la fecha actual como fecha del pedido
            $pedido->guardar(); // Guardar el Pedido en la base de datos

            //var_dump($pedido->getIdPedido());
            //var_dump($item['producto']->getIdProducto());
               // Crear los detalles de pedido para cada producto en el carrito
               //var_dump($_SESSION["user_id"]);

        foreach ($carrito as $item) {
            $detallePedido = new DetallePedido();
            $detallePedido->setIdPedido($pedido->getIdPedido()); // Asignar el ID del pedido creado
            $detallePedido->setIdProducto($item['producto']->getIdProducto()); // Asignar el ID del producto del carrito
            $detallePedido->setIdUsuario($_SESSION["user_id"]); // Asignar el ID de usuario obtenido de la sesión
            $detallePedido->setIdEstadoPedido(1); // Asignar el ID de estado de pedido (por defecto 1)
            $detallePedido->setCantidad($item['cantidad']); // Asignar la cantidad del producto del carrito

            $detallePedido->guardarDetallePedido(); // Guardar el detalle de pedido en la base de datos
        }
        
            // Vaciar el carrito
             $_SESSION['carrito'] = array();

            // Redirigir al home y vaciar el carrito
            header("Location: " . URL);
            exit();
        }

        
    }





