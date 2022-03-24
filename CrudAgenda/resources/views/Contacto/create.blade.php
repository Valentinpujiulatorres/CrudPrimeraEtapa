<form action="{{ url('/contacto') }}" method="post" enctype="multipart/form-data">
    @csrf
    <!--Include herencia formulario, rentabilidad de códificación -->
    @include('Contacto.formulario');

</form>