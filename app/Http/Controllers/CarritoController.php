<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Producto; // Asegúrate de tener el namespace correcto para el modelo Producto

class CarritoController extends Controller
{
    protected $producto;

    public function __construct(Producto $producto)
    {
        $this->producto = $producto;
    }



    public function agregarProducto(Request $request)
    {
        // Verificar si se ha enviado el formulario
        if ($request->isMethod('post')) {
            // Obtener los datos del formulario
            $id_producto = $request->input('id_producto');
            $cantidad = $request->input('cantidad');

    
            // Obtener el producto de la base de datos (asegúrate de que esta parte funcione correctamente)
            $producto = Producto::buscarPorId($id_producto);
    
            // Verificar si el producto existe
            if ($producto) {
                // Obtener el carrito actual
                $carrito = session()->has('carrito') ? session('carrito') : array();
    
                // Verificar si el producto ya está en el carrito
                if (isset($carrito[$id_producto])) {
                    // Actualizar la cantidad del producto en el carrito
                    $carrito[$id_producto]['cantidad'] += $cantidad;
                } else {
                    // Agregar el producto al carrito
                    $carrito[$id_producto] = array(
                        'producto' => $producto,
                        'cantidad' => $cantidad
                    );
                }
    
                // Actualizar el carrito en la sesión
                session(['carrito' => $carrito]);

                // Imprimir el carrito para verificar los datos (opcional)
                //dd($carrito);
    
                // Redirigir al listado de productos
                return redirect()->route('food.index'); // Ajusta la ruta de redirección según tu proyecto
            }
        }
    }
    

    public function verCarrito()
    {
        // Obtiene los datos del carrito de la sesión
        $carrito = session()->has('carrito') ? session('carrito') : array();
    
        // Renderiza la vista del carrito con los datos del carrito
        return view('Home.carrito', ['carrito' => $carrito]);
    }
    

    public function eliminarProducto(Request $request)
    {
        // Verificar si se ha enviado el formulario
        if ($request->isMethod('post')) {
            // Obtener el ID del producto a eliminar
            $id_producto = $request->input('id_producto');

            // Obtener el carrito actual
            $carrito = session()->has('carrito') ? session('carrito') : array();

            // Verificar si el producto está en el carrito
            if (isset($carrito[$id_producto])) {
                // Eliminar el producto del carrito
                unset($carrito[$id_producto]);

                // Actualizar el carrito en la sesión
                session(['carrito' => $carrito]);
            }
        }

        // Redirigir al carrito
        return redirect()->route('carrito.ver');
    }
}

