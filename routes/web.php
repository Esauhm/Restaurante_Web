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
