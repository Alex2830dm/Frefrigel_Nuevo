<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Alex Donaldo',
            'username' => 'amartinezj',
            'p_apellido' => 'Martínez',
            's_apellido' => 'Jiménez',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'telefono' => '7226729504',
            'foto' => 'foto.jpg'
        ]);

        $user = User::create([
            'name' => 'Marilu',
            'username' => 'msanchezg',
            'p_apellido' => 'Sanchez',
            's_apellido' => 'García',
            'email' => 'user@gmail.com',
            'password' => bcrypt('password'),
            'telefono' => '7226729504',
            'foto' => 'foto.jpg'
        ]);
        
        $lector = User::create([
            'name' => 'Gabriel',
            'username' => 'gmantinezj',
            'p_apellido' => 'Martínez',
            's_apellido' => 'Jiménez',
            'email' => 'lector@gmail.com',
            'password' => bcrypt('password'),
            'telefono' => '7226729504',
            'foto' => 'foto.jpg'
        ]);

        $admin->assignRole('Administrador');
        $user->assignRole('Usuario');
        $lector->assignRole('Lector');
    }
}
