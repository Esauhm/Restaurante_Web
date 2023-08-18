@extends('layouts.app')

@section('content')
<div class="container my-4 mx-auto">
    <div class="text-center">
        <h1 class="navbar-brand">Mi perfil</h1>
        <hr>
        <div style="display: flex; justify-content: center;">
            <img src="{{ asset('img/perfil.png') }}" class="d-block" alt="..." width="100" height="100">
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-6 col-sm-12 mx-auto">
        <div style="display: flex; justify-content: center;">
            <h3>Información personal</h3>
        </div>
            
            <table class="table table-striped">
                <tr>
                    <th>Nombre:</th>
                    <td>{{ $usuario['name'] }}</td>
                </tr>
                </tr>
               
                <tr>
                    <th>Correo:</th>
                    <td>{{ $usuario['email'] }}</td>
                </tr>
                
            </table>

            <div class="text-center">
                <a href="{{ route('usuario.editperfil') }}" class="btn btn-primary mt-2">
                    <i class="fas fa-user-edit"></i> Editar Información
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
