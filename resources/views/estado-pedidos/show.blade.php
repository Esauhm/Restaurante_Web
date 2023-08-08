@extends('layouts.app')

@section('template_title')
    {{ $estadoPedido->name ?? "{{ __('Show') Estado Pedido" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Estado Pedido</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('estado-pedidos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Estado Pedido:</strong>
                            {{ $estadoPedido->id_estado_pedido }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $estadoPedido->Estado }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
