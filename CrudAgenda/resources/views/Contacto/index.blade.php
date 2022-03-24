<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <h1 class="text-center " style="color: blue" > Historico Contactos</h1>

<a class="float-end btn btn-info m-3 " href="{{ url('contacto/create') }}">Crear nuevo Contacto </a>
<table class="table table-dark">
    <thead class="thead-dark">
        <tr>
            <!--Cabecera de la tabla-->
            <th style="color:yellowgreen">ID</th>
            <th style="color: yellowgreen">Imagen</th>
            <th style="color: yellowgreen">Nombre Contacto </th>
            <th style="color: yellowgreen">Apellidos Contacto</th>
            <th style="color: yellowgreen">Correo electronico </th>
            <th style="color: yellowgreen">Edad </th>
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
            <td>
                <a class=" m-4 btn btn-warning" href="{{ route('contacto.edit',$contacto->id) }}">
                
                 Editar Contacto |
                </a>
            {{-- <a href={{ url('/contacto'.$contacto->id.'/edit') }}"> --}}
                <form action="{{ url('/contacto/'.$contacto->id)}}" method="post">
                    @csrf
                <a class="m-4 btn btn-info " href="{{ route('contacto.show',$contacto->id) }}">Ver contacto </a>
                <br>
                    {{ method_field('DELETE')}}
                    <input class="m-4 btn btn-danger" type="submit" onclick="return confirm ('Va a borrar un contacto desea continuar')" value="Borrar Contacto ">
                </form> 
                <!--Añado bóton vista show ver individualmente-->
                
            </td>
        </tr>
        @endforeach 
    </tbody>
</table>