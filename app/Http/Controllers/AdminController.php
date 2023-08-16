<?php

namespace App\Http\Controllers;

    use App\Models\Producto;
    use App\Models\pedido;
    use App\Models\detallepedido;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use Illuminate\Support\Facades\Session;
    
    class Admincontroller extends Controller
    {

        public function pedidos(Request $request)
        {
            $fechaActual = now()->format('Y-m-d');
            $fecha = $request->input('fecha_pedido', $fechaActual);
            $id_estado = $request->input('id_estado');
            
            // Llamamos al modelo Pedido y creamos una instancia
            $pedidoModel = new Pedido();
            
            // Llamamos al método obtenerPedidosPorUsuario y pasamos la fecha y el ID de estado como argumentos
            $pedidos = $pedidoModel->obtenerPedidosPorUsuario(auth()->user()->id, $fecha, $id_estado);
            
            // Enviamos los resultados a la vista
            return view('Usuario.Pedido', ['pedidos' => $pedidos]);
        }    

        public function Addcategoria()
        {
            return view('Categorias.create');
        }
        
        public function EditCategorias()
        {   
           /* $categoria = new Categoria();
    
            $categorias = $categoria->listarCategorias();*/
            return Categoria::all();
            return view('Categorias.editar');
        }
    }

    