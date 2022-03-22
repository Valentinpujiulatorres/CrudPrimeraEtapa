<form action="{{ url('contacto/'.$contacto->id.'/edit') }}" method="post">
@csrf
@method('PUT'); 
@include('Contacto.formulario');
</form>