@extends('components.head')
@section('title', 'Editar Usuario')

@section('content')
<div class="min-h-screen bg-gray-100"> 
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        </div>
    </header>
    <div class="container col-12 col-md-5 bg-dark d-flex justify-content-center align-items-center">
        <div class="row">
            <div class="col-12">
                <div class="well well-sm">
                    {{-- muestra los errores encima del formulario --}}
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <li class="text-danger text-center pt-4">{{ $error }}</li>
                        @endforeach
                    @endif
                    {{-- formulario con metodo post y enctype para la subida de imagenes  --}}
                    <form class="form-horizontal" action="{{ url('usuarios/'.$usuario->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    {{-- indicamos el metodo a usar  --}}
                    @method('PUT')
                    @include('components.form_edit')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
