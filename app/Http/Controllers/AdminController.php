<?php

namespace App\Http\Controllers;

    use App\Models\Producto;
    use App\Models\pedido;
    use App\Models\Categoria;
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
            $categoria = new Categoria();
            $categorias = $categoria->listarCategorias();
    
            return view('Categorias.editar', ['categorias' => $categorias]);
        }
        
        public function cambiarEstadoCategoria(Request $request) {
            $id_categoria = $request->input('id_categoria');
            $estado_actual = $request->input('estado');
            $nuevo_estado = ($estado_actual == 1) ? 2 : 1;
        
            // Llama al método actualizarEstado del modelo Categoria
            $categoria = new Categoria();
            $categoria->actualizarEstado($id_categoria, $nuevo_estado);
        
            // Redirige al listado de categorías
            return redirect()->route('listaCategorias'); // Ajusta la ruta según tu estructura
        }

        function mostrarEstadoCategoria(Categoria $categoria) {
            $estado = $categoria->getEstado();
            $id_categoria = $categoria->getIdCategoria();
            $buttonText = ($estado == 1) ? 'Disponible' : 'No Disponible';
            $buttonClass = ($estado == 1) ? 'btn-success' : 'btn-danger';
            
            $html = '
                <form method="post" action="'.route("cambiarEstado").'">
                    @csrf
                    <input type="hidden" name="id_categoria" value="'.$id_categoria.'">
                    <input type="hidden" name="estado" value="'.($estado == 1 ? 2 : 1).'">
                    <button type="submit" class="btn '.$buttonClass.'">'.$buttonText.'</button>
                </form>
            ';
            
            return $html;
        }

     
    }

    