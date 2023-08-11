<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class DetallePedido extends Model
{
    protected $table = 'detalle_pedido'; // Nombre de la tabla en la base de datos
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
            DB::table('detalle_pedido')->insert([
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
            $detallesPedido = DB::table('detalle_pedido')
                ->join('producto', 'detalle_pedido.id_producto', '=', 'producto.id_producto')
                ->select('detalle_pedido.cantidad', 'producto.nombre', 'producto.precio')
                ->where('detalle_pedido.id_pedido', $idPedido)
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

