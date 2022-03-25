<?php

namespace Database\Factories;

use App\Models\Incidencias;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class IncidenciasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    
   // Creacion de incidencias de prueba para la base de datos 
    public function definition()
    {
        return [
            'fecherror' => $this->faker->date,
            'error' => $this->faker->text,
            'descerror' => $this->faker->text,
            'imagen' => $this->faker->image('public/imagenes/', 640, 500, null, null),
        ];
    }
}
