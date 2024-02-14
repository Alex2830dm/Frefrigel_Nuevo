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
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'tipo_usuario' => '1',
            'id_identificacion' => '1'
        ]);

        $cliente1 = User::create([
            'name' => 'Juan Vazquez',
            'email' => 'jvazquezgaris@gmail.com',
            'password' => bcrypt('password'),
            'tipo_usuario' => '2',
            'id_identificacion' => '1'
        ]);

        $admin->assignRole('Administrador');
        $cliente1->assignRole('Cliente');
    }
}
