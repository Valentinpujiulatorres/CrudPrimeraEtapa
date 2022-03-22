<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuarios = [
            [
                'user_id' => '1',
                'nombre' => 'Carlos',
                'apellido' => 'Novel',
                'edad' => '22',
                'fecha_de_nacimiento' => '1999/03/09',
                'telefono' => '639156810',
                'email' => 'cnovel@cifpfbmoll.eu',
                'estudios' => 'daw',
                'carnet' => 'B',
                'imagen' => ''
            ],
            [
                'user_id' => '2',
                'nombre' => 'Paula',
                'apellido' => 'Ruiz',
                'edad' => '22',
                'fecha_de_nacimiento' => '1999/09/29',
                'telefono' => '656192413',
                'email' => 'pruiz@cifpfbmoll.eu',
                'estudios' => 'dam',
                'carnet' => 'B',
                'imagen' => ''
            ],
            [
                'user_id' => '1',
                'nombre' => 'Raquel',
                'apellido' => 'Martinez',
                'edad' => '22',
                'fecha_de_nacimiento' => '1999/08/23',
                'telefono' => '656192455',
                'email' => 'rmartinez@cifpfbmoll.eu',
                'estudios' => 'asix',
                'carnet' => '',
                'imagen' => ''
            ],
        ];
        // usamos db:table e insertamos en la tabla
        DB::table('usuarios')->insert($usuarios);
    }
}
