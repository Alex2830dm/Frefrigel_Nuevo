<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ventas extends Model
{
    use HasFactory;
    protected $table = "ventas";
    protected $fillable = [
        'proceso',
        'id_encargado',
        'id_cliente',
        'total_venta',
        'fecha_entrega',
        //'tipo_venta'
        //'fecha_venta'
    ];
}
