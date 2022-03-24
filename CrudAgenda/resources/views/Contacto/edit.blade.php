<form action="{{ route('contacto.update',$contacto->id) }}" enctype="multipart/form-data" method="POST">
@csrf
@method('PATCH')
<label for="NombreContacto">Nombre Contacto </label>
    <input type="text" name="NombreContacto" id="NombreContacto" placeholder="Escriba su nombre" value="{{isset($contacto->NombreContacto)?$contacto->NombreContacto:'' }}">
    <br>
    <label for="Apellidos">Apellidos Contacto</label>
    <input type="text" name="Apellidos" id="Apellidos" placeholder="Escriba sus apellidos" value="{{ isset($contacto->Apellidos)?$contacto->Apellidos:'' }}">
    <br>
    <label for="Dirección">Dirección</label>
    <input type="text" name="Direccion" id="Direccion" placeholder="Escriba su correo electrónico " value="{{isset($contacto->Direccion)? $contacto->Direccion:'' }}">
    <br>
    <label for="Edad"> Edad </label>
    <input type="text" name="Edad" id="Edad" placeholder="Que edad tiene" value="{{isset($contacto->Edad)?$contacto->Edad:''}}">
    <br>
    <label for="Imagen ">Eliga una imagen </label>
    @if(isset($contacto->Imagen))
    <input type="file" name="Imagen" id="Imagen">
    @endif
    <br>
    <input type="submit" value="Guardar Contacto">
    <br>
</form>
