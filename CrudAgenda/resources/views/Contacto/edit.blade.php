<form action="{{ url('contacto/'.$contacto->id.'/edit') }}" method="post">
@csrf
@method('PUT'); 
<label for="NombreContacto">Nombre Contacto </label>
    <input type="text" name="NombreContacto" id="NombreContacto" placeholder="Escriba su nombre" value="{{ old('NombreContacto',$contacto->NombreContacto) }}">
    <br>
    <label for="Apellidos">Apellidos Contacto</label>
    <input type="text" name="Apellidos" id="Apellidos" placeholder="Escriba sus apellidos" value="{{ old('Apellidos',$contacto->Apellidos) }}">
    <br>
    <label for="Dirección">Dirección</label>
    <input type="text" name="Direccion" id="Direccion" placeholder="Escriba su correo electrónico " value="{{ old('Direccion',$contacto->Direccion) }}">
    <br>
    <label for="Edad"> Edad </label>
    <input type="text" name="Edad" id="Edad" placeholder="Que edad tiene" value="{{old('Edad',$contacto->Edad) }}">
    <br>
    <label for="Imagen ">Eliga una imagen </label>
    <input type="file" name="Imagen" id="Imagen">
    <br>
    <input type="submit" value="Guardar Contacto">
    <br>
</form>
</form>