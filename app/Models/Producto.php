<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Producto extends Model
{
    protected $table = 'productos'; // Nombre de la tabla en la base de datos
    public $timestamps = false; // Desactivar las columnas de timestamps (created_at y updated_at)

    protected $fillable = [
        'nombre',
        'precio',
        'descripcion_prod',
        'categoria',
        'image_url',
        'estado',
    ]; // Campos que se pueden asignar masivamente

    // Métodos para interactuar con la base de datos

    public static function listarProductos()
    {
        try {
            $productos = DB::table('productos')
                ->join('categorias', 'productos.categoria', '=', 'categorias.id_categoria')
                ->select('productos.id_producto', 'productos.nombre', 'productos.precio', 'productos.descripcion_prod', 'categorias.descripcion AS categoria', 'productos.image_url', 'productos.estado')
                ->get();

            return $productos;

        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage();
            return [];
        }
    }

    public static function listarProductosByIdCategoria($idCategoria)
    {
        try {
            $productos = DB::table('productos')
                ->join('categorias', 'productos.categoria', '=', 'categorias.id_categoria')
                ->select('productos.id_producto', 'productos.nombre', 'productos.precio', 'productos.descripcion_prod', 'categorias.descripcion AS categoria', 'productos.image_url', 'productos.estado')
                ->where('productos.categoria', $idCategoria)
                ->get();

            return $productos;

        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage();
            return [];
        }
    }

    public static function buscarPorId($id_producto)
    {
        try {
            $producto = DB::table('producto')
                ->where('id_producto', $id_producto)
                ->first();

            return $producto;

        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage();
            return null;
        }
    }

    public static function agregarProducto($nombre, $precio, $descripcion_prod, $categoria, $image_url, $estado)
    {
        try {
            DB::table('producto')->insert([
                'nombre' => $nombre,
                'precio' => $precio,
                'descripcion_prod' => $descripcion_prod,
                'categoria' => $categoria,
                'image_url' => $image_url,
                'estado' => $estado,
            ]);
        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public static function editarProducto($id_producto)
    {
        try {
            $producto = DB::table('producto')
                ->where('id_producto', $id_producto)
                ->first();

            return $producto;

        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage();
            return null;
        }
    }

    public static function actualizarProducto($id_producto, $nombre, $precio, $descripcion_prod, $categoria, $image_url, $estado)
    {
        try {
            DB::table('producto')
                ->where('id_producto', $id_producto)
                ->update([
                    'nombre' => $nombre,
                    'precio' => $precio,
                    'descripcion_prod' => $descripcion_prod,
                    'categoria' => $categoria,
                    'image_url' => $image_url,
                    'estado' => $estado,
                ]);
        } catch (\PDOException $e) {
            echo "Error en la base de datos: " . $e->getMessage();
        } catch (\Exception $e) {
            echo "Error general: " . $e->getMessage();
        }
    }

    public static function actualizarEstado($id_producto, $nuevo_estado)
    {
        try {
            DB::table('producto')
                ->where('id_producto', $id_producto)
                ->update(['estado' => $nuevo_estado]);
        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}

?>

