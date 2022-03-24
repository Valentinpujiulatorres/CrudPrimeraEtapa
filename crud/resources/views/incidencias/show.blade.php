@extends('incidencias.layout')
  
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 style="color: #FFD700;">Informacion de la incidencia</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-danger" href="{{ route('incidencias.index') }}"> Volver atras</a>
            </div>
        </div>
    </div>
    <hr><br>
    <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong class="text-warning">Fecha del error</strong>
                    <b>{{ $incidencia->fecherror }}</b>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong class="text-warning" >Error</strong>
                    <i>{{$incidencia->error}}</i>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong class="text-warning">Tipo de error</strong>
                <b>  {{ $incidencia->tipoerror}}</b>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong class="text-warning">Descripcion del Error</strong>
                <b>{{ $incidencia->descerror }}</b>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                    <img width="40%" src="/imagenes/{{$incidencia->imagen}}">
            </div>
        </div>
    </div>
@endsection
