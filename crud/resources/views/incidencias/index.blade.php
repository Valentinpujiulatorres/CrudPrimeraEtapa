@extends('incidencias.layout')



@section('content')


<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css"/>

    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>    
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>    

    <script>
$(document).ready(function() {
    $('#incidencias').DataTable();
} );
    </script>



    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h4 style="color: black;">Listado de Incidencias</h4>
            </div>
            <div class="pull-right">
                <a style="margin: 4%;" class="btn btn-success" href="{{ route('incidencias.create') }}">Crear Incidencia</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <!-- Tabla donde se mostrarán las incidencias !-->
    <table id="incidencias" name="incidencias" style="width:100%">
        <thead>
        <tr>
            <th>ID</th>
            <th>Error</th>
            <th>Tipo de error</th>
            <th>Descripcion del error</th>
            <th>Imagen</th>
            <th width="300px">Acciones</th>
        </tr>
        </thead>
        @foreach ($incidencias as $incidencia)
        <tbody>
        <tr>
            <td>{{ $incidencia->id }}</td>
            <td>{{ $incidencia->error }}</td>
            <td>{{ $incidencia->tipoerror }}</td>
            <td>{{ $incidencia->descerror }}</td>
            <td><img style="width: 200px;" src="/imagenes/{{ $incidencia->imagen}}"></td>
            <!-- Acciones sobre las incidencias !-->
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
        </body>
        @endforeach
    </table>
    



@endsection


