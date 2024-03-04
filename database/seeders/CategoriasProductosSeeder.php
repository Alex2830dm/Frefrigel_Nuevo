<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categorias_Productos;

class CategoriasProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorias = [
            'Congeladas',
            'Gelatinas',
            'Velas',
            'Tamarindos',
            'Gomitas',
            'Banderillas',
            'Otros'
        ];

        foreach ($categorias as $categoria) {
            Categorias_Productos::create([
                'categoria' => $categoria
            ]);
        }
    }
}
