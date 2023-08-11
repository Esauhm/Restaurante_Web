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


Route::prefix('categorias')->group(function () {
    // Ruta para mostrar todos los registros (Index)
    Route::get('/', [CategoriaController::class, 'index'])->name('categoria.index');

    // Ruta para mostrar el formulario de creación (Create)
    Route::get('/create', [CategoriaController::class, 'create'])->name('categoria.create');

    // Ruta para almacenar un nuevo registro en la base de datos (Store)
    Route::post('/', [CategoriaController::class, 'store'])->name('categoria.store');

    // Ruta para mostrar un registro específico (Show)
    Route::get('/{categoria}', [CategoriaController::class, 'show'])->name('categoria.show');

    // Ruta para mostrar el formulario de edición de un registro (Edit)
    Route::get('/{categoria}/edit', [CategoriaController::class, 'edit'])->name('categoria.edit');

    // Ruta para actualizar un registro específico en la base de datos (Update)
    Route::put('/{categoria}', [CategoriaController::class, 'update'])->name('categoria.update');

    // Ruta para eliminar un registro específico de la base de datos (Delete)
    Route::delete('/{categoria}', [CategoriaController::class, 'destroy'])->name('categoria.destroy');
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


/*
Route::prefix('productos')->group(function () {
    Route::get('/', [ProductoController::class, 'index'])->name('productos.index');
    Route::get('/create', [ProductoController::class, 'create'])->name('productos.create');
    Route::post('/', [ProductoController::class, 'store'])->name('productos.store');
    Route::get('/{producto}', [ProductoController::class, 'show'])->name('productos.show');
    Route::get('/{producto}/edit', [ProductoController::class, 'edit'])->name('productos.edit');
    Route::put('/{producto}', [ProductoController::class, 'update'])->name('productos.update');
    Route::delete('/{producto}', [ProductoController::class, 'destroy'])->name('productos.destroy');
});


*/


//Ruta para cargar la vista de nosotros
Route::view('/nosotros', 'home.nosotros')->name('nosotros');

//Mostrar la vista de productos

Route::get('/productos', [FoodController::class, 'index'])->name('food.index');

Route::get('/promociones', [HomeController::class, 'promociones'])->name('home.promociones');


Route::post('/carrito/agregar', [CarritoController::class, 'agregar'])->name('carrito.agregar');


Route::get('/carrito', [CarritoController::class, 'VerCarrito'])->name('home.carrito');

Route::post('/carrito/agregar-producto', [CarritoController::class, 'agregarProducto'])->name('carrito.agregarProducto');


Route::post('/carrito/eliminar-producto', 'CarritoController@eliminarProducto')->name('carrito.eliminarProducto');


Route::post('/pago/pagar', 'CarritoController@procesarPago')->name('pago.pagar');








