<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Empleados;
use App\Models\Clientes;

class PersonasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void {
        $cliente = Clientes::create([
            'nameClient'    =>  'Super Garis Lerma',
            'rsCliente' =>  'Garis S.A de C.V',
            'emailClient'   =>  'garis@mail.com',
            'contactClient' =>  'Juan Vazquez',
            'jobcontactClient'  =>  'Jefe de Dulceria',
            'phonecontactClient'    =>  '7226987181',
            'addressStreet' =>  'Av. Reolín Barejon 13',
            'addressColony' =>  'Centro',
            'addressMunicipality'   =>  'Lerma',
            'addressState'  =>  'México',
            'addressCP' =>  '52000',
        ]);

        $empleado = Empleados::Create([
            'name' => 'Alex Donaldo',
            'p_apellido' => 'Martínez',
            's_apellido' => 'Jiménez',
            'foto' => 'fotoFefrigel.jpg', 
            'telefono' => '7226729504'
        ]);
    }
}
