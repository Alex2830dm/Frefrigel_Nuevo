<?php

namespace App\Imports;

use App\Models\Productos;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductosImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Productos([
            'codeProduct'           => $row[0],
            'nameProduct'           => $row[1],
            'descriptionProduct'    => $row[2],
            'unitProduct'           => $row[3],
            'cantidadUnit'          => $row[4],
            'cantidad_Stock'        => $row[5],
            'linea_producto'        => $row[6],
            'id_categoria'          => $row[7],
            'priceProduct'          => $row[8],
            'foto'                  => $row[9],
            'activo'                => $row[10],
        ]);
    }
}
