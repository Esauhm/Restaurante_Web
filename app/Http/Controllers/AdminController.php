<?php

namespace App\Http\Controllers;

    use App\Models\Producto;
    use App\Models\pedido;
    use App\Models\Categoria;
    use App\Models\detallepedido;
    use App\Models\User;
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

        public function pedidosA(Request $request)
        {
            $fechaActual = now()->format('Y-m-d');
            $fecha = $request->input('fecha_pedido', $fechaActual);
            $idEstado = $request->input('id_estado');

            $pedido = new Pedido();
            $pedidos = $pedido->listarPedidos($fecha, $idEstado);

          

            

            return view('Admin.Pedidos', ['pedidos' => $pedidos]);
        }

        public function Addcategoria()
        {
            return view('categorias.create');
        }

        public function agregarCategoria(Request $request)
            {
                
                if ($request->isMethod('post')) {
                    $descripcion = $request->input('descripcion');
                    $estado = $request->input('estado');                     
                    Categoria::agregarCategoria($descripcion, $estado);                
                    return redirect()->route('categorias.editar');
                }
               
            }
        public function listUsers()
            {
                $users = User::all();
        
                return view('Admin.usuarios', ['users' => $users]);
         }
         public function updateRole(Request $request, User $user)
        {
            $user->update(['rol' => $request->role]);
           
            return redirect()->back();
        }

        public function EditCategorias()
        {   
            $categoria = new Categoria();
            $categorias = $categoria->listarCategorias();
    
            return view('Categorias.editar', ['categorias' => $categorias]);
        }
        
        public function showCategory(Request $request, $id_categoria)
        {
            // Aquí puedes realizar cualquier lógica necesaria para la edición de la categoría
            // Por ejemplo, obtener los datos de la categoría y pasarlos a la vista de edición
            $categoria = Categoria::find($id_categoria);
          
            return view('categorias.show', ['categoria' => $categoria]);
        }
        

        public function cambiarEstadoCategoria(Request $request) {
            $id_categoria = $request->input('id_categoria');
            $estado_actual = $request->input('estado');
            $nuevo_estado = ($estado_actual == 1) ? 2 : 1;
          
            // Llama al método actualizarEstado del modelo Categoria
            $categoria = new Categoria();
            $categoria->actualizarEstado($id_categoria,$estado_actual);
        
            // Redirige al listado de categorías
            return redirect()->route('categorias.editar');
            // Ajusta la ruta según tu estructura
        }
        public function actualizarcategoria(Request $request)
        {
            if ($request->isMethod('post')) {
                $id_producto = $request->input('id_categoria');
                $descripcion = $request->input('descripcion');
                $estado = $request->input('estado');

                // Lógica para modificar la categoría en la base de datos
                Categoria::modificarCategoria($id_producto, $descripcion, $estado);

                // Redirigir al usuario a la página de listado de categorías
                return redirect()->route('categorias.editar');
            }
        }

        function mostrarEstadoCategoria($categoria) {
            $estado = $categoria->estado; // Acceso a la propiedad "estado" del modelo
            $id_categoria = $categoria->id_categoria; // Acceso a la propiedad "id_categoria" del modelo
            $buttonText = ($estado == 1) ? 'Disponible' : 'No Disponible';
            $buttonClass = ($estado == 1) ? 'btn-success' : 'btn-danger';
            
            $html = '
            <form method="post" action="'.route("cambiarEstado").'">                  
                <input type="hidden" name="_token" value="'.csrf_token().'">
                <input type="hidden" name="id_categoria" value="'.$id_categoria.'">
                <input type="hidden" name="estado" value="'.($estado == 1 ? 2 : 1).'">
                <button type="submit" class="btn '.$buttonClass.'">'.$buttonText.'</button>
            </form>
        ';
        
            
            return $html;
        }


        public function detallePedido(Request $request)
        {
            $idPedido = $request->input('id_pedido');
            
            $pedido = new Pedido();
            // Obtenemos el pedido por su id usando Eloquent
            $pedidos = $pedido->obtenerPedidoPorId($idPedido);


            // llamamos al modelo DetallePedido y creamos una instancia
            $detallePedido = new DetallePedido();

            // llamamos al método obtenerDetallesPedido y pasamos el id del pedido como argumento
            $detallesPedido = $detallePedido->obtenerDetallesPedido($idPedido);


            // Pasamos los resultados a la vista del detalle del pedido
            return view('Admin.DetallePedido', ['pedidos' => $pedidos, 'detallesPedido' => $detallesPedido]);
        }

          //cambiar estadado 
        public function cambiarEstado(Request $request)
        {
            if ($request->isMethod('post')) {
                $id_pedido = $request->input('id_pedido');
                $id_estado = $request->input('id_estado2');
                
                $pedidoModel = new Pedido();
                $pedidoModel->actualizarEstado($id_pedido, $id_estado);
                
                $fechaActual = now()->format('Y-m-d');
                $fecha = $request->input('fecha_pedido', $fechaActual);
                $idEstado = $request->input('id_estado');

                $pedido = new Pedido();
                $pedidos = $pedido->listarPedidos($fecha, $idEstado);

          

            

                return view('Admin.Pedidos', ['pedidos' => $pedidos]);
            }
        }


        public function perfil()
        {
            $id_usuario = auth()->id(); // Obtén el ID del usuario autenticado
            $usuario = User::find($id_usuario); // Suponiendo que UsuarioModel sea tu modelo

           

            return view('usuario.perfil', ['usuario' => $usuario]);
        }

        public function perfilE()
        {
            $id_usuario = auth()->id(); // Obtén el ID del usuario autenticado
            $usuario = User::find($id_usuario); // Suponiendo que UsuarioModel sea tu modelo

           

            return view('usuario.editperfil', ['usuario' => $usuario]);
        }


        public function actualizarPerfil(Request $request)
        {

            $nombreUsuario = $request->input('nombre_usuario');
            $correo = $request->input('correo');

            $id_usuario = auth()->id(); // Obtén el ID del usuario autenticado
            $usuario = User::find($id_usuario); // Suponiendo que tu modelo es UsuarioModel
            $usuario->name = $nombreUsuario;
            $usuario->email = $correo;
            $resultado = $usuario->save();

            if ($resultado) {
                return view('usuario.perfil', ['usuario' => $usuario]);
            } 
        }




     
    }

    