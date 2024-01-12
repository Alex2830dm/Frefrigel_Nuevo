<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ventas extends Model
{
    use HasFactory;
    protected $table = "ventas";
    protected $filleable = [
        'id_encargado',
        'id_cliente',
        'total_venta',
        'fecha_venta'
    ];
}
