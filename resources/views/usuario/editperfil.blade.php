@extends('layouts.app') <!-- Suponiendo que tienes una plantilla llamada app.blade.php en resources/views/layouts -->

@section('content')
<div class="container">
    <h1 class="mt-3" style="color: #c43f3f;">Editar perfil</h1>
    <hr>
    @if(session('msg'))
    <div class="alert alert-{{ session('msg_type') }}" role="alert">
        {{ session('msg') }}
    </div>
    @endif

    <div class="row d-flex justify-content-center">
        <div class="col-md-12">
            <form action="{{ route('usuario.actualizarPerfil') }}" method="post" class="form-inline">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nombre_usuario" class="mb-2 mt-3">Nombre:</label>
                                    <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" placeholder="{{ $usuario->name }}" value="{{ $usuario->name }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="correo" class="mb-2 mt-3">Correo:</label>
                                    <input type="email" class="form-control" id="correo" name="correo" placeholder="{{ $usuario->email }}" value="{{ $usuario->email }}" required>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3" title="Guardar cambios">
                            Guardar Cambios <i class="fa fa-save"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
