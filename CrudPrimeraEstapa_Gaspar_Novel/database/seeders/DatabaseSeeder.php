<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\models\Usuario;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // usamos el modelo para crear gracias al factory en este caso 10 usuarios
        Usuario::factory(10)->create();
        // llamamos a los seeders que añaden usuario creados manualmente
        $this->call([UserSeeder::class, UsuarioSeeder::class ]);
    }
}
