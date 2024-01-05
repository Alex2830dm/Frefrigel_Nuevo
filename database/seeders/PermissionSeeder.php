<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /* Permission::insert([
            ['name' => 'users.index',   'description' => 'Ver listado de usuario'],
            ['name' => 'users.create',  'description' => 'Realizar el registro de usuarios'],
            ['name' => 'users.store',   'description' => 'Guardar los dato del usuario'],
            ['name' => 'users.edit',    'description' => 'Realizar cambios en los datos del usuario'],
            ['name' => 'users.update',  'description' => 'Guardar los camios de los datos del usuario'],
            ['name' => 'users.delete',  'description' => 'Eliminar al usuario'],
        ]); */
        Permission::create(['name' => 'users.index'])->syncRoles(['Administrador', 'Usuario', 'Lector']);
        Permission::create(['name' => 'users.create'])->syncRoles('Administrador');
        Permission::create(['name' => 'users.store'])->syncRoles('Administrador');
        Permission::create(['name' => 'users.edit'])->syncRoles(['Administrador', 'Usuario']);
        Permission::create(['name' => 'users.update'])->syncRoles(['Administrador', 'Usuario']);
        Permission::create(['name' => 'users.delete'])->syncRoles('Administrador');
    }
}
