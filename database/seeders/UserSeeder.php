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
        $user = User::create([
            'name' => 'Alex Donaldo',
            'username' => 'amartinezj',
            'p_apellido' => 'Martínez',
            's_apellido' => 'Jiménez',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'telefono' => '7226729504',
            'foto' => 'foto.jpg'
        ]);
    }
}
