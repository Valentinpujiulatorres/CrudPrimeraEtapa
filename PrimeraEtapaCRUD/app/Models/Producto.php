<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    //Para mayor concrecion dejamos instanciada la db table y los $fillables en el modelo 
        //Los Fillables se refieren a aquellos parametros que vamos a necesitar si o si en/de la request

    protected $table = "productos";
    protected $fillables = ["nombre","descripcion","stock","precio","procedencia"];


}
