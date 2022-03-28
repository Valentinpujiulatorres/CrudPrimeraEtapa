
    @section('Select2Css')
    <livewire:styles />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
    
    @endsection
    <div wire:ignore>
    <select name="procedencia" class="select2 form-control " id="select2Valentin">
        <option disabled selected value="Introduce un Origen">Introduce Un origen</option>
            @foreach ($opciones as $p)
                <option value="{{$p}}">{{$p}}</option>
            @endforeach 
    </select>
    </div>
    @section('Select2Js')
    <livewire:scripts />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
      
            $('#select2Valentin').select2({

                
            });
    </script>
    
    @endsection

