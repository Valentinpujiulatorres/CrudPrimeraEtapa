@extends('Productos.layout')
  
@section('content')
    <div class="col">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 style="color: #FFD700;">Escaparate de Producto </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-danger" href="{{ route('productos.index') }}"> Back</a>
            </div>
        </div>
    </div>
    <hr><br>
    <div class="card mb-3" style="max-width:80rem;" >
  <div class="row g-0">
    <div class="col-md-4">
      <img src="/imagenes/{{$producto->imagen}}" width="100%" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body" style="padding: 30px;">
        <h3 class="card-title"><b>{{$producto->nombre}}</b></h3>
        <p class="card-text"><i>{{$producto->descripcion}}</i></p>
        <p><b>Precio :</b><b class="text-success" style="font-size:xx-large;">{{$producto->precio}} $</b></p>
        <p><b>Stock  </b><b class="text-warning">{{$producto->stock}}</b> Uds</p>
        <p><b>Procedencia:  </b> {{$producto->procedencia}}</p>
        <p class="card-text"><small class="text-muted">Last update : {{$producto->updated_at}}</small></p>
      </div>
    </div>
  </div>
</div>

    

@endsection