@extends('components.head')
@section('title', 'Usuario')

@section('content')
    <div class="bg-dark p-5">
        <div class="container d-flex justify-content-center align-items-center">
            <table class="table">
                <thead class="thead-dark">
                    <tr class="text-center">
                        <th scope="col">Id</th>
                        <th scope="col">@lang('traduccion.Name')</th>
                        <th scope="col">@lang('traduccion.Last name')</th>
                        <th scope="col">@lang('traduccion.Age')</th>
                        <th scope="col">@lang('traduccion.Date of birth')</th>
                        <th scope="col">@lang('traduccion.Phone')</th>
                        <th scope="col">@lang('traduccion.Email')</th>
                        <th scope="col">@lang('traduccion.Studies')</th>
                        <th scope="col">@lang('traduccion.License')</th>
                        <th scope="col">@lang('traduccion.Description')</th>
                        <th scope="col">Favicon</th>
                        <th scope="col">@lang('traduccion.Image')</th>
                    </tr>
                </thead>
                <tbody>
                        <tr class="text-center bg-white">
                            <td>{{ $usuario->id }}</td>
                            <td>{{ $usuario->nombre }}</td>
                            <td>{{ $usuario->apellido }}</td>
                            <td>{{ $usuario->edad }}</td>
                            <td>{{ $usuario->fecha_de_nacimiento }}</td>
                            <td>{{ $usuario->telefono }}</td>
                            <td>{{ $usuario->email }}</td>
                            <td>{{ $usuario->estudios }}</td>
                            <td>{{ $usuario->carnet }}</td>
                            <td>{{ $usuario->descripcion }}</td>
                            <td>{{ $usuario->favicon }}</td>
                            <td><img src="/imagenes/{{ $usuario->imagen}}"></td>
                        </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection