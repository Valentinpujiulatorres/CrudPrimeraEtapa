<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Imagen</th>
            <th>Nombre Contacto </th>
            <th>Apellidos Contacto</th>
            <th>Correo electronico </th>
            <th>Edad </th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($contactos as $contacto)
            <tr>
            <td>{{ $contacto->id }}</td>
            <td>{{ $contacto->Imagen}}</td>
            <td>{{ $contacto->NombreContacto}}</td>
            <td>{{ $contacto->Apellidos}}</td>
            <td>{{ $contacto->Direccion }}</td>
            <td>{{ $contacto->Edad }}</td>
            <td>Editar Contacto |
            
                <form action="{{ url('/contacto/'.$contacto->id) }}" method="post">
                    @csrf
                    {{ method_field('DELETE') }}
                    <input type="submit" onclick="return confirm ('Va a borrar un contacto desea continuar')" value="Borrar Contacto ">
                </form>    
            </td>
        </tr>
        @endforeach 
    </tbody>
</table>