@extends('incidencias.layout')

@section('content')

<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h4 style="color: #DAA520;">Listado de Incidencias</h4>
            </div>
            <div class="pull-right">
                <a style="margin: 4%;" class="btn btn-warning" href="{{ route('incidencias.create') }}">Crear Incidencia</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-stripped">
        <tr>
            <th>ID</th>
            <th>Error</th>
            <th>Tipo de error</th>
            <th>Descripcion del error</th>
            <th width="280px">Acciones</th>
        </tr>
        @foreach ($incidencias as $incidencia)
        <tr>
            <td>{{ $incidencia->id }}</td>
            <td>{{ $incidencia->error }}</td>
            <td>{{ $incidencia->tipoerror }}</td>
            <td>{{ $incidencia->descerror }}</td>
            <td>
                <form action="{{ route('incidencias.destroy',$incidencia->id) }}" method="POST">

                    <a class="btn btn-success" href="{{ route('incidencias.show',$incidencia->id) }}">Detalle</a>

                    <a class="btn btn-warning" href="{{ route('incidencias.edit',$incidencia->id) }}">Editar</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Borra</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>


@endsection

