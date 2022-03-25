<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>    
<link rel="stylesheet" href=" https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

    
<script>
    $(document).ready(function() {
        $('#contactoIndividual').DataTable();
    
    } );
        </script>
        


<h1 class="text-center p-2" style="color:blue">Contacto Actual</h1>

<table id="contactoIndividual" class="table p-2" style="background-color: rgba(0, 0, 0, 0.274)">
    <thead class="thead-dark">
        <tr>
            <!--Cabecera de la tabla-->
            <a  class="float-end btn btn-dark m-3" href="{{url('contacto/')}}">Retroceder </a>  
            <th style="color:yellowgreen">ID</th>
            <th style="color: yellowgreen">Imagen</th>
            <th style="color: yellowgreen">Nombre Contacto </th>
            <th style="color: yellowgreen">Apellidos Contacto</th>
            <th style="color: yellowgreen">Correo electronico </th>
            <th style="color: yellowgreen">Edad </th>
            @if($contacto)
            <tr>
                <td>{{ $contacto->id }}</td>
               <td> <img src="{{ Storage::url( $contacto->Imagen)}}"class="css-class" alt="Imagen ">
               </td>
               <td>{{ $contacto->NombreContacto}}</td>
               <td>{{ $contacto->Apellidos}}</td>
               <td>{{ $contacto->Direccion }}</td>
               <td>{{ $contacto->Edad }}</td>
        </tr>    
        @endif
    </thead>
    <tbody>
 