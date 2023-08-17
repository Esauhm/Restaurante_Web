<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class PagoController extends Controller
{
    public function pagar(Request $request)
    {
        // Verificar la opción de pago seleccionada
        if ($request->has('pago')) {
            $opcion_pago = $request->input('pago');

            // Si la opción de pago es tarjeta, redirigir a la vista para ingresar los datos de la tarjeta
            if ($opcion_pago == 'tarjeta') {
                $carrito = session('carrito', []);

                return view('pago.index', compact('carrito'));
            }

            // Si la opción de pago es efectivo, redirigir a la vista para realizar el pago en efectivo
            if ($opcion_pago == 'efectivo') {
                $carrito = session('carrito', []);

                return view('Pago.efectivo', compact('carrito'));
            }
        }

        // Si no se seleccionó una opción de pago válida, redirigir a la vista de error
        return view('Pago.error');
    }
}

?>