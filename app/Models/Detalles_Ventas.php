<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalles_Ventas extends Model
{
    use HasFactory;

    protected $table = "detalles_ventas";
    protected $fillable = [
        'folio_venta',
        'id_producto',
        'cantidad_venta',
        'importe_venta'
    ];
}
