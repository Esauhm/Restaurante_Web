<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class DetallePedido extends Model
{
    protected $table = 'detalle_pedidos'; // Nombre de la tabla en la base de datos
    public $timestamps = false; // Desactivar las columnas de timestamps (created_at y updated_at)

    protected $fillable = [
        'id_producto',
        'id_pedido',
        'cantidad',
    ]; // Campos que se pueden asignar masivamente

    // Métodos para interactuar con la base de datos

    public function guardarDetallePedido()
    {
        try {
            DB::table('detalle_pedidos')->insert([
                'id_producto' => $this->idProducto,
                'id_pedido' => $this->idPedido,
                'cantidad' => $this->cantidad,
            ]);

            return true; // Retorna true si se guardó correctamente

        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage();
            return false; // Retorna false si hubo un error
        }
    }

    public function obtenerDetallesPedido($idPedido)
    {
        try {
            $detallesPedido = DB::table('detalle_pedidos')
                ->join('productos', 'detalle_pedidos.id_producto', '=', 'productos.id_producto')
                ->select('detalle_pedidos.cantidad', 'productos.nombre', 'productos.precio')
                ->where('detalle_pedidos.id_pedido', $idPedido)
                ->get();

            return $detallesPedido;

        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage();
            return [];
        }
    }

    // Otros métodos para consultar, actualizar o eliminar detalles de pedido si es necesario
}

?>

