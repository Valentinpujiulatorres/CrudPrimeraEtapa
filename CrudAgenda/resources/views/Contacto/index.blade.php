<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
{{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js%22%3E" ></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js%22%3E"></script> --}}



<div>
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>    
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>    
        <link rel="stylesheet" href=" https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
        <!--Librerias para datatables tanto enlaces de estilos como js para hacer dinámica  --->
     <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
$(document).ready(function() {
    $('#tablaRegistro').DataTable();

} );
    </script>
    
    <h1 class="text-center p-2 " style="color: blue" > Historico Contactos</h1>

<a class="float-end btn btn-info m-3 " href="{{ url('contacto/create') }}">Crear nuevo Contacto </a>
</div>

<table id="tablaRegistro" class="table table-dark">
    <thead class="thead-dark">
        <tr>
            <!--Cabecera de la tabla-->
            <th style="color:yellowgreen">ID</th>
            <th style="color: yellowgreen">Imagen</th>
            <th style="color: yellowgreen">Nombre Contacto </th>
            <th style="color: yellowgreen">Apellidos Contacto</th>
            <th style="color: yellowgreen">Correo electronico </th>
            <th style="color: yellowgreen">Edad </th>
            <th style="color:yellowgreen">Tipo Contacto </th>
            <th style="color: yellowgreen">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($contactos as $contacto)
        <!--Genero un array de contactos por convnenio el array en plural y el objeto en singular -->
            <tr>
             <td>{{ $contacto->id }}</td>
            <td> <img src="{{ Storage::url( $contacto->Imagen)}}"class="css-class" alt="Imagen ">
            </td>
            <td>{{ $contacto->NombreContacto}}</td>
            <td>{{ $contacto->Apellidos}}</td>
            <td>{{ $contacto->Direccion }}</td>
            <td>{{ $contacto->Edad }}</td>
            <td>{{ $contacto->TipoContacto }}</td>

            <td>
                <a class=" m-4 btn btn-warning" href="{{ route('contacto.edit',$contacto->id) }}">
                
                 Editar Contacto 
                </a>
            {{-- <a href={{ url('/contacto'.$contacto->id.'/edit') }}"> --}}
                <form class="botonBorrar" action="{{ url('/contacto/'.$contacto->id)}}" method="post">
                    @csrf
                <a class="m-4 btn btn-info " href="{{ route('contacto.show',$contacto->id) }}">Ver contacto </a>
                <br>
                    {{ method_field('DELETE')}}
                    <input class="m-4 btn btn-danger botonBorrar " type="submit"  value="Borrar Contacto ">
                </form> 
                {{-- onclick="return confirm ('Va a borrar un contacto desea continuar')" --}}
                <!--Añado bóton vista show ver individualmente-->
                
            </td>
        </tr>
        @endforeach 
    </tbody>
</table>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script>
    $('.botonBorrar').submit(function(e){
        Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
            )
        }
        })
    });
</script>