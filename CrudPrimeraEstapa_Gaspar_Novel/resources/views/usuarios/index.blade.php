
@extends('components.head')
@section('title', 'Usuarios')
{{-- especificamos el css para el datatable --}}
@section('css')
<link rel="stylesheet" href="{{ asset('css/datatable.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
                <table id="usuarios" class="table border border-white">
                    <thead class="thead-dark">
                        <tr class="text-center">
                            <th class="align-middle" scope="col">Id</th>
                            <th class="align-middle" scope="col">@lang('traduccion.Name')</th>
                            <th class="align-middle" scope="col">@lang('traduccion.Last name')</th>
                            <th class="align-middle"scope="col">@lang('traduccion.Age')</th>
                            <th class="align-middle" scope="col">@lang('traduccion.Date of birth')</th>
                            <th class="align-middle" scope="col">@lang('traduccion.Phone')</th>
                            <th class="align-middle" scope="col">@lang('traduccion.Email')</th>
                            <th class="align-middle" scope="col">@lang('traduccion.License')</th>
                            <th class="align-middle" scope="col">@lang('traduccion.Studies')</th>
                            <th class="align-middle" scope="col">@lang('traduccion.Description')</th>
                            <th class="align-middle" scope="col">Favicon</th>
                            <th class="align-middle" scope="col">@lang('traduccion.Image')</th>
                            <th data-orderable="false">
                                @auth
                                    @can('create', \App\Models\Usuario::class)
                                        <button class="btn btn-primary"><a class="text-white"
                                            href="{{ route('usuarios.create') }}">@lang('traduccion.Create User')</a></button>
                                    @endcan
                                @endauth
                            </th>
                            <th data-orderable="false"></th>
                            <th data-orderable="false"></th>
                            <th data-orderable="false"></th>

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
                                <td>{{ $usuario->estudios }}</td>
                                <td>{{ $usuario->descripcion }}</td>
                                <td>{{ $usuario->favicon }}</td>
                                <td><img src="/imagenes/{{ $usuario->imagen}}"></td>
                                <th></th>
                                <th>
                                            <button class="btn btn-success"><a class="text-white"
                                                href="{{ route('usuarios.show',$usuario->id) }}"><i class="fa-solid fa-eye"></i></a></button>
                                </th>
                                <th>
                                    {{-- usamos los atributos para mostrar segun el nivel de autentificacion el boton --}}
                                    @auth
                                        @can('update', \App\Models\Usuario::class)
                                            <button class="btn btn-warning"><a class="text-white"
                                                    href="{{ url('usuarios/' . $usuario->id . '/edit') }}"><i class="fa-solid fa-pen-to-square"></i></a></button>
                                        @endcan
                                    @endauth
                                </th>
                                <th>
                                {{-- usamos los atributos para mostrar segun el nivel de autentificacion el boton --}}
                                    @auth
                                        @can('delete', \App\Models\Usuario::class)
                                        <form method="post" class="deletebtn" action="{{ route('usuarios.destroy', $usuario) }}">
                                            @csrf @method('DELETE')
                                            <button  type="submit" class="btn btn-danger text-white "><i class="fa-solid fa-trash-can"></i></button>
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
{{-- especificamos el js para el datatable --}}
@section('js')
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>    
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
$(document).ready(function() {
    $('#usuarios').DataTable();

    $('.deletebtn').submit(function(e){
        e.preventDefault();
        Swal.fire({
        title: '@lang('traduccion.Are you going to delete a user are you sure?')',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#6c757d',
        cancelButtonText: '@lang('traduccion.Cancel')',
        confirmButtonText: '@lang('traduccion.Delete')',
        }).then((result) => {
            console.log(result.value);
        if (result.value) {
            this.submit();
        } 
    });
        });
} );
    </script>

@endsection