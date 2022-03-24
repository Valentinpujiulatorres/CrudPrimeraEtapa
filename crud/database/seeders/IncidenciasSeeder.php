<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class IncidenciasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   // creamos contactos
        $incidencias = [
            [
                'fecherror' => '10/10/2019',
                'error' => '404',
                'tipoerror' => 'grave',
                'descerror' => 'Este error no me deja proseguir cuando voy a mirar cursos',
                'imagen' => 'Ashen Pyke.jfif'
            ],
            [
                'fecherror' => '08/08/2020',
                'error' => 'Congelacion',
                'tipoerror' => 'grave',
                'descerror' => 'Otro error tipico en el que se congela',
                'imagen' => 'Ashen Pyke.jfif'
            ],
            [
                'fecherror' => '05/05/2021',
                'error' => 'Bugg visual',
                'tipoerror' => 'leve',
                'descerror' => 'Error leve visual',
                'imagen' => 'Ashen Pyke.jfif'
            ]
        ];
        // usamos db:table e insertamos en la tabla
        DB::table('incidencias')->insert($incidencias);
    }
}
