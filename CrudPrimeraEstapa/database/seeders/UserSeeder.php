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
                'name' => 'Gaspar',
                'email' => 'gnovel@cifpfbmoll.eu',
                // hash:make codifica la contraseña
                'password' => Hash::make('prueba'),
                'role' => 'admin'
            ],
            [
                'name' => 'Oualid',
                'email' => 'ozaaj@cifpfbmoll.eu',
                'password' => Hash::make('prueba'),
                'role' => 'usuario'
            ],
            [
                'name' => 'David',
                'email' => 'dgonzalezl@cifpfbmoll.eu',
                'password' => Hash::make('prueba'),
                'role' => 'invitado'
            ],
        ];
        // usamos db:table e insertamos en la tabla
        DB::table('users')->insert($user);
    }
} 