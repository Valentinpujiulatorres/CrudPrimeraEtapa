@extends('Productos.layout')
  
@section('content')
    <div class="row">
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
    <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                    <img width="40%" src="/imagenes/{{$producto->imagen}}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong class="text-warning">Nombre</strong>
                    <b>{{ $producto->nombre }}</b>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong class="text-warning" >Descripcion</strong>
                    <i>{{$producto->descripcion}}</i>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong class="text-warning">Stock</strong>
                <b>  {{ $producto->stock}}</b> Uds
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong class="text-warning">Precio</strong>
                <b>{{ $producto->precio }}</b>€
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong class="text-warning">Procedencia</strong>
                <p>{{$producto->procedencia}}</p>
                
                
            </div>
        </div>
    </div>
@endsection