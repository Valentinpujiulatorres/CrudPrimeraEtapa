<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Incidencias extends Model
{
    use HasFactory;
    use softDeletes;

    protected $table = 'incidencias';
    protected $fillable = [
        'fecherror',
        'error', 
        'tipoerror', 
        'descerror',
        'imagen',

    ];

    public function user(){
        // belongsTo nos permite relacionar registros
        return $this->belongsTo(User::class);
    }
}
