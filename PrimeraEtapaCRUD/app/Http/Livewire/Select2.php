<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Producto;
use App\Http\Controllers\ProductoController;


class Select2 extends Component
{   
    public $opciones = ["Alemania","Belgica","España","Portugal","Turquia","China"];
    
    public function render()
    {
        return view('livewire.select2');
    }
}
