<fieldset>
    <h1 class="text-center text-white pb-4 pt-5"><u>@lang('traduccion.Edit Contact')</u></h1>
    <input type="hidden" name="user_id" id="user_id" class="form-control" value="{{ Auth::user()->id}}">    <div class="form-group m-3 ">
    <div class="form-group m-3 ">
        <label class="text-white">
            {{ __('traduccion.Name') }}: <input class="border-2 text-dark border-solid border-gray-100" type="text"
                name="nombre" value="{{ old('nombre', $contacto->nombre) }}" required />
            @error('nombre')
                <br>
                <small class="text-danger">*{{ $message }}</small>
                <br>
            @enderror
        </label>
    </div>

    <div class="form-group m-3">
        <label class="text-white">
            {{ __('traduccion.Last name') }}: <input class="border-2 text-dark border-solid border-gray-100"
                type="text" name="apellido" value="{{ old('apellido', $contacto->apellido) }}" required />
            @error('apellido')
                <br>
                <small class="text-danger">*{{ $message }}</small>
                <br>
            @enderror
        </label>
    </div>

    <div class="form-group m-3">
        <label class="text-white">
            @lang('traduccion.Age'): <input class="border-2 text-dark border-solid border-gray-100" type="number"
                name="edad" value="{{ old('edad', $contacto->edad) }}" />
            @error('edad')
                <br>
                <small class="text-danger">*{{ $message }}</small>
                <br>
            @enderror
        </label>
    </div>

    <div class="form-group m-3">
        <label class="text-white">
            @lang('traduccion.Date of birth'): <input class="border-2 text-dark border-solid border-gray-100"
                type="date" name="fecha_de_nacimiento"
                value="{{ old('fecha_de_nacimiento', $contacto->fecha_de_nacimiento) }}" />
            @error('fecha_de_nacimiento')
                <br>
                <small class="text-danger">*{{ $message }}</small>
                <br>
            @enderror
        </label>
    </div>

    <div class="form-group m-3">
        <label class="text-white">
            {{ __('traduccion.Phone') }}: <input class="border-2 text-dark border-solid border-gray-100" type="tel"
                name="telefono" value="{{ old('telefono', $contacto->telefono) }}" required />
            @error('telefono')
                <br>
                <small class="text-danger">*{{ $message }}</small>
                <br>
            @enderror
        </label>
    </div>

    <div class="form-group m-3">
        <label class="text-white">
            {{ __('traduccion.Email') }}: <input class="border-2 text-dark border-solid border-gray-100" type="email"
                name="email" value="{{ old('email', $contacto->email) }}" required />
            @error('email')
                <br>
                <small class="text-danger">*{{ $message }}</small>
                <br>
            @enderror
        </label>
    </div>

    <div class="form-group m-3">
        <label class="text-white">{{ __('traduccion.Studies') }}: </label>
        <select class="border-2 text-dark border-solid border-gray-100" name="estudios">
            <option value="Daw" @if (old('estudios', $contacto->estudios) === 'daw') selected @endif>daw</option>
            <option value="Dam" @if (old('estudios', $contacto->estudios) === 'dam') selected @endif>dam</option>
            <option value="Asix" @if (old('estudios', $contacto->estudios) === 'asix') selected @endif>asix</option>
        </select>
        @error('estudios')
            <br>
            <small class="text-danger">*{{ $message }}</small>
            <br>
        @enderror
    </div>

    <div class="form-group m-3">
        <label class="text-white">{{ __('traduccion.License') }}: </label>
        <label class="text-white">B
            <input type="checkbox" value="B" name="carnet"
                {{ old('carnet', $contacto->carnet) == 'B' ? 'checked=' . 'checked' : '' }}>
        </label>
        @error('carnet')
            <br>
            <small class="text-danger">*{{ $message }}</small>
            <br>
        @enderror
    </div>

    <div class="form-group m-3">
        <label class="text-white">@lang('traduccion.Description'): </label>
        <textarea class="border-2 text-dark border-solid border-gray-100"
            name="descripcion">{{ old('descripcion', $contacto->descripcion) }}</textarea>
        @error('descripcion')
            <br>
            <small class="text-danger">*{{ $message }}</small>
            <br>
        @enderror
    </div>

    <div class="form-group m-3 text-white">
        <label>Favicon: </label>
        <label class="ml-1"> Si
            <input class="border-2 text-dark border-solid border-gray-100" type="radio" value="1" name="favicon" id=""
                {{ old('favicon', $contacto->favicon) == '1' ? 'checked=' . 'checked' : '' }}>
        </label>
        </label> No
        <input class="border-2 text-dark border-solid border-gray-100" type="radio" value="0" name="favicon" id=""
            {{ old('favicon', $contacto->favicon) == '0' ? 'checked=' . 'checked' : '' }}>
        </label>
        @error('favicon')
            <br>
            <small class="text-danger">*{{ $message }}</small>
            <br>
        @enderror
    </div>

    <div class="form-group m-3 ">
        <label class="text-white">{{ __('traduccion.Image') }}: 
            <input type="file" class="form-control-file" name="imagen" value="{{ old('imagen', $contacto->imagen) }}">
            @error('imagen')    
                <br>
                <small class="text-danger">*{{ $message }}</small>
                <br>
            @enderror
        </label>
    </div>


    <div class="form-group">
        <div class="col-md-12 text-center">
            <button type="submit"
                class="btn btn-success p-2 pl-4 pr-4 m-1 mb-4 bg-success">@lang('traduccion.Edit Contact')</button>
            <button type="reset" class="btn btn-warning p-2 pl-4 pr-4 m-1 mb-4 bg-warning">@lang('traduccion.Clean up')</button>
        </div>
    </div>

</fieldset>
<br>