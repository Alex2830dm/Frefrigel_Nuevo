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
        /* ---------------- Permisos de Usuarios ---------------- */
        Permission::create(['name' => 'users.index'])->syncRoles(['Administrador']);
        Permission::create(['name' => 'users.create'])->syncRoles('Administrador');
        Permission::create(['name' => 'users.store'])->syncRoles('Administrador');
        Permission::create(['name' => 'users.edit'])->syncRoles(['Administrador']);
        Permission::create(['name' => 'users.update'])->syncRoles(['Administrador']);
        Permission::create(['name' => 'users.delete'])->syncRoles('Administrador');

        /* ---------------- Permisos de Roles ---------------- */
        Permission::create(['name' => 'roles.index'])->syncRoles(['Administrador']);
        Permission::create(['name' => 'roles.create'])->syncRoles(['Administrador']);
        Permission::create(['name' => 'roles.store'])->syncRoles(['Administrador']);
        Permission::create(['name' => 'roles.edit'])->syncRoles(['Administrador']);
        Permission::create(['name' => 'roles.update'])->syncRoles(['Administrador']);
        Permission::create(['name' => 'roles.destroy'])->syncRoles(['Administrador']);

        /* ---------------- Permisos de Productos ---------------- */
        Permission::create(['name' => 'productos.index'])->syncRoles(['Administrador', 'Cliente']);
        Permission::create(['name' => 'productos.create'])->syncRoles(['Administrador']);
        Permission::create(['name' => 'productos.store'])->syncRoles(['Administrador']);
        Permission::create(['name' => 'productos.edit'])->syncRoles(['Administrador']);
        Permission::create(['name' => 'productos.update'])->syncRoles(['Administrador']);
        Permission::create(['name' => 'productos.destroy'])->syncRoles(['Administrador']);
        Permission::create(['name' => 'productos.inactives'])->syncRoles(['Administrador']);
        Permission::create(['name' => 'productos.inactive'])->syncRoles(['Administrador']);
        Permission::create(['name' => 'productos.active'])->syncRoles(['Administrador']);

        /* ---------------- Permisos de Clientes ---------------- */
        Permission::create(['name' => 'clientes.index'])->syncRoles(['Administrador']);
        Permission::create(['name' => 'clientes.create'])->syncRoles(['Administrador']);
        Permission::create(['name' => 'clientes.store'])->syncRoles(['Administrador']);
        Permission::create(['name' => 'clientes.edit'])->syncRoles(['Administrador']);
        Permission::create(['name' => 'clientes.update'])->syncRoles(['Administrador']);
        Permission::create(['name' => 'clientes.destroy'])->syncRoles(['Administrador']);
        Permission::create(['name' => 'clientes.inactives'])->syncRoles(['Administrador']);

        /* ---------------- Permisos de Ventas ---------------- */
        Permission::create(['name' => 'ventas.index'])->syncRoles(['Administrador']);
        Permission::create(['name' => 'ventas.venta'])->syncRoles(['Administrador']);
        Permission::create(['name' => 'ventas.store'])->syncRoles(['Administrador']);
        Permission::create(['name' => 'ventas.show'])->syncRoles(['Administrador']);

        /* ---------------- Permisos de Pedidos ---------------- */
        Permission::create(['name' => 'pedidos.index'])->syncRoles(['Administrador', 'Cliente']);
        Permission::create(['name' => 'pedidos.pedido'])->syncRoles(['Administrador', 'Cliente']);
        Permission::create(['name' => 'pedidos.store'])->syncRoles(['Administrador', 'Cliente']);
        Permission::create(['name' => 'pedidos.show'])->syncRoles(['Administrador', 'Cliente']);
        Permission::create(['name' => 'pedidos.entrega'])->syncRoles(['Administrador']);

        /* ---------------- Permisos de Entradas ---------------- */
        Permission::create(['name' => 'entradas.index'])->syncRoles(['Administrador']);
        Permission::create(['name' => 'entradas.entrada'])->syncRoles(['Administrador']);
        Permission::create(['name' => 'entradas.store'])->syncRoles(['Administrador']);
        Permission::create(['name' => 'entradas.show'])->syncRoles(['Administrador']);
        Permission::create(['name' => 'entradas.info_producto'])->syncRoles(['Administrador']);
    }
}
