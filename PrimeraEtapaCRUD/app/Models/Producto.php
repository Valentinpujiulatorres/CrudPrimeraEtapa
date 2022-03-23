<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    
    //Adicionalmente podemos indicar la tabla asociada al modelo para menores coplicaciones futuras.
    protected $table = 'productos';

    // La variable protegida $fillable hace referencia a aquellos parametros que nosotros deberemos pasar via request
    protected $fillable = ["nombre", "descripcion", "stock", "precio", "procedencia", "imagen"];
}
