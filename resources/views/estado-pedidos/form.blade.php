<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('id_estado_pedido') }}
            {{ Form::text('id_estado_pedido', $estadoPedido->id_estado_pedido, ['class' => 'form-control' . ($errors->has('id_estado_pedido') ? ' is-invalid' : ''), 'placeholder' => 'Id Estado Pedido']) }}
            {!! $errors->first('id_estado_pedido', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Estado') }}
            {{ Form::text('Estado', $estadoPedido->Estado, ['class' => 'form-control' . ($errors->has('Estado') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
            {!! $errors->first('Estado', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>