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

        $cliente1 = User::create([
            'name' => 'Marilu',
            'username' => 'msanchezg',
            'p_apellido' => 'Sanchez',
            's_apellido' => 'García',
            'email' => 'cliente1@gmail.com',
            'password' => bcrypt('password'),
            'telefono' => '7226729504',
            'id_cliente' => '1',
            'foto' => 'foto.jpg'
        ]);
        
        $cliente2 = User::create([
            'name' => 'Gabriel',
            'username' => 'gmantinezj',
            'p_apellido' => 'Martínez',
            's_apellido' => 'Jiménez',
            'email' => 'cliente2@gmail.com',
            'password' => bcrypt('password'),
            'telefono' => '7226729504',
            'id_cliente' => '2',
            'foto' => 'foto.jpg'
        ]);

        $admin->assignRole('Administrador');
        $cliente1->assignRole('Cliente');
        $cliente2->assignRole('Cliente');
    }
}
