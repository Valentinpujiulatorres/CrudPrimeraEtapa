@extends('Productos.layout')

@section('css')
<link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endsection


@section('content')

<script>

//BORRADOR DE PRUEBAS


    /* function SureToDelete(){
        Swal.fire({
  title: 'Estas Seguro?',
  text: "Una vez echo no podras revertir !",
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
    })} */
</script>
<div style="padding-bottom:3%;" class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h4 style="color: #DAA520;">Listado de Productos</h4>
            </div>
            <div class="pull-right">
                <a style="margin: 4%;" class="btn btn-warning" href="{{ route('productos.create') }}">Nuevo Producto</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table id="productos" class="table table-stripped shadow-lg">
        <thead >
        <tr>
            <th>CODIGO P.</th>
            <th>Nombre</th>
            <th>Stock</th>
            <th>Precio €</th>
            <th width="280px">Acciones</th>
        </tr>
        </thead>
        @foreach ($productos as $producto)
        <tr>
            <td>{{ $producto->id }}</td>
            <td>{{ $producto->nombre }}</td>
            <td>{{ $producto->stock }}</td>
            <td>{{ $producto->precio }}</td>
            <td>
                <form action="{{ route('productos.destroy',$producto->id) }}" class="SureToDelete" method="POST">
   
                    <a class="btn btn-success" href="{{ route('productos.show',$producto->id) }}">Detalle</a>
    
                    <a class="btn btn-warning" href="{{ route('productos.edit',$producto->id) }}">Edita</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger  "  //onclick="SureToDelete()">Borra</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  @section('js')
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

  <script>
      //Script que pretende dar una capa adicional de seguridad a la hora de borrar elementos de tu base de datos .
      //Tambien podemos agregar una capa de seguridad adicional implementando SOFT_DELETES
    $('.SureToDelete').submit(function(e){
       e.preventDefault(); 
        Swal.fire({
        title: 'ATENCION',
        text: "Una vez borrado el registro no se podra recuperar",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#198754',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Borrar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
    if (result.value) {
        //Debemos asegurarnos que pasamos el valor BOOLEANO y no el texto de confirmacion de la propia alerta 
      this.submit();
    }})});

      //Script que maneja la paginacion de las Datatables , en este caso queria parear la paginacion con la dada en mi metodo indice (Multiplo de 7)
      //Aunque no es necessario para su funcionamiento (LA PROPIEDAD LENGHTHMENU)
    $(document).ready(function() {
    $('#productos').DataTable(
       {
           "lengthMenu": [[ 7, 14, 28 ,-1] , [ 7 , 14 , 28 , "All"]]
       } 
    );
        
    } );
  </script>
  @endsection
 <!--  {!! $productos->links('pagination::bootstrap-4') !!}  -->


@endsection
