<?php

namespace App\Http\Controllers;

use App\Models\EstadoPedido;
use Illuminate\Http\Request;

/**
 * Class EstadoPedidoController
 * @package App\Http\Controllers
 */
class EstadoPedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estadoPedidos = EstadoPedido::paginate();

        return view('estado-pedidos.index', compact('estadoPedidos'))
            ->with('i', (request()->input('page', 1) - 1) * $estadoPedidos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estadoPedido = new EstadoPedido();
        return view('estado-pedidos.create', compact('estadoPedido'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(EstadoPedido::$rules);

        $estadoPedido = EstadoPedido::create($request->all());

        return redirect()->route('estado-pedidos.index')
            ->with('success', 'EstadoPedido created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $estadoPedido = EstadoPedido::find($id);

        return view('estado-pedidos.show', compact('estadoPedido'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estadoPedido = EstadoPedido::find($id);

        return view('estado-pedidos.edit', compact('estadoPedido'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  EstadoPedido $estadoPedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EstadoPedido $estadoPedido)
    {
        request()->validate(EstadoPedido::$rules);

        $estadoPedido->update($request->all());

        return redirect()->route('estado-pedidos.index')
            ->with('success', 'EstadoPedido updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $estadoPedido = EstadoPedido::find($id)->delete();

        return redirect()->route('estado-pedidos.index')
            ->with('success', 'EstadoPedido deleted successfully');
    }
}
