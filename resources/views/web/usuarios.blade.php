@extends('web.layout')



@section('main')
    <style>
        .tabla {
            margin-bottom: 100px;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            margin: 20px;
        }

        .roles {
            text-align: start;
        }

        .title {
            text-align: center;
            margin-top: 60px;
            font-size: 28px;
            color: #333;
            text-transform: uppercase;
            letter-spacing: 2px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        }

        .separator {
            border: none;
            height: 2px;
            background-color: #333;
            margin: 10px 0;
        }
    </style>

    <h2 class="title">LISTA DE USUARIOS</h2>
    <hr class="separator mx-3">

    <div class="tabla">


        <table class="table table-light table-striped">
            <tr>
                <td>NOMBRE</td>
                <td>EMAIL</td>
                <td>NACIMIENTO</td>
                <td>IMAGEN</td>
                <td class="roles">ROLES</td>
            </tr>

            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->fnacimiento }}</td>
                    <td> <img src="{{ asset($user->imagen) }}" width="70px" height="70px"></td>
                    <td>
                        @if (Auth::user()->id != $user->id)
                            <form action="/usuarios/rol" style="width: 250px">
                                <div class="d-flex align-items-center">

                                    <select name="rol" id="" class="form-select">
                                        <option value="{{ $user->rol }}" default>--Rol: {{ $user->rol }}--</option>
                                        <option value="usuario">Usuario</option>
                                        <option value="medico">Médico</option>
                                        <option value="admin">Administrador</option>
                                    </select>
                                    <input type="hidden" name="id" value="{{ $user->id }}">
                                    <button type="submit" class="btn btn-outline-success">Enviar</button>
                                </div>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach

        </table>
        {{$users->links()}}
    </div>
@endsection
