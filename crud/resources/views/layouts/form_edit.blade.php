<fieldset>
    <h1 class="text-center text-white pb-4 pt-5"><u>@lang('Editar incidencia')</u></h1>
    <input type="hidden" name="user_id" id="user_id" class="form-control" value="{{ Auth::user()->id}}">    <div class="form-group m-3 ">
    <div class="form-group m-3 ">
        <label class="text-white">
            {{ __('fecherror') }}: <input class="border-2 text-dark border-solid border-gray-100" type="date"
                name="fecherror" value="{{ old('fecherror', $incidencias->fecherror) }}" required />
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
                name="error" value="{{ old('error', $incidencias->error) }}" required />
            @error('error')
                <br>
                <small class="text-danger">*{{ $message }}</small>
                <br>
            @enderror
        </label>
    </div>

    <div class="form-group m-3">
        <label class="text-white">{{ __('Tipo de Error') }}: </label>
        <select class="border-2 text-dark border-solid border-gray-100" name="tipoerror">
            <option value="leve" @if (old('tipoerror', $incidencias->tipoerror) === 'leve') selected @endif>leve</option>
            <option value="grave" @if (old('tipoerror', $incidencias->tipoerror) === 'grave') selected @endif>grave</option>
        </select>
        @error('tipoerror')
            <br>
            <small class="text-danger">*{{ $message }}</small>
            <br>
        @enderror
    </div>

    <div class="form-group m-3">
        <label class="text-white">@lang('Descripcion del error'): </label>
        <textarea class="border-2 text-dark border-solid border-gray-100"
            name="descerror">{{ old('descerror', $incidencias->descerror) }}</textarea>
        @error('descerror')
            <br>
            <small class="text-danger">*{{ $message }}</small>
            <br>
        @enderror
    </div>

    <div class="form-group">
        <div class="col-md-12 text-center">
            <button type="submit" class="btn btn-success p-2 pl-4 pr-4 m-1 mb-4 bg-success">@lang('Editar Incidencia')</button>
            <button type="reset" class="btn btn-warning p-2 pl-4 pr-4 m-1 mb-4 bg-warning">@lang('Borrar')</button>
        </div>
    </div>

</fieldset>
<br>