<?php

namespace Database\Factories;

use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UsuarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Usuario::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->name,
            'apellido' => $this->faker->name,
            'edad' => $this->faker->numberBetween(0,100),
            'telefono' => $this->faker->numerify('6########'),
            'email' => $this->faker->unique()->safeEmail,
            'imagen' => 'navegador.jpg'
        ];
    }
}