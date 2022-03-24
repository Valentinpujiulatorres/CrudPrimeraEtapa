@extends('incidencias.layout')
  
@section('content')

<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Formulario de Nueva Incidencia</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-danger" href="{{ route('incidencias.index') }}">Retrocede</a>
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
   
<form  style="margin-top: 5%;" action="{{ route('incidencias.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
  
    <!-- Formulario agregando los old values para que en caso de error recuerde el value previo -->
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Fecha del error</strong>
                <input  type="date" name="fecherror" class="form-control" placeholder="Inserte la fecha de la incidencia">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Error</strong>
                <input  type="text" name="error" class="form-control" placeholder="Nombre o breve descripcion del error">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mt-4 ">
            <div class="form-group">
                <strong>Tipo de error</strong>
                        <select class="border-2 text-dark border-solid border-gray-100" name="tipoerror">
                            <option value="leve" @if (old('tipoerror', $incidencias->tipoerror) === 'leve') selected @endif>leve</option>
                            <option value="grave" @if (old('tipoerror', $incidencias->tipoerror) === 'grave') selected @endif>grave</option>
                        </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mt-4 ">
            <div class="form-group">
                <strong>Descripcion del error</strong>
               <input  style="width: 15%;" type="float" class="form-control" name="descerror" placeholder="Descripcion mas extensa del error y como ocurrió">
            </div>
        </div>
         
        <div class="col-xs-12 col-sm-12 col-md-12 mt-4 ">
            <div class="form-group">
                <strong>Imagen</strong>
                <input   style="width: 200px;" type="file" class="form-control" name="imagen" >
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-success">Enviar</button>
        </div>
    </div>
   
</form>
@endsection