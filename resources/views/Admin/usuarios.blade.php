@extends('layouts.app')

@section('content')
<div class="container">
    <div class="table-responsive">
        <table class="table table-striped table-hover table-borderless align-middle">
            <thead class="table-light">
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Email</th>
                    <th scope="col">Rol</th> <!-- Nueva columna para el rol -->
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <form method="POST" action="{{ route('user.updateRole', $user->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                @auth
                                @if (auth()->user()->name != $user->name)
                                    <select name="role" class="form-select" onchange="this.form.submit()">
                                        <option value="{{ $user->role }}">{{ $user->rol ==1?'Administrador':'Usuario' }}
                                        </option>
                                        @if ($user->rol ===1)
                                        <option value="2" {{ $user->role == 2 ? 'selected' : '' }}>Usuario</option>
                                        @else
                                        <option value="1" {{ $user->role == 1 ? 'selected' : '' }}>Administrador</option>
                                        @endif

                                    </select>
                                @else
                                <small class="text-muted fs-5">Usuario actual</small>
                                @endif
                                @endauth

                            </div>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection