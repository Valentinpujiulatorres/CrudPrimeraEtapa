<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div>
    <form>
    <label for="id">Identificador</label>
    
    <label for="NombreContacto">Nombre Contacto </label>
    <input type="text" name="NombreContacto" id="NombreContacto" placeholder="Escriba su nombre" value="{{ old('NombreContacto'),$contacto->NombreContacto }}">
    <br>
    <label for="Apellidos">Apellidos Contacto</label>
    <input type="text" name="Apellidos" id="Apellidos" placeholder="Escriba sus apellidos">
    <br>
    <label for="Dirección">Dirección</label>
    <input type="text" name="Direccion" id="Direccion" placeholder="Escriba su correo electrónico ">
    <br>
    <label for="Edad"> Edad </label>
    <input type="text" name="Edad" id="Edad" placeholder="Que edad tiene">
    <br>
    <label for="Imagen ">Eliga una imagen </label>
    <input type="file" name="Imagen" id="Imagen">
    <br>
    <input type="submit" value="Guardar Contacto">
    <br>
</form>
</div>
