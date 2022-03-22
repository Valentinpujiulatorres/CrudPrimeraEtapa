

<div class="row">
    <div class="col-md-8">

        <div class= "card card-warning"> 
            <div class="card-header">
                <h3 class="card-title">@lang('Ficha de la incidencia')</h3>
            </div>

            <div class="card-body">


                <div class="row">
                    <!-- Fecha del error -->
                    <div class="col-2">
                        <div class="form-group">
                            <label>@lang('Fecha Error')</label>
                            <input type="date" name="fecherror" value="{{ old('fecherror', $incidencia->fecherror ?? '') }}"
                                   class="form-control" required>
                        </div>
                    </div>
                    
                    <!-- Nombre del error -->
                    <div class="col-3">
                        <div class="form-group">
                            <label>@lang('Error')</label>
                            <input type="text" class="form-control" name="error" 
                                   value="{{ old('error', $incidencia->error ?? '') }}" required>
                        </div>
                    </div>

                    </div>

                    <!-- Tipo de error -->
                    <div class="col-2">
                        <div class="form-group">
                            <label for="tipoerror" class="form-label">@lang('Tipo de error')</label>
                            <select  required class="form-select form-select-sm" id="persona" name="tipoerror">
                                <option value="leve" {{ old("tipoerror") == "leve" ? "selected" : "" }}>{{ ("leve") }}</option>
                                <option value="grave" {{ old("tipoerror") == "grave" ? "selected" : "" }}>{{ ("grave") }}</option>
                            </select>
                        </div>
                    </div>

                    
                    <!-- Descripcion del error -->
                    <div class="col-3">
                        <div class="form-group">
                            <label>@lang('Descripcion del error')</label>
                            <input type="text" class="form-control" name="descerror" 
                                   value="{{ old('comentario', $proveedor->comentario ?? '') }}">
                        </div>
                    </div>
                </div>



            @if ((Request::route()->getName()=='incidencias.create'))
            <button type="submit" name="guardar" class="btn btn-secondary"
                    >@lang('Guardar')</button>
            @else
            <button type="submit" name="guardar" class="btn btn-secondary"
                    >@lang('Guardar')</button>
            <button type='button' class="btn btn-danger"
                    onclick="document.getElementById('delete-incidencia').submit()">@lang('Borrar Incidencia')
            </button>
            @endif



    </div> <!-- ./col-md-8 -->

    <div class="col-md-4">

        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">@lang('Añadir documento')</h3>
            </div> <!-- ./card-header -->

            <div class="card-body">
                <div class="form-group">

                    <!-- Título -->
                    <div class="form-group">
                        <label>@lang('Documento')</label>
                        <input type="text" class="form-control"  maxlength="35"
                               name="documento" value="{{ old('documento')}}">
                    </div>

                    <!-- Descripción -->
                    <div class="form-group">
                        <label>@lang('Descripción')</label>
                        <textarea class="form-control" rows="2"
                                  name="descripcion">{{ old('descripcion') }}
                        </textarea>
                    </div>


                    <div class="custom-file">
                        <input name="doc" type="file" class="custom-file-input" id="doc_comunidad">
                        <label class="custom-file-label" for="doc_comunidad">@lang('Elige un archivo')</label>
                    </div>
                </div>
            </div> <!-- card-body -->

        </div>
    </div><!-- ./col-md-4 -->
</div>   <!-- ./row -->
                    

