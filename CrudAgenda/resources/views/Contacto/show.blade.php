{{-- <table class="table table-dark">
    <thead class="thead-dark">
        <tr>
            <!--Cabecera de la tabla-->
            <a  class="float-end btn btn-dark" href="{{url('contacto/')}}">Retroceder </a>  
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
 --}}
 