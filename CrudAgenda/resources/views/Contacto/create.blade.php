<form action="{{ url('/contacto') }}" method="post" enctype="multipart/form-data">
    @csrf
<label for="NombreContacto">Nombre Contacto </label>
<input type="text" name="NombreContacto" id="NombreContacto">
<br>
<label for="Apellidos">Apellidos Contacto</label>
<input type="text" name="Apellidos" id="Apellidos">
<br>
<label for="Dirección">Dirección</label>
<input type="text" name="Direccion" id="Direccion">
<br>
<label for="Edad"> Edad </label>
<input type="text" name="Edad" id="Edad">
<br>
<label for="Imagen ">Eliga una imagen </label>
<input type="file" name="Imagen" id="Imagen">
<br>
<input type="submit" value="Guardar Contacto">
<br>
</form>