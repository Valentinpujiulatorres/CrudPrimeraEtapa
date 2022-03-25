<fieldset>
    <h1 class="text-center text-white pb-4 pt-5"><u>@lang('traduccion.Create User')</u></h1>
    <input type="hidden" name="user_id" id="user_id" class="form-control" value="{{ Auth::user()->id }}">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="form-group col-7 col-xl-8  m-3 ">
            <label class="text-white">
                {{ __('traduccion.Name') }}: <input class="border-2 text-dark border-solid border-gray-100" type="text"
                    name="nombre" value="{{ old('nombre', $usuario->nombre) }}" required />
                @error('nombre')
                    <br>
                    <small class="text-danger">*{{ $message }}</small>
                    <br>
                @enderror
            </label>
        </div>
    </div>

    <div class="row d-flex justify-content-center align-items-center">
        <div class="form-group col-7 col-xl-8  m-3">
            <label class="text-white">
                {{ __('traduccion.Last name') }}: <input class="border-2 text-dark border-solid border-gray-100"
                    type="text" name="apellido" value="{{ old('apellido', $usuario->apellido) }}" required />
                @error('apellido')
                    <br>
                    <small class="text-danger">*{{ $message }}</small>
                    <br>
                @enderror
            </label>
        </div>
    </div>


    <div class="row d-flex justify-content-center align-items-center">
        <div class="form-group col-7 col-xl-8  m-3">
            <label class="text-white">
                @lang('traduccion.Age'): <input class="border-2 text-dark border-solid border-gray-100" type="number"
                    name="edad" value="{{ old('edad', $usuario->edad) }}" />
                @error('edad')
                    <br>
                    <small class="text-danger">*{{ $message }}</small>
                    <br>
                @enderror
            </label>
        </div>
    </div>

    <div class="row d-flex justify-content-center align-items-center">
        <div class="form-group col-7 col-xl-8  m-3">
            <label class="text-white">
                @lang('traduccion.Date of birth'): <input class="border-2 text-dark border-solid border-gray-100"
                    type="date" name="fecha_de_nacimiento"
                    value="{{ old('fecha_de_nacimiento', $usuario->fecha_de_nacimiento) }}" />
                @error('fecha_de_nacimiento')
                    <br>
                    <small class="text-danger">*{{ $message }}</small>
                    <br>
                @enderror
            </label>
        </div>
    </div>

    <div class="row d-flex justify-content-center align-items-center">
        <div class="form-group col-7 col-xl-8  m-3">
            <label class="text-white">
                {{ __('traduccion.Phone') }}: <input class="border-2 text-dark border-solid border-gray-100"
                    type="tel" name="telefono" value="{{ old('telefono', $usuario->telefono) }}" required />
                @error('telefono')
                    <br>
                    <small class="text-danger">*{{ $message }}</small>
                    <br>
                @enderror
            </label>
        </div>
    </div>

    <div class="row d-flex justify-content-center align-items-center">
        <div class="form-group col-7 col-xl-8  m-3">
            <label class="text-white">
                {{ __('traduccion.Email') }}: <input class="border-2 text-dark border-solid border-gray-100"
                    type="email" name="email" value="{{ old('email', $usuario->email) }}" required />
                @error('email')
                    <br>
                    <small class="text-danger">*{{ $message }}</small>
                    <br>
                @enderror
            </label>
        </div>
    </div>


    <div class="row d-flex justify-content-center align-items-center">
        <div class="form-group col-7 col-xl-8  m-3">
            <label class="text-white">{{ __('traduccion.License') }}: </label>
            <label class="text-white">B
                <input type="checkbox" value="B" name="carnet"
                    {{ old('carnet', $usuario->carnet) == 'B' ? 'checked=' . 'checked' : '' }}>
            </label>
            @error('carnet')
                <br>
                <small class="text-danger">*{{ $message }}</small>
                <br>
            @enderror
        </div>
    </div>

    <div class="row d-flex justify-content-center align-items-center">
        <div class="form-group col-7 col-xl-8  m-3">
            <label class="text-white">@lang('traduccion.Description'): </label>
            <textarea class="border-2 text-dark border-solid border-gray-100"
                name="descripcion">{{ old('descripcion', $usuario->descripcion) }}</textarea>
            @error('descripcion')
                <br>
                <small class="text-danger">*{{ $message }}</small>
                <br>
            @enderror
        </div>
    </div>
    <div class="row d-flex justify-content-center align-items-center">

        <div class="form-group col-7 col-xl-8 col-xl-8 m-3 text-white">
            <label>Favicon: </label>
            <label class="ml-1"> Si
                <input class="border-2 text-dark border-solid border-gray-100" type="radio" value="1" name="favicon"
                    id="" {{ old('favicon', $usuario->favicon) == '1' ? 'checked=' . 'checked' : '' }}>
            </label>
            </label> No
            <input class="border-2 text-dark border-solid border-gray-100" type="radio" value="0" name="favicon" id=""
                {{ old('favicon', $usuario->favicon) == '0' ? 'checked=' . 'checked' : '' }}>
            </label>
            @error('favicon')
                <br>
                <small class="text-danger">*{{ $message }}</small>
                <br>
            @enderror
        </div>
    </div>
    <div class="row d-flex justify-content-center align-items-center">
        <div class="form-group col-7 col-xl-8 col-xl-8 m-3 ">
            <label class="text-white">{{ __('traduccion.Image') }}:
                <input type="file" class="form-control-file" name="imagen"
                    value="{{ old('imagen', $usuario->imagen) }}" required>
                @error('imagen')
                    <br>
                    <small class="text-danger">*{{ $message }}</small>
                    <br>
                @enderror
            </label>
        </div>
    </div>

    <div class="row d-flex justify-content-center align-items-center">
        <div class="form-group col-12 m-3 text-center">
            <button type="submit" class="btn btn-success p-2 pl-4 pr-4 m-1 mb-4 bg-success">@lang('traduccion.Create User')</button>
            <button type="reset" class="btn btn-warning p-2 pl-4 pr-4 m-1 mb-4 bg-warning">@lang('traduccion.Clean up')</button>
        </div>
    </div>

</fieldset>
<br>
