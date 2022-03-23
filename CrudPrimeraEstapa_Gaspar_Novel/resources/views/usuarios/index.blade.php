@extends('components.head')
@section('title', 'Usuarios')

@section('css')
<link rel="stylesheet" type="text/css" href="/DataTables/datatables.css">

@endsection

@section('content')
    <div class="min-h-screen bg-gray-100">
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            </div>
        </header>
        <div class="bg-dark p-5">
            <h1 class="text-center text-white pb-4"><u>@lang('traduccion.Users')</u></h1>
            <div class="container d-flex justify-content-center align-items-center">
                <table id="articulos" class="table">
                    <thead class="thead-dark">
                        <tr class="text-center">
                            <th scope="col">Id</th>
                            <th scope="col">@lang('traduccion.Name')</th>
                            <th scope="col">@lang('traduccion.Last name')</th>
                            <th scope="col">@lang('traduccion.Age')</th>
                            <th scope="col">@lang('traduccion.Date of birth')</th>
                            <th scope="col">@lang('traduccion.Phone')</th>
                            <th scope="col">@lang('traduccion.Email')</th>
                            <th scope="col">@lang('traduccion.License')</th>
                            <th scope="col">@lang('traduccion.Description')</th>
                            <th scope="col">Favicon</th>
                            <th scope="col">@lang('traduccion.Image')</th>
                            <th>
                                @auth
                                    @can('create', \App\Models\Usuario::class)
                                        <button class="btn btn-primary"><a class="text-white"
                                            href="{{ route('usuarios.create') }}">@lang('traduccion.Create User')</a></button>
                                    @endcan
                                @endauth
                            </th>
                            <th></th>
                            <th></th>
                            <th></th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usuarios as $usuario)
                            <tr class="text-center bg-white">
                                <td>{{ $usuario->id }}</td>
                                <td>{{ $usuario->nombre }}</td>
                                <td>{{ $usuario->apellido }}</td>
                                <td>{{ $usuario->edad }}</td>
                                <td>{{ $usuario->fecha_de_nacimiento }}</td>
                                <td>{{ $usuario->telefono }}</td>
                                <td>{{ $usuario->email }}</td>
                                <td>{{ $usuario->carnet }}</td>
                                <td>{{ $usuario->descripcion }}</td>
                                <td>{{ $usuario->favicon }}</td>
                                <td><img src="/imagenes/{{ $usuario->imagen}}"></td>
                                <th></th>
                                <th>
                                            <button class="btn btn-success"><a class="text-white"
                                                href="{{ route('usuarios.show',$usuario->id) }}">Detalle</a></button>
                                </th>
                                <th>
                                    @auth
                                        @can('update', \App\Models\Usuario::class)
                                            <button class="btn btn-warning"><a class="text-white"
                                                    href="{{ url('usuarios/' . $usuario->id . '/edit') }}">@lang('traduccion.Edit')</a></button>
                                        @endcan
                                    @endauth
                                </th>
                                <th>
                                    @auth
                                        @can('delete', \App\Models\Usuario::class)
                                            <form method="post" action="{{ route('usuarios.destroy', $usuario) }}">
                                                @csrf @method('DELETE')
                                                <button class="btn btn-danger text-white">@lang('traduccion.Delete')</button>
                                            </form>
                                        @endcan
                                    @endauth
                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endsection

    @section('js')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>    
    <script>
    $(document).ready( function () {
        $('#articulos').DataTable(
            "lengtMenu": [[5,10,50, -1], [5,10,50, "All"]]
        );
    } );
    </script>
@endsection