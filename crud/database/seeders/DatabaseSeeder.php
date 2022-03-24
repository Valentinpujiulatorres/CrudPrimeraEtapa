<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Incidencias;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Incidencias::factory(10)->create();
        $this->call([UserSeeder::class]);
    }
}
