<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Support\Facades\DB;

class FoodController extends Controller
{
    public function index(Request $request)
    {
        $idCategoria = $request->input('categoria');

        if ($idCategoria == "") {
            $productos = Producto::listarProductos();
        } else {
            $productos = Producto::listarProductosByIdCategoria($idCategoria);
        }

        $categorias = Categoria::listarCategorias();

        $data = [
            'productos' => $productos,
            'categorias' => $categorias
        ];

        session(['productovista' => 'normal']);

        return view('food.index', $data);
    }
}