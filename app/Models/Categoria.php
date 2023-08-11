<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Categoria extends Model
{
    protected $table = 'categorias';
    protected $primaryKey = 'id_categoria';
    public $timestamps = false;

    protected $fillable = [
        'descripcion', 'estado'
    ];

    // Método para agregar una nueva categoría
    public static function agregarCategoria($descripcion, $estado)
    {
        try {
            DB::table('categoria')->insert([
                'descripcion' => $descripcion,
                'estado' => $estado,
            ]);
        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    // Método para modificar una categoría existente
    public static function modificarCategoria($idCategoria, $descripcion, $estado)
    {
        try {
            DB::table('categoria')
                ->where('id_categoria', $idCategoria)
                ->update([
                    'descripcion' => $descripcion,
                    'estado' => $estado,
                ]);
        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    // Método para obtener una categoría por su ID
    public static function editarCategoria($id_categoria)
    {
        try {
            $categoria = DB::table('categoria')
                ->where('id_categoria', $id_categoria)
                ->first();

            return $categoria;
        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    // Método para obtener todas las categorías
    public static function listarCategorias()
    {
        try {
            $categorias = DB::table('categorias')
                ->select('id_categoria', 'estado', 'descripcion')
                ->get();

            return $categorias;
        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage();
            return null; // Devuelve un valor nulo en caso de error
        }
    }

    // Método para actualizar el estado de una categoría
    public static function actualizarEstado($id_categoria, $nuevo_estado)
    {
        try {
            DB::table('categoria')
                ->where('id_categoria', $id_categoria)
                ->update([
                    'estado' => $nuevo_estado,
                ]);
        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
