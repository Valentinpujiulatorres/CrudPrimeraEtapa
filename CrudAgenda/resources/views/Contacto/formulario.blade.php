<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="text-center">
    <h1 class="text-center p-2" style="color: blue"> Nuevo Contacto  </h1>
    <a  class="float-end btn btn-dark" href="{{url('contacto/')}}">Retroceder </a>    
</div>
<ul class=""><!--Pendiente de poner estilos--->
    @foreach ($errors->all() as $error)
        <li class="">{{ $error }}</li><!--Estilos de lista para errores -->
    @endforeach
</ul>

<div class="text-center">
    <form class="text-center" style="form-control-color:black ">
    <label for="NombreContacto" class="form-label m-2" style="color:rosybrown">Nombre Contacto  </label>
    <input class="form-text" type="text" name="NombreContacto" id="NombreContacto" placeholder="Escriba su nombre"">
    <br>
    <label for="Apellidos" class="form-label m-2" style="color:rosybrown">Apellidos Contacto</label>
    <input class="form-text" type="text" name="Apellidos" id="Apellidos" placeholder="Escriba sus apellidos" ">
    <br>
    <label for="Dirección" class="form-label m-2" style="color: rosybrown">Dirección</label>
    <input type="text" name="Direccion" id="Direccion" placeholder="Escriba su correo electrónico ">
    <br>
    <label for="Edad" class="form-label m-2" style="color: rosybrown"> Edad </label>
    <input type="text" name="Edad" id="Edad" placeholder="Que edad tiene">
    <br>
    <label for="Imagen"  class="form-label m-2" style="color:rosybrown">Eliga una imagen </label>
    <input class="form-text " type="file" name="Imagen" id="Imagen">
    <br>
    <input type="submit" value=" Guardar Contacto">
    <br>
    
</form>
</div>
