@section('title', 'Incidencias')

@section('content')
    <div class="min-h-screen bg-gray-100">
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            </div>
        </header>
        <div class="bg-dark p-5">
            <h1 class="text-center text-white pb-4"><u>@lang('Incidencias')</u></h1>
            <div class="container d-flex justify-content-center align-items-center">
                <table class="table">
                    <thead class="thead-dark">
                        <tr class="text-center">
                            <th scope="col">Id</th>
                                <th>@lang('Fecha Error')</th>
                                <th>@lang('Error')</th>
                                <th>@lang('Tipo de Error')</th>
                            <th>
                                @auth
                                    @can('create', \App\Models\Incidencias::class)
                                        <button class="btn btn-primary"><a class="text-white"
                                            href="{{ route('incidencias.create') }}">@lang('Crear Incidencia')</a></button>
                                    @endcan
                                @endauth
                            </th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($incidencias as $incidencia)
                            <tr class="text-center bg-white">
                                <td>{{ $incidencias->id }}</td>
                                <td>{{ $item->fecherror }}</td>
                                <td>{{ $item->error }}</td>
                                <td>{{ $item->tipoerror }}</td>
                                <th>
                                    @auth
                                        @can('update', \App\Models\Incidencias::class)
                                            <button class="btn btn-warning"><a class="text-white"
                                                    href="{{ url('incidencias/' . $incidencias->id . '/edit') }}">@lang('Editar')</a></button>
                                        @endcan
                                    @endauth
                                </th>
                                <th>
                                    @auth
                                        @can('delete', \App\Models\Incidencias::class)
                                            <form method="post" action="{{ route('incidencias.destroy', $incidencia) }}">
                                                @csrf @method('DELETE')
                                                <button class="btn btn-danger text-white">@lang('Borrar')</button>
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

