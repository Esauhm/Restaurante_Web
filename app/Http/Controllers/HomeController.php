<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class HomeController extends Controller
{
    public function index()
    {
        $productos = Producto::listarProductosByIdCategoria("5");

        $data = [
            'productos' => $productos
        ];

        return view('home.index', $data); // Asegúrate de que la vista 'home.index' exista
    }

    public function nosotros()
    {
        return view('home.nosotros'); // Asegúrate de que la vista 'home.nosotros' exista
    }

    public function login()
    {
        return view('home.login'); // Asegúrate de que la vista 'home.login' exista
    }

    public function registro()
    {
        return view('layout.registro'); // Asegúrate de que la vista 'layout.registro' exista
    }

    public function promociones()
    {
        $productos = Producto::listarProductosByIdCategoria("5");

        $data = [
            'productos' => $productos
        ];

        session(['productovista' => 'promociones']);

        return view('home.promociones', $data); // Asegúrate de que la vista 'home.promociones' exista
    }

    // No necesitas la función 'Carrito' ya que no tiene acciones en el código original
}
