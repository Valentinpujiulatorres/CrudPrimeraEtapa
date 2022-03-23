<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usuario extends Model
{
    use HasFactory, SoftDeletes;

    // protege los campos para permitir actualizacion
    protected $fillable = [
        'user_id',
        'nombre', 
        'apellido', 
        'edad', 
        'fecha_de_nacimiento', 
        'telefono', 
        'email', 
        'estudios',
        'carnet', 
        'descripcion', 
        'favicon',
        'imagen'    
    ];

    public function user(){
        // belongsTo nos permite relacionar registros
        return $this->belongsTo(User::class);
    }
}
