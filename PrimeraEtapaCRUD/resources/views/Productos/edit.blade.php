@extends('Productos.layout')

@section('content')

<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Actualizacion de Producto</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-danger" href="{{ route('productos.index') }}">Retrocede</a>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>ALERTA</strong>Ha habido los siguientes problemas con tu formulario<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form  style="margin-top: 5%;" action="{{ route('productos.update',$producto->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <!-- Formulario agregando los old values para que en caso de error recuerde el value previo -->
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombre</strong>
                <input value="{{$producto->nombre}}"  type="text" name="nombre" class="form-control" placeholder="Inserte un nombre de producto">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Descripcion</strong>
                <input  value="{{$producto->descripcion}}"  type="textarea" name="descripcion" class="form-control" placeholder="Breve descripcion de producto">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mt-4 ">
            <div class="form-group">
                <strong>Stock</strong>
               <input  value="{{$producto->stock}}"  style="width: 15%;" type="number" class="form-control" name="stock" placeholder="Stock (Uds)">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mt-4 ">
            <div class="form-group">
                <strong>Precio por Ud</strong>
               <input  value="{{$producto->precio}}" style="width: 15%;" type="number" step="0.01" class="form-control" name="precio" placeholder="$/ud">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Procedencia</strong><b>  Valor Previo: <b style="font-size: larger; color:brown">{{$producto->procedencia}}</b> </b><br>

                @livewire('select2')
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mt-4 ">
            <div class="form-group">
                <strong>Imagen</strong>
               <input   style="width: 45%;" type="file" class="form-control" name="imagen" >
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-success">Enviar</button>
        </div>
    </div>
   
</form>
@endsection