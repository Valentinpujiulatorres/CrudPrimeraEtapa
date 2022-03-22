<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // creamos usuarios
        $user = [
            [
                'name' => 'Alfonso',
                'email' => 'magicalfonso@cifpfbmoll.eu',
                // hash:make codifica la contraseña
                'password' => Hash::make('contra'),
                'role' => 'admin'
            ],
            [
                'name' => 'Gilberto',
                'email' => 'gilberto@cifpfbmoll.eu',
                'password' => Hash::make('contra'),
                'role' => 'usuario'
            ]
        ];
        // usamos db:table e insertamos en la tabla
        DB::table('users')->insert($user);
    }
}