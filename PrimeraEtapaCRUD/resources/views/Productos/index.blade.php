@extends('Productos.layout')

@section('content')

<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h4 style="color: #DAA520;">Listado de Productos</h4>
            </div>
            <div class="pull-right">
                <a style="margin: 4%;" class="btn btn-warning" href="{{ route('productos.create') }}">Nuevo Producto</a>
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
            <th>ID P.</th>
            <th>Nombre</th>
            <th>Stock</th>
            <th>Precio</th>
            <th width="280px">Acciones</th>
        </tr>
        @foreach ($productos as $producto)
        <tr>
            <td>{{ $producto->id }}</td>
            <td>{{ $producto->nombre }}</td>
            <td>{{ $producto->stock }}</td>
            <td>{{ $producto->precio }}</td>
            <td>
                <form action="{{ route('productos.destroy',$producto->id) }}" method="POST">
   
                    <a class="btn btn-success" href="{{ route('productos.show',$producto->id) }}">Detalle</a>
    
                    <a class="btn btn-warning" href="{{ route('productos.edit',$producto->id) }}">Edita</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Borra</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $productos->links() !!}


@endsection
