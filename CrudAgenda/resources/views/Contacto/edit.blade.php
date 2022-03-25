<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<h1 class="text-center m-3" style="color: blue">Actualizar Contacto </h1>
<a  class="float-end btn btn-dark p-1 m-3 " href="{{url('contacto/')}}">Retroceder </a>    
<ol class=""><!--Pendiente de poner estilos--->
    @foreach ($errors->all() as $error)
        <li class="list-group list-group-numberes text-center" style="color: red">{{ $error }}</li>
    @endforeach
</ol>
<form class="text-center m-2 p-2" style="background-color:rgba(0, 0, 0, 0.534)" action="{{ route('contacto.update',$contacto->id) }}" enctype="multipart/form-data" method="POST">
@csrf
@method('PATCH') 
<ol class=""><!--Pendiente de poner estilos--->
    @foreach ($errors->all() as $error)
        <li class="list-group list-group-numberes text-center" style="color: red">{{ $error }}</li>
    @endforeach
</ol>

<label for="NombreContacto" class="form-label m-2 " style="color: yellowgreen">Nombre Contacto </label>
    <input class="text-form" type="text" name="NombreContacto" id="NombreContacto" placeholder="Escriba su nombre" value="{{isset($contacto->NombreContacto)?$contacto->NombreContacto:'' }}">
    <br>
    <label for="Apellidos" class="form-label m-2 " style=color:yellowgreen>Apellidos Contacto</label>
    <input type="text" name="Apellidos" id="Apellidos" placeholder="Escriba sus apellidos" value="{{ isset($contacto->Apellidos)?$contacto->Apellidos:'' }}">
    <br>
    <label for="Dirección" class="form-label m-2" style=color:yellowgreen>Dirección</label>
    <input type="text" name="Direccion" id="Direccion" placeholder="Escriba su correo electrónico " value="{{isset($contacto->Direccion)? $contacto->Direccion:'' }}">
    <br>
    <label for="Edad" class="form-label m-2" style="color: yellowgreen"> Edad </label>
    <input type="text" name="Edad" id="Edad" placeholder="Que edad tiene" value="{{isset($contacto->Edad)?$contacto->Edad:''}}">
    <br>
    <label for="Imagen" class="form-label m-2 " style="color: yellowgreen">Eliga una imagen </label>
    @if(isset($contacto->Imagen))
    <input type="file" name="Imagen" id="Imagen">
    @endif
    <br>
    <input type="submit" value="Guardar Contacto">

    <br>
</form>
