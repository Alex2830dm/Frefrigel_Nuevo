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
        $categorias_Frefrigel = [
            'Aguas',
            'Gelatinas',
            'Gomas',
            'Tamarindos',
            'Velas'
        ];

        $categorias_Distribucion = [
            'Barquillos',
            'Cacahuates',
            'Chocos',
            'Cocos',
            'Dulces Leche',
            'Enchilados',
            'Estuches',
            'Gomas',
            'Juguetes',
            'Malvaviscos',
            'Mechudas',
            'Obleas',
            'Paletas y Caramelos',
            'Popotes',
            'Tarugos y Tamarindos'
        ];

        foreach ($categorias_Frefrigel as $categoria) {
            Categorias_Productos::create([
                'tipo_producto' => 1,
                'categoria' => $categoria
            ]);
        }

        foreach ($categorias_Distribucion as $categoria) {
            Categorias_Productos::create([
                'tipo_producto' => 2,
                'categoria' => $categoria
            ]);
        }
    }
}
