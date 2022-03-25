<fieldset enctype="multipart/form-data">
    <head>
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
 @section('js')
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>$(document).ready(function() {
            $('.incidencias').select2();
            });
        </script>
@endsection
    </head>
    <h1 class="text-center text-white pb-4 pt-5"><u>@lang('Crear Incidencia')</u></h1>
    <input type="hidden" name="user_id" id="user_id" class="form-control" value="{{ Auth::user()->id}}">    <div class="form-group m-3 ">
        
        <!-- Formulario de las incidencias !-->
        
    <div class="form-group m-3 ">
        <label class="text-white">
            {{ __('Fecha del error') }}: <input class="border-2 text-dark border-solid border-gray-100" type="date"
                name="fecherror" value="{{ old('fecherror', $incidencia->fecherror) }}" required />
            @error('fecherror')
                <br>
                <small class="text-danger">*{{ $message }}</small>
                <br>
            @enderror
        </label>
    </div>

    <div class="form-group m-3">
        <label class="text-white">
            {{ __('Error') }}: <input class="border-2 text-dark border-solid border-gray-100" type="text"
                name="error" style="width: 150%" value="{{ old('error', $incidencia->error) }}" required />
            @error('error')
                <br>
                <small class="text-danger">*{{ $message }}</small>
                <br>
            @enderror
        </label>
    </div>

    <div class="form-group m-3">
        <label class="text-white">{{ __('Tipo de Error') }}: </label>
        <select class="incidencias" style="width: 30%" text-dark border-solid border-gray-100" name="tipoerror">
            <option value="leve" @if (old('tipoerror', $incidencia->tipoerror) === 'leve') selected @endif>leve</option>
            <option value="grave" @if (old('tipoerror', $incidencia->tipoerror) === 'grave') selected @endif>grave</option>
        </select>
        @error('tipoerror')
            <br>
            <small class="text-danger">*{{ $message }}</small>
            <br>
        @enderror
    </div>

    <div class="form-group m-3">
        <label class="text-white">@lang('Descripcion del error'): </label>
        <textarea class="border-2 text-dark border-solid border-gray-100" style="width: 200%"
            name="descerror">{{ old('descerror', $incidencia->descerror) }}</textarea>
        @error('descerror')
            <br>
            <small class="text-danger">*{{ $message }}</small>
            <br>
        @enderror
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 mt-4 ">
        <div class="form-group">
            <strong>Imagen</strong>
            <input   style="width: 350px;" type="file" class="form-control" name="imagen" >
        </div>
    </div>
        @error('imagen')
            <br>
            <small class="text-danger">*{{ $message }}</small>
            <br>
        @enderror

    <div class="form-group">
        <div class="col-md-12 text-center">
            <button type="submit" class="btn btn-success p-2 pl-4 pr-4 m-1 mb-4 bg-success">@lang('Crear Incidencia')</button>
            <button type="reset" class="btn btn-warning p-2 pl-4 pr-4 m-1 mb-4 bg-warning">@lang('Borrar')</button>
        </div>
    </div>

</fieldset>
<br>
