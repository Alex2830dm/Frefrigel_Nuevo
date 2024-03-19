<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    use HasFactory;

    protected $primaryKey = "id";
    protected $table = "productos";
    protected $fillable = [
        'codeProduct',
        'nameProduct',
        'descriptionProduct',
        'unitProduct',
        'cantidadUnit',
        'cantidad_Stock',
        'tipo_producto',
        'id_categoria',
        'priceProduct',
        'foto',
        'activo'
    ];
}
