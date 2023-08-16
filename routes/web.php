<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('index');
    })->name('dashboard');

    Route::prefix('estado-pedidos')->group(function () {
        Route::middleware(['auth', 'verified'])->group(function () {
            Route::get('/', [EstadoPedidoController::class, 'index'])->name('estado-pedidos.index');
            Route::get('/create', [EstadoPedidoController::class, 'create'])->name('estado-pedidos.create');
            Route::post('/', [EstadoPedidoController::class, 'store'])->name('estado-pedidos.store');
            Route::get('/{estado_pedido}', [EstadoPedidoController::class, 'show'])->name('estado-pedidos.show');
            Route::get('/{estado_pedido}/edit', [EstadoPedidoController::class, 'edit'])->name('estado-pedidos.edit');
            Route::put('/{estado_pedido}', [EstadoPedidoController::class, 'update'])->name('estado-pedidos.update');
            Route::delete('/{estado_pedido}', [EstadoPedidoController::class, 'destroy'])->name('estado-pedidos.destroy');
        });
    });
});




Route::prefix('roles')->group(function () {
    Route::get('/', [RoleController::class, 'index'])->name('roles.index');
    Route::get('/create', [RoleController::class, 'create'])->name('roles.create');
    Route::post('/', [RoleController::class, 'store'])->name('roles.store');
    Route::get('/{role}', [RoleController::class, 'show'])->name('roles.show');
    Route::get('/{role}/edit', [RoleController::class, 'edit'])->name('roles.edit');
    Route::put('/{role}', [RoleController::class, 'update'])->name('roles.update');
    Route::delete('/{role}', [RoleController::class, 'destroy'])->name('roles.destroy');
});



//Ruta para cargar la vista de nosotros
Route::view('/nosotros', 'home.nosotros')->name('nosotros');



Route::get('/productos', [FoodController::class, 'index'])->name('food.index');


Route::get('/promociones', [HomeController::class, 'promociones'])->name('home.promociones');


Route::post('/carrito/agregar', [CarritoController::class, 'agregar'])->name('carrito.agregar');


Route::get('/carrito', [CarritoController::class, 'VerCarrito'])->name('home.carrito');

Route::post('/carrito/agregar-producto', [CarritoController::class, 'agregarProducto'])->name('carrito.agregarProducto');


Route::post('/carrito/eliminar-producto', 'CarritoController@eliminarProducto')->name('carrito.eliminarProducto');


Route::post('/pago/pagar', 'CarritoController@procesarPago')->name('pago.pagar');

Route::post('/carrito/eliminarProducto', [CarritoController::class, 'eliminarProducto'])->name('carrito.eliminarProducto');


Route::post('/pedido/procesar', [PedidoController::class, 'procesarPedido'])->name('pago.efectivo');

Route::post('/pago/pagar', [PagoController::class, 'pagar'])->name('pago.pagar');

Route::post('/pedido/procesar', [PedidoController::class, 'procesarPedido'])->name('pedido.procesarPedido');

Route::get('/pedido/procesarPedido', [PedidoController::class, 'procesarPedido'])->name('pedido.procesarPedido');

// routes/web.php
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Otras rutas...
});


Route::post('/Usuario/Pedido', [AdminController::class, 'pedidos'])->name('usuario.pedidos');

Route::post('/admin/detallePedido', [AdminController::class, 'detallePedido'])->name('admin.detallePedido');




Route::post('/pedido/procesar', [PedidoController::class, 'procesarPedidoT'])->name('pago.tarjeta');

Route::post('/pedido/procesarPedido', [PedidoController::class, 'procesarPedidoT'])->name('pedido.procesarPedidos');